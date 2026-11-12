<x-layouts.app>
    <x-slot name="header">
        <h2>Alta de Docentes y Funcionarios</h2>
    </x-slot>

    <div style="padding: 20px;">
        
        <!-- Alerta de Errores de Validación -->
        @if($errors->any())
        <div style="background-color: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 15px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as$error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/usuarios/alta-docentes" method="POST">
            @csrf
            
            <fieldset style="margin-bottom: 20px; padding: 10px;">
                <legend>Datos Personales y de Identificación</legend>
                
                <p>
                    <label>Nombre Completo:</label><br>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </p>
                
                <p>
                    <label>Correo Electrónico:</label><br>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </p>
                
                <p>
                    <label>Contraseña:</label><br>
                    <input type="password" name="password" required>
                </p>

                <p>
                    <label>CURP:</label><br>
                    <input type="text" name="CURP" value="{{ old('CURP') }}" maxlength="18" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </p>
                
                <p>
                    <label>RFC:</label><br>
                    <input type="text" name="RFC" value="{{ old('RFC') }}" maxlength="13" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </p>

                <p>
                    <label>Número de Empleado (Opcional):</label><br>
                    <input type="text" name="employe_number" value="{{ old('employe_number') }}" maxlength="10">
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

                @foreach($areasSua as$area)
                    <p>
                        <input type="checkbox" name="areas[]" value="{{ $area['id'] }}" {{ is_array(old('areas')) && in_array($area['id'], old('areas')) ? 'checked' : '' }}>
                        <label>{{ $area['name'] }}</label>
                        
                        <select name="roles_area[{{ $area['id'] }}]">
                            <option value="">Seleccionar rol...</option>
                            <option value="1" {{ old("roles_area.{$area['id']}") == '1' ? 'selected' : '' }}>Docente / Profesor</option>
                            <option value="2" {{ old("roles_area.{$area['id']}") == '2' ? 'selected' : '' }}>Tutor Académico</option>
                            <option value="3" {{ old("roles_area.{$area['id']}") == '3' ? 'selected' : '' }}>Funcionario</option>
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

                @foreach($areasEscolarizado as$area)
                    <p>
                        <input type="checkbox" name="areas[]" value="{{ $area['id'] }}" {{ is_array(old('areas')) && in_array($area['id'], old('areas')) ? 'checked' : '' }}>
                        <label>{{ $area['name'] }}</label>
                        
                        <select name="roles_area[{{ $area['id'] }}]">
                            <option value="">Seleccionar rol...</option>
                            <option value="1" {{ old("roles_area.{$area['id']}") == '1' ? 'selected' : '' }}>Docente / Profesor</option>
                            <option value="2" {{ old("roles_area.{$area['id']}") == '2' ? 'selected' : '' }}>Tutor Académico</option>
                            <option value="3" {{ old("roles_area.{$area['id']}") == '3' ? 'selected' : '' }}>Funcionario</option>
                        </select>
                    </p>
                @endforeach
            </fieldset>

            <button type="submit">Aceptar / Guardar Docente</button>
        </form>
    </div>
</x-layouts.app>