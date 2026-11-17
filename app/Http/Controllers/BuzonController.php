<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BuzonController extends Controller
{
    public function index()
    {
        $mensajes = Schema::hasTable('messages') ? DB::table('messages')->orderByDesc('id')->get() : collect();
        $avisos = Schema::hasTable('ads') ? DB::table('ads')->orderByDesc('id')->get() : collect();
        $usuarios = DB::table('users')->pluck('name', 'id');
        $grupos = DB::table('groups')->get()->keyBy('id');
        $adGroups = Schema::hasTable('ad_group') ? DB::table('ad_group')->get()->groupBy('ad_id') : collect();
        
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
            $senderCol = Schema::hasColumn('messages', 'Sender_id') ? 'Sender_id' : 'sender_id';
            $receiverCol = Schema::hasColumn('messages', 'Receiver_id') ? 'Receiver_id' : 'receiver_id';

            if (!Schema::hasColumn('messages', $senderCol)) $senderCol = $userCol;
            if (!Schema::hasColumn('messages', $receiverCol)) $receiverCol = $userCol;

            $mensajesChat = DB::table('messages')
                ->where(function($query) use ($alumnoSeleccionado, $userCol, $senderCol, $receiverCol) {
                    $query->where($userCol, $alumnoSeleccionado)
                          ->orWhere($senderCol, $alumnoSeleccionado)
                          ->orWhere($receiverCol, $alumnoSeleccionado);
                })
                ->orderBy('created_at', 'asc')
                ->get();
        }

        return view('buzon.crear-mensaje', compact('alumnos', 'alumnoSeleccionado', 'mensajesChat', 'alumnoActual'));
    }

    public function guardarMensaje(Request $request)
    {
        $request->validate(['user_id' => 'required', 'asunto' => 'required', 'contenido' => 'required']);
        
        $data = ['created_at' => now(), 'updated_at' => now()];
        
        if (Schema::hasColumn('messages', 'user_id')) $data['user_id'] = $request->user_id;
        if (Schema::hasColumn('messages', 'User_id')) $data['User_id'] = $request->user_id;
        
        if (Schema::hasColumn('messages', 'sender_id')) $data['sender_id'] = Auth::id();
        if (Schema::hasColumn('messages', 'Sender_id')) $data['Sender_id'] = Auth::id();
        
        if (Schema::hasColumn('messages', 'receiver_id')) $data['receiver_id'] = $request->user_id;
        if (Schema::hasColumn('messages', 'Receiver_id')) $data['Receiver_id'] = $request->user_id;
        
        if (Schema::hasColumn('messages', 'subject')) $data['subject'] = $request->asunto;
        if (Schema::hasColumn('messages', 'title')) $data['title'] = $request->asunto;
        
        if (Schema::hasColumn('messages', 'body')) $data['body'] = $request->contenido;
        if (Schema::hasColumn('messages', 'content')) $data['content'] = $request->contenido;

        DB::table('messages')->insert($data);
        
        return redirect()->route('buzon.crear-mensaje', ['user_id' => $request->user_id])->with('success', 'Mensaje enviado.');
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
        
        $adData = ['created_at' => now(), 'updated_at' => now()];
        if (Schema::hasColumn('ads', 'title')) $adData['title'] = $request->titulo;
        if (Schema::hasColumn('ads', 'titulo')) $adData['titulo'] = $request->titulo;
        if (Schema::hasColumn('ads', 'content')) $adData['content'] = $request->mensaje;
        if (Schema::hasColumn('ads', 'body')) $adData['body'] = $request->mensaje;

        $adId = DB::table('ads')->insertGetId($adData);
        
        $colAdId = Schema::hasColumn('ad_group', 'Ad_id') ? 'Ad_id' : 'ad_id';
        $colGroupId = Schema::hasColumn('ad_group', 'Id_group') ? 'Id_group' : 'group_id';

        foreach ($request->grupos_destino as $groupId) {
            DB::table('ad_group')->insert([
                $colAdId => $adId,
                $colGroupId => $groupId,
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