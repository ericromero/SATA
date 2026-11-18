<x-layouts.app>
    <x-slot name="header">
        <h2>Editar Docente / Funcionario</h2>
    </x-slot>

    <div style="padding: 20px;">
        
        @if($errors->any())
        <div style="background-color: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 15px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @php
            $areasSeleccionadas = session()->hasOldInput() ? old('areas', []) : array_keys($asignaciones);
            $rolesSeleccionados = session()->hasOldInput() ? old('roles_area', []) : $asignaciones;
        @endphp

        <form action="/usuarios/docentes/{{ $academico->user_id }}" method="POST">
            @csrf
            @method('PUT')
            
            <fieldset style="margin-bottom: 20px; padding: 10px;">
                <legend>Datos Personales y de Identificación</legend>
                
                <p>
                    <label>Nombre Completo:</label><br>
                    <input type="text" name="name" value="{{ old('name', $academico->user->name) }}" required>
                </p>
                
                <p>
                    <label>Correo Electrónico:</label><br>
                    <input type="email" name="email" value="{{ old('email', $academico->user->email) }}" required>
                </p>
                
                <p>
                    <label>Nueva Contraseña (dejar en blanco para no cambiar):</label><br>
                    <input type="password" name="password">
                </p>

                <p>
                    <label>CURP:</label><br>
                    <input type="text" name="CURP" value="{{ old('CURP', $academico->user->CURP) }}" maxlength="18" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </p>
                
                <p>
                    <label>RFC:</label><br>
                    <input type="text" name="RFC" value="{{ old('RFC', $academico->RFC) }}" maxlength="13" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </p>

                <p>
                    <label>Número de Empleado (Opcional):</label><br>
                    <input type="text" name="employe_number" value="{{ old('employe_number', $academico->employe_number) }}" maxlength="10">
                </p>
            </fieldset>

            <fieldset style="margin-bottom: 20px; padding: 10px;">
                <legend>División SUA</legend>
                @php
                    $areasSua = [
                        ['id' => 7, 'name' => 'Educativa'],
                        ['id' => 8, 'name' => 'Clínica'],
                        ['id' => 9, 'name' => 'Cognitivo Conductual'],
                        ['id' => 10, 'name' => 'Organizacional'],
                        ['id' => 11, 'name' => 'Social'],
                        ['id' => 12, 'name' => 'Neuro'],
                    ];
                @endphp

                @foreach($areasSua as $area)
                    <p>
                        <input type="checkbox" name="areas[]" value="{{ $area['id'] }}" {{ in_array($area['id'], $areasSeleccionadas) ? 'checked' : '' }}>
                        <label>{{ $area['name'] }}</label>
                        
                        <select name="roles_area[{{ $area['id'] }}]">
                            <option value="">Seleccionar rol...</option>
                            <option value="1" {{ ($rolesSeleccionados[$area['id']] ?? '') == '1' ? 'selected' : '' }}>Docente / Profesor</option>
                            <option value="2" {{ ($rolesSeleccionados[$area['id']] ?? '') == '2' ? 'selected' : '' }}>Tutor Académico</option>
                            <option value="3" {{ ($rolesSeleccionados[$area['id']] ?? '') == '3' ? 'selected' : '' }}>Funcionario</option>
                        </select>
                    </p>
                @endforeach
            </fieldset>

            <fieldset style="margin-bottom: 20px; padding: 10px;">
                <legend>División Escolarizado</legend>
                @php
                    $areasEscolarizado = [
                        ['id' => 1, 'name' => 'Educativa'],
                        ['id' => 2, 'name' => 'Clínica'],
                        ['id' => 3, 'name' => 'Cognitivo Conductual'],
                        ['id' => 4, 'name' => 'Organizacional'],
                        ['id' => 5, 'name' => 'Social'],
                        ['id' => 6, 'name' => 'Neuro'],
                    ];
                @endphp

                @foreach($areasEscolarizado as $area)
                    <p>
                        <input type="checkbox" name="areas[]" value="{{ $area['id'] }}" {{ in_array($area['id'], $areasSeleccionadas) ? 'checked' : '' }}>
                        <label>{{ $area['name'] }}</label>
                        
                        <select name="roles_area[{{ $area['id'] }}]">
                            <option value="">Seleccionar rol...</option>
                            <option value="1" {{ ($rolesSeleccionados[$area['id']] ?? '') == '1' ? 'selected' : '' }}>Docente / Profesor</option>
                            <option value="2" {{ ($rolesSeleccionados[$area['id']] ?? '') == '2' ? 'selected' : '' }}>Tutor Académico</option>
                            <option value="3" {{ ($rolesSeleccionados[$area['id']] ?? '') == '3' ? 'selected' : '' }}>Funcionario</option>
                        </select>
                    </p>
                @endforeach
            </fieldset>

            <button type="submit">Guardar Cambios</button>
            <a href="/usuarios/consultar-academicos" style="margin-left: 10px;">Cancelar</a>
        </form>
    </div>
</x-layouts.app>