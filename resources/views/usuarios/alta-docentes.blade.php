<x-layouts.app>
    <x-slot name="header">
        <h2>Alta de Docentes y Funcionarios</h2>
    </x-slot>

    <div style="padding: 20px;">
        <form action="/usuarios/alta-docentes" method="POST">
            @csrf
            
            <fieldset style="margin-bottom: 20px; padding: 10px;">
                <legend>Datos Personales y de Identificación</legend>
                
                <p>
                    <label>Nombre Completo:</label><br>
                    <input type="text" name="name" required>
                </p>
                
                <p>
                    <label>Correo Electrónico:</label><br>
                    <input type="email" name="email" required>
                </p>
                
                <p>
                    <label>Contraseña:</label><br>
                    <input type="password" name="password" required>
                </p>

                <p>
                    <label>CURP:</label><br>
                    <input type="text" name="CURP" maxlength="18" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </p>
                
                <p>
                    <label>RFC:</label><br>
                    <input type="text" name="RFC" maxlength="13" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
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

                @foreach($areasSua as $area)
                    <p>
                        <input type="checkbox" name="areas[]" value="{{ $area['id'] }}">
                        <label>{{ $area['name'] }}</label>
                        
                        <select name="roles_area[{{ $area['id'] }}]">
                            <option value="">Seleccionar rol...</option>
                            <option value="1">Docente / Profesor</option>
                            <option value="2">Tutor Académico</option>
                            <option value="3">Funcionario</option>
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
                        <input type="checkbox" name="areas[]" value="{{ $area['id'] }}">
                        <label>{{ $area['name'] }}</label>
                        
                        <select name="roles_area[{{ $area['id'] }}]">
                            <option value="">Seleccionar rol...</option>
                            <option value="1">Docente / Profesor</option>
                            <option value="2">Tutor Académico</option>
                            <option value="3">Funcionario</option>
                        </select>
                    </p>
                @endforeach
            </fieldset>

            <button type="submit">Aceptar / Guardar Docente</button>
        </form>
    </div>
</x-layouts.app>