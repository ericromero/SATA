<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Academic;
use App\Rules\ValidCurp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function storeAlumno(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:8',
            'CURP' => ['required', 'string', new ValidCurp, 'unique:user,CURP'],
            'account_number' => ['required', 'string', 'max:10', 'regex:/^[0-9]+$/', 'unique:students,account_number'],
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'CURP' => strtoupper($request->CURP),
            ]);

            Student::create([
                'user_id' => $user->User_id,
                'account_number' => $request->account_number,
            ]);
        });

        return redirect('/usuarios')->with('success', 'Alumno registrado correctamente.');
    }

    public function indexAlumnos()
    {
        // Traemos todos los estudiantes incluyendo sus datos de la tabla user
        $alumnos = Student::with('user')->get();
        
        return view('usuarios.consultar-alumnos', compact('alumnos'));
    }

    public function storeDocente(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:8',
            'CURP' => ['required', 'string', new ValidCurp, 'unique:user,CURP'],
            'employe_number' => 'required|string|max:10|unique:academics,employe_number',
            'RFC' => 'required|string|size:13|unique:academics,RFC',
            'areas' => 'required|array|min:1',
            'areas.*' => 'exists:units,id',
            'roles_area' => 'array',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'CURP' => strtoupper($request->CURP),
                'status' => true,
            ]);

            Academic::create([
                'user_id' => $user->User_id,
                'employe_number' => $request->employe_number,
                'RFC' => strtoupper($request->RFC),
            ]);

            foreach ($request->areas as $unitId) {
                $roleId = $request->roles_area[$unitId] ?? 1;
                DB::table('unit_role_user')->insert([
                    'user_id' => $user->User_id,
                    'role_id' => $roleId,
                    'unit_id' => $unitId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        return redirect('/usuarios')->with('success', 'Docente registrado correctamente.');
    }

    // NUEVO MÉTODO: Consultar Académicos
    public function consultarAcademicos()
    {
        // Traemos todos los académicos incluyendo sus datos de la tabla user
        $academicos = Academic::with('user')->get();
        
        // Retornamos la vista, pasando los datos a la variable 'academicos'
        return view('usuarios.consultar-academicos', compact('academicos'));
    }
}