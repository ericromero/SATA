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
        try {
            $mensajes = DB::table('messages')->orderByDesc('id')->get();
            $avisos = DB::table('ads')->orderByDesc('id')->get();
            $usuarios = DB::table('users')->pluck('name', 'id');
            $grupos = DB::table('groups')->get()->keyBy('id');
            $adGroups = Schema::hasTable('ad_group') ? DB::table('ad_group')->get()->groupBy('ad_id') : collect();
        } catch (\Exception $e) {
            $mensajes = collect(); $avisos = collect(); $usuarios = collect(); $grupos = collect(); $adGroups = collect();
        }
        return view('buzon.index', compact('mensajes', 'avisos', 'usuarios', 'grupos', 'adGroups'));
    }

    public function crearMensaje(Request $request)
    {
        $colsGroupUser = Schema::getColumnListing('group_user');
        $pivotUserCol = in_array('User_id', $colsGroupUser) ? 'User_id' : 'user_id';
        $pivotGroupCol = in_array('Id_group', $colsGroupUser) ? 'Id_group' : 'group_id';
        
        $colsGroups = Schema::getColumnListing('groups');
        $groupsIdCol = in_array('Id_group', $colsGroups) ? 'Id_group' : 'id';
        $groupsNameCol = in_array('nombre', $colsGroups) ? 'nombre' : 'name';

        try {
            $alumnos = DB::table('users')
                ->join('group_user', 'users.id', '=', 'group_user.' . $pivotUserCol)
                ->join('groups', 'groups.' . $groupsIdCol, '=', 'group_user.' . $pivotGroupCol)
                ->select('users.*', 'groups.' . $groupsIdCol . ' as group_id', 'groups.' . $groupsNameCol . ' as group_name')
                ->orderBy('users.name')
                ->get();
        } catch (\Exception $e) {
            $alumnos = collect();
        }

        if ($alumnos->isEmpty()) {
            try { $alumnos = DB::table('users')->where('id', '!=', Auth::id())->orderBy('name')->get(); } 
            catch (\Exception $e) { $alumnos = collect(); }
        }

        try { $grupos = DB::table('groups')->get()->keyBy($groupsIdCol); } 
        catch (\Exception $e) { $grupos = collect(); }
        
        $alumnoSeleccionado = $request->query('user_id');

        return view('buzon.crear-mensaje', compact('alumnos', 'grupos', 'alumnoSeleccionado'));
    }

    public function guardarMensaje(Request $request)
    {
        $request->validate(['user_id' => 'required', 'asunto' => 'required', 'contenido' => 'required']);
        $cols = Schema::getColumnListing('messages');
        
        $data = ['created_at' => now(), 'updated_at' => now()];
        if (in_array('user_id', $cols)) $data['user_id'] = $request->user_id;
        if (in_array('sender_id', $cols)) $data['sender_id'] = Auth::id();
        if (in_array('subject', $cols)) $data['subject'] = $request->asunto;
        if (in_array('title', $cols)) $data['title'] = $request->asunto;
        if (in_array('body', $cols)) $data['body'] = $request->contenido;
        if (in_array('content', $cols)) $data['content'] = $request->contenido;

        DB::table('messages')->insert($data);
        return redirect()->route('buzon.index')->with('success', 'Mensaje enviado.');
    }

    public function crearAviso()
    {
        $colsGroupUser = Schema::getColumnListing('group_user');
        $pivotGroupCol = in_array('Id_group', $colsGroupUser) ? 'Id_group' : 'group_id';
        
        try {
            $grupos = DB::table('groups')->get()->map(function ($grupo) use ($pivotGroupCol) {
                $id = $grupo->id ?? $grupo->Id_group ?? 1;
                $grupo->alumnos_count = DB::table('group_user')->where($pivotGroupCol, $id)->count();
                $grupo->display_name = $grupo->name ?? $grupo->nombre ?? ('Grupo #' . $id);
                return $grupo;
            });
        } catch (\Exception $e) { $grupos = collect(); }

        return view('buzon.crear-aviso', compact('grupos'));
    }

    public function guardarAviso(Request $request)
    {
        $request->validate(['titulo' => 'required', 'grupos_destino' => 'required|array', 'mensaje' => 'required']);
        $colsAds = Schema::getColumnListing('ads');
        
        $adData = ['created_at' => now(), 'updated_at' => now()];
        if (in_array('title', $colsAds)) $adData['title'] = $request->titulo;
        if (in_array('titulo', $colsAds)) $adData['titulo'] = $request->titulo;
        if (in_array('content', $colsAds)) $adData['content'] = $request->mensaje;
        if (in_array('body', $colsAds)) $adData['body'] = $request->mensaje;

        $adId = DB::table('ads')->insertGetId($adData);
        $colsPivot = Schema::getColumnListing('ad_group');

        foreach ($request->grupos_destino as $groupId) {
            $pivot = [];
            if (in_array('ad_id', $colsPivot)) $pivot['ad_id'] = $adId;
            if (in_array('group_id', $colsPivot)) $pivot['group_id'] = $groupId;
            if (in_array('Id_group', $colsPivot)) $pivot['Id_group'] = $groupId;
            DB::table('ad_group')->insert($pivot);
        }
        return redirect()->route('buzon.index')->with('success', 'Aviso publicado.');
    }

    public function grupos()
    {
        $colsGroupUser = Schema::getColumnListing('group_user');
        $pivotGroupCol = in_array('Id_group', $colsGroupUser) ? 'Id_group' : 'group_id';

        try {
            $grupos = DB::table('groups')->get()->map(function ($grupo) use ($pivotGroupCol) {
                $id = $grupo->id ?? $grupo->Id_group ?? 1;
                $grupo->alumnos_count = DB::table('group_user')->where($pivotGroupCol, $id)->count();
                $grupo->display_name = $grupo->name ?? $grupo->nombre ?? ('Grupo #' . $id);
                return $grupo;
            });
        } catch (\Exception $e) { $grupos = collect(); }

        return view('buzon.grupos', compact('grupos'));
    }

    public function alumnosPorGrupo($grupoId)
    {
        $colsGroupUser = Schema::getColumnListing('group_user');
        $pivotUserCol = in_array('User_id', $colsGroupUser) ? 'User_id' : 'user_id';
        $pivotGroupCol = in_array('Id_group', $colsGroupUser) ? 'Id_group' : 'group_id';
        
        $colsGroups = Schema::getColumnListing('groups');
        $groupsIdCol = in_array('Id_group', $colsGroups) ? 'Id_group' : 'id';

        try {
            $grupo = DB::table('groups')->where($groupsIdCol, $grupoId)->first();
            abort_if(!$grupo, 404);
            $grupo->display_name = $grupo->name ?? $grupo->nombre ?? ('Grupo #' . $grupoId);

            $alumnos = DB::table('users')
                ->join('group_user', 'users.id', '=', 'group_user.' . $pivotUserCol)
                ->where('group_user.' . $pivotGroupCol, $grupoId)
                ->select('users.*')
                ->orderBy('users.name')
                ->get();
        } catch (\Exception $e) {
            $grupo = (object) ['id' => $grupoId, 'display_name' => 'Error'];
            $alumnos = collect();
        }

        return view('buzon.alumnos', compact('grupo', 'alumnos'));
    }
}