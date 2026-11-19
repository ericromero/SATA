<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BuzonController extends Controller
{
    public function index()
    {
        $mensajes = Schema::hasTable('messages') ? DB::table('messages')->orderByDesc('Id_message')->get() : collect();
        $avisos = Schema::hasTable('ads') ? DB::table('ads')->orderByDesc('Id_ads')->get() : collect();
        $usuarios = DB::table('users')->pluck('name', 'id');
        $grupos = DB::table('groups')->get()->keyBy('id');
        $adGroups = Schema::hasTable('ad_group') ? DB::table('ad_group')->get()->groupBy('Id_ads') : collect();
        
        return view('buzon.index', compact('mensajes', 'avisos', 'usuarios', 'grupos', 'adGroups'));
    }

    public function crearMensaje(Request $request)
    {
        $alumnos = DB::table('users')->where('id', '!=', Auth::id())->orderBy('name')->get();
        $alumnoSeleccionado = $request->query('user_id');
        $mensajesChat = collect();
        $alumnoActual = null;

        if ($alumnoSeleccionado) {
            $alumnoActual = DB::table('users')->where('id', $alumnoSeleccionado)->first();
            $userCol = Schema::hasColumn('messages', 'User_id') ? 'User_id' : 'user_id';

            $mensajesChat = DB::table('messages')
                ->leftJoin('message_policies', 'messages.Id_message', '=', 'message_policies.Id_message')
                ->where('messages.' . $userCol, $alumnoSeleccionado)
                ->select(
                    'messages.*',
                    'message_policies.edit_window_minutes',
                    'message_policies.delete_window_minutes',
                    'message_policies.Status as policy_status'
                )
                ->orderBy('messages.created_at', 'asc')
                ->get()
                ->map(function ($msg) {
                    $limiteEdicion = $msg->edit_window_minutes
                        ? Carbon::parse($msg->edit_window_minutes)
                        : Carbon::parse($msg->created_at)->addMinutes(2);

                    $limiteEliminacion = $msg->delete_window_minutes
                        ? Carbon::parse($msg->delete_window_minutes)
                        : Carbon::parse($msg->created_at)->addMinutes(2);

                    $activa = $msg->policy_status === null ? true : (bool) $msg->policy_status;

                    $msg->puede_editar = $activa && now()->lt($limiteEdicion);
                    $msg->puede_eliminar = $activa && now()->lt($limiteEliminacion);
                    $msg->segundos_restantes = max(0, (int) now()->diffInSeconds($limiteEdicion, false));

                    return $msg;
                });
        }

        return view('buzon.crear-mensaje', compact('alumnos', 'alumnoSeleccionado', 'mensajesChat', 'alumnoActual'));
    }

    public function guardarMensaje(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'asunto' => 'nullable|string|max:255',
            'contenido' => 'required|string',
        ]);

        $ahora = now();
        $data = [
            'content' => $request->contenido,
            'User_id' => $request->user_id,
            'Message_Status' => 1,
            'IsRead' => false,
            'created_at' => $ahora,
            'updated_at' => $ahora,
        ];

        if ($request->filled('asunto')) {
            if (Schema::hasColumn('messages', 'subject')) $data['subject'] = $request->asunto;
            if (Schema::hasColumn('messages', 'title')) $data['title'] = $request->asunto;
        }

        $messageId = DB::table('messages')->insertGetId($data);

        // Registrar política de 2 minutos para editar y eliminar
        if (Schema::hasTable('message_policies')) {
            $limiteDosMinutos = $ahora->copy()->addMinutes(2);
            DB::table('message_policies')->insert([
                'edit_window_minutes' => $limiteDosMinutos,
                'delete_window_minutes' => $limiteDosMinutos,
                'Status' => true,
                'Id_message' => $messageId,
                'created_at' => $ahora,
                'updated_at' => $ahora,
            ]);
        }

        return redirect()
            ->route('buzon.crear-mensaje', ['user_id' => $request->user_id])
            ->with('success', 'Mensaje enviado. Tienes 2 minutos para editarlo o eliminarlo.');
    }

    public function actualizarMensaje(Request $request, $id)
    {
        $request->validate([
            'contenido' => 'required|string',
        ]);

        $mensaje = DB::table('messages')->where('Id_message', $id)->first();
        abort_if(!$mensaje, 404);

        $policy = Schema::hasTable('message_policies')
            ? DB::table('message_policies')->where('Id_message', $id)->where('Status', true)->first()
            : null;

        $limiteEdicion = $policy && $policy->edit_window_minutes
            ? Carbon::parse($policy->edit_window_minutes)
            : Carbon::parse($mensaje->created_at)->addMinutes(2);

        if (now()->gte($limiteEdicion)) {
            return redirect()
                ->route('buzon.crear-mensaje', ['user_id' => $mensaje->User_id])
                ->with('error', 'El tiempo límite de 2 minutos para editar este mensaje ha expirado.');
        }

        DB::table('messages')->where('Id_message', $id)->update([
            'content' => $request->contenido,
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('buzon.crear-mensaje', ['user_id' => $mensaje->User_id])
            ->with('success', 'Mensaje actualizado correctamente.');
    }

    public function eliminarMensaje($id)
    {
        $mensaje = DB::table('messages')->where('Id_message', $id)->first();
        abort_if(!$mensaje, 404);

        $policy = Schema::hasTable('message_policies')
            ? DB::table('message_policies')->where('Id_message', $id)->where('Status', true)->first()
            : null;

        $limiteEliminacion = $policy && $policy->delete_window_minutes
            ? Carbon::parse($policy->delete_window_minutes)
            : Carbon::parse($mensaje->created_at)->addMinutes(2);

        if (now()->gte($limiteEliminacion)) {
            return redirect()
                ->route('buzon.crear-mensaje', ['user_id' => $mensaje->User_id])
                ->with('error', 'El tiempo límite de 2 minutos para eliminar este mensaje ha expirado.');
        }

        $userId = $mensaje->User_id;
        DB::table('messages')->where('Id_message', $id)->delete();

        return redirect()
            ->route('buzon.crear-mensaje', ['user_id' => $userId])
            ->with('success', 'Mensaje eliminado.');
    }

    public function crearAviso()
    {
        $grupos = DB::table('groups')->get();
        $colPivot = Schema::hasColumn('group_user', 'Id_group') ? 'Id_group' : 'group_id';
        
        foreach ($grupos as $grupo) {
            $grupo->display_name = $grupo->name ?? $grupo->nombre ?? 'Grupo #' . $grupo->id;
            $grupo->alumnos_count = DB::table('group_user')->where($colPivot, $grupo->id)->count();
        }

        return view('buzon.crear-aviso', compact('grupos'));
    }

    public function guardarAviso(Request $request)
    {
        $request->validate(['titulo' => 'required', 'grupos_destino' => 'required|array', 'mensaje' => 'required']);
        
        $adData = [
            'Title' => $request->titulo,
            'content' => $request->mensaje,
            'User_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $adId = DB::table('ads')->insertGetId($adData);
        
        foreach ($request->grupos_destino as $groupId) {
            DB::table('ad_group')->insert([
                'Id_ads' => $adId,
                'Id_group' => $groupId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('buzon.index')->with('success', 'Aviso publicado.');
    }

    public function grupos()
    {
        $grupos = DB::table('groups')->get();
        $colPivotGroup = Schema::hasColumn('group_user', 'Id_group') ? 'Id_group' : 'group_id';

        foreach ($grupos as $grupo) {
            $grupo->display_name = $grupo->name ?? $grupo->nombre ?? 'Grupo #' . $grupo->id;
            $grupo->alumnos_count = DB::table('group_user')->where($colPivotGroup, $grupo->id)->count();
        }

        return view('buzon.grupos', compact('grupos'));
    }

    public function alumnosPorGrupo($grupoId)
    {
        $colGroupUser_User = Schema::hasColumn('group_user', 'User_id') ? 'User_id' : 'user_id';
        $colGroupUser_Group = Schema::hasColumn('group_user', 'Id_group') ? 'Id_group' : 'group_id';
        $colGroups_Id = Schema::hasColumn('groups', 'Id_group') ? 'Id_group' : 'id';

        $grupo = DB::table('groups')->where($colGroups_Id, $grupoId)->first();
        abort_if(!$grupo, 404);

        $grupo->display_name = $grupo->name ?? $grupo->nombre ?? ('Grupo #' . $grupoId);

        $alumnos = DB::table('users')
            ->join('group_user', 'users.id', '=', 'group_user.' . $colGroupUser_User)
            ->where('group_user.' . $colGroupUser_Group, $grupoId)
            ->select('users.*')
            ->orderBy('users.name')
            ->get();

        return view('buzon.alumnos', compact('grupo', 'alumnos'));
    }
}