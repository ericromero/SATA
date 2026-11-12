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
            'account_number' => ['required', 'string', 'size:9', 'regex:/^[0-9]+$/', 'unique:students,account_number'],
        ], [
            'name.required' => 'Ingresa tu nombre completo.',
            'email.required' => 'Ingresa el correo electrónico.',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
            'password.required' => 'Ingresa una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'CURP.required' => 'La CURP es obligatoria.',
            'CURP.unique' => 'La CURP ya está registrada en el sistema.',
            'account_number.required' => 'El número de cuenta es obligatorio.',
            'account_number.regex' => 'El número de cuenta es inválido, solo debe contener números.',
            'account_number.max' => 'El número de cuenta no puede tener más de 9 dígitos.',
            'account_number.unique' => 'Este número de cuenta ya está registrado.'
        ]
        );

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
            'employe_number' => 'nullable|string|max:10|unique:academics,employe_number',
            'RFC' => 'required|string|size:13|unique:academics,RFC',
            'areas' => 'required|array|min:1',
            'areas.*' => 'exists:units,id',
            'roles_area' => 'array',
        ], [
            'name.required' => 'Ingresa tu nombre completo.',
            'email.required' => 'Ingresa el correo electrónico.',
            'email.unique' => 'El correo electrónico ya se encuentra registrado.',
            'password.required' => 'Ingresa una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'CURP.required' => 'Ingresa tu CURP.',
            'CURP.unique' => 'Esta CURP ya está registrada en el sistema.',
            'RFC.required' => 'El RFC es obligatorio.',
            'RFC.size' => 'El RFC debe tener exactamente 13 caracteres.',
            'RFC.unique' => 'Este RFC ya está registrado en el sistema.',
            'employe_number.size' => 'El número de empleado no puede tener más de 10 caracteres.',
            'employe_number.unique' => 'Este número de empleado ya existe.',
            'areas.required' => 'Debes seleccionar al menos un área (SUA o Escolarizado).',
        ]
        );

        if ($request->has('areas')) {
            foreach ($request->areas as $unitId) {
                if (empty($request->roles_area[$unitId])) {
                    return back()->withErrors(['roles_area' => 'Debes seleccionar un rol para cada área que hayas marcado.'])->withInput();
                }
            }
        }

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