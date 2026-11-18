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
            'account_number.size' => 'El número de cuenta debe tener exactamente 9 dígitos.',
            'account_number.unique' => 'Este número de cuenta ya está registrado.'
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
            'employe_number' => 'nullable|string|max:10|unique:academics,employe_number',
            'RFC' => 'required|string|size:13|unique:academics,RFC',
            'areas' => 'required|array|min:1',
            'areas.*' => 'exists:units,id',
            'roles_area' => 'array',
        ], [
            'name.required' => 'Ingresa tu nombre completo.',
            'email.required' => 'Ingresa el correo electrónico.',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
            'password.required' => 'Ingresa una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'CURP.required' => 'Ingresa tu CURP.',
            'CURP.unique' => 'Esta CURP ya está registrada en el sistema.',
            'RFC.required' => 'El RFC es obligatorio.',
            'RFC.size' => 'El RFC debe tener exactamente 13 caracteres.',
            'RFC.unique' => 'Este RFC ya está registrado en el sistema.',
            'employe_number.max' => 'El número de empleado no puede tener más de 10 caracteres.',
            'employe_number.unique' => 'Este número de empleado ya existe.',
            'areas.required' => 'Debes seleccionar al menos un área (SUA o Escolarizado).',
        ]);

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

    public function consultarAcademicos()
    {
        // Traemos todos los académicos incluyendo sus datos de la tabla user
        $academicos = Academic::with('user')->get();
        
        return view('usuarios.consultar-academicos', compact('academicos'));
    }

    public function editAlumno($user_id)
    {
        $alumno = Student::with('user')->where('user_id', $user_id)->firstOrFail();
        return view('usuarios.editar-alumno', compact('alumno'));
    }

    public function updateAlumno(Request $request, $user_id)
    {
        $alumno = Student::with('user')->where('user_id', $user_id)->firstOrFail();
        $user = $alumno->user;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:user,email,{$user->User_id},User_id",
            'password' => 'nullable|string|min:8',
            'CURP' => ['required', 'string', new ValidCurp, "unique:user,CURP,{$user->User_id},User_id"],
            'account_number' => ['required', 'string', 'size:9', 'regex:/^[0-9]+$/', "unique:students,account_number,{$alumno->user_id},user_id"],
        ], [
            'name.required' => 'El nombre completo es obligatorio.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'CURP.unique' => 'Esta CURP ya está registrada.',
            'account_number.regex' => 'El número de cuenta solo debe contener números.',
            'account_number.size' => 'El número de cuenta debe tener exactamente 9 dígitos.',
            'account_number.unique' => 'Este número de cuenta ya está registrado.',
        ]);

        DB::transaction(function () use ($request, $user, $alumno) {
            $datosUsuario = [
                'name' => $request->name,
                'email' => $request->email,
                'CURP' => strtoupper($request->CURP),
            ];

            // Solo actualiza la contraseña si escribieron una nueva
            if ($request->filled('password')) {
                $datosUsuario['password'] = Hash::make($request->password);
            }

            $user->update($datosUsuario);

            $alumno->update([
                'account_number' => $request->account_number,
            ]);
        });

        return redirect('/usuarios/consultar-alumnos')->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroyAlumno($user_id)
    {
        $alumno = Student::with('user')->where('user_id', $user_id)->firstOrFail();

        DB::transaction(function () use ($alumno) {
            $alumno->delete();       // Soft delete en students
            $alumno->user->delete(); // Soft delete en user
        });

        return redirect('/usuarios/consultar-alumnos')->with('success', 'Alumno eliminado correctamente.');
    }

    public function editDocente($user_id)
    {
        $academico = Academic::with('user')->where('user_id', $user_id)->firstOrFail();

        // Obtenemos un arreglo [unit_id => role_id] con las áreas y roles actuales del docente
        $asignaciones = DB::table('unit_role_user')
            ->where('user_id', $user_id)
            ->pluck('role_id', 'unit_id')
            ->toArray();

        return view('usuarios.editar-docente', compact('academico', 'asignaciones'));
    }

    public function updateDocente(Request $request, $user_id)
    {
        $academico = Academic::with('user')->where('user_id', $user_id)->firstOrFail();
        $user = $academico->user;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:user,email,{$user->User_id},User_id",
            'password' => 'nullable|string|min:8',
            'CURP' => ['required', 'string', new ValidCurp, "unique:user,CURP,{$user->User_id},User_id"],
            'employe_number' => "nullable|string|max:10|unique:academics,employe_number,{$academico->user_id},user_id",
            'RFC' => "required|string|size:13|unique:academics,RFC,{$academico->user_id},user_id",
            'areas' => 'required|array|min:1',
            'areas.*' => 'exists:units,id',
            'roles_area' => 'array',
        ], [
            'name.required' => 'Ingresa tu nombre completo.',
            'email.required' => 'Ingresa el correo electrónico.',
            'email.unique' => 'Este correo electrónico ya se encuentra registrado.',
            'password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'CURP.required' => 'Ingresa tu CURP.',
            'CURP.unique' => 'Esta CURP ya está registrada en el sistema.',
            'RFC.required' => 'El RFC es obligatorio.',
            'RFC.size' => 'El RFC debe tener exactamente 13 caracteres.',
            'RFC.unique' => 'Este RFC ya está registrado en el sistema.',
            'employe_number.max' => 'El número de empleado no puede tener más de 10 caracteres.',
            'employe_number.unique' => 'Este número de empleado ya existe.',
            'areas.required' => 'Debes seleccionar al menos un área (SUA o Escolarizado).',
        ]);

        if ($request->has('areas')) {
            foreach ($request->areas as $unitId) {
                if (empty($request->roles_area[$unitId])) {
                    return back()->withErrors(['roles_area' => 'Debes seleccionar un rol para cada área que hayas marcado.'])->withInput();
                }
            }
        }

        DB::transaction(function () use ($request, $user, $academico) {
            $datosUsuario = [
                'name' => $request->name,
                'email' => $request->email,
                'CURP' => strtoupper($request->CURP),
            ];

            if ($request->filled('password')) {
                $datosUsuario['password'] = Hash::make($request->password);
            }

            $user->update($datosUsuario);

            $academico->update([
                'employe_number' => $request->employe_number,
                'RFC' => strtoupper($request->RFC),
            ]);

            // Reemplazamos las áreas y roles asignados por los nuevos
            DB::table('unit_role_user')->where('user_id', $user->User_id)->delete();

            foreach ($request->areas as $unitId) {
                DB::table('unit_role_user')->insert([
                    'user_id' => $user->User_id,
                    'role_id' => $request->roles_area[$unitId],
                    'unit_id' => $unitId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        });

        return redirect('/usuarios/consultar-academicos')->with('success', 'Docente actualizado correctamente.');
    }

    public function destroyDocente($user_id)
    {
        $academico = Academic::with('user')->where('user_id', $user_id)->firstOrFail();

        DB::transaction(function () use ($academico) {
            $academico->delete();       // Soft delete en academics
            $academico->user->delete(); // Soft delete en user
        });

        return redirect('/usuarios/consultar-academicos')->with('success', 'Docente eliminado correctamente.');
    }
}