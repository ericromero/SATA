<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Academic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function storeAlumno(Request $request)
    {
        // 1. Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:8',
            'birthday' => 'required|date',
            // Si importas tu regla ValidCurp de tu otro proyecto, puedes cambiar 'size:18' por [new ValidCurp]
            'CURP' => 'required|string|size:18|unique:user,CURP', 
            'account_number' => 'required|string|max:10|unique:students,account_number',
        ]);

        // 2. Transacción de Base de Datos
        DB::transaction(function () use ($request) {
            
            // A) Crear el usuario en la tabla general 'user'
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Encriptación obligatoria
                'birthday' => $request->birthday,
                'CURP' => strtoupper($request->CURP),
            ]);

            // B) Crear el registro en la tabla 'students' usando el ID generado
            Student::create([
                'user_id' => $user->User_id,
                'account_number' => $request->account_number,
            ]);
        });

        // 3. Redirección con mensaje de éxito
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
        // 1. Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|string|min:8',
            'birthday' => 'required|date',
            'CURP' => 'required|string|size:18|unique:user,CURP',
            'employe_number' => 'required|string|max:10|unique:academics,employe_number',
            'areas' => 'required|array|min:1',
            'areas.*' => 'exists:units,id',
            'roles_area' => 'array',
        ]);

        // 2. Transacción de Base de Datos atómica
        DB::transaction(function () use ($request) {
            
            // A) Crear usuario en la tabla 'user'
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'birthday' => $request->birthday,
                'CURP' => strtoupper($request->CURP),
                'status' => true,
            ]);

            // B) Crear registro en 'academics'
            Academic::create([
                'user_id' => $user->User_id,
                'employe_number' => $request->employe_number,
            ]);

            // C) Insertar en la tabla pivote 'unit_role_user' solo las áreas marcadas
            foreach ($request->areas as $unitId) {
                // Obtenemos el rol específico seleccionado para esta área (si no seleccionó, asignamos por defecto el rol 1 o el que prefieras)
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

        // 3. Redirección con éxito
        return redirect('/usuarios')->with('success', 'Docente registrado correctamente.');
    }
}