<x-layouts.app>
    <x-slot name="header">
        <h2>Editar Alumno</h2>
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

        <form action="/usuarios/alumnos/{{ $alumno->user_id }}" method="POST">
            @csrf
            @method('PUT')

            <fieldset style="margin-bottom: 20px; padding: 10px;">
                <legend>Datos del Alumno</legend>

                <p>
                    <label>Nombre Completo:</label><br>
                    <input type="text" name="name" value="{{ old('name', $alumno->user->name) }}" required>
                </p>

                <p>
                    <label>Correo Electrónico:</label><br>
                    <input type="email" name="email" value="{{ old('email', $alumno->user->email) }}" required>
                </p>

                <p>
                    <label>Nueva Contraseña (dejar en blanco para no cambiar):</label><br>
                    <input type="password" name="password">
                </p>

                <p>
                    <label>CURP:</label><br>
                    <input type="text" name="CURP" value="{{ old('CURP', $alumno->user->CURP) }}" maxlength="18" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </p>

                <p>
                    <label>Número de Cuenta:</label><br>
                    <input type="text" name="account_number" value="{{ old('account_number', $alumno->account_number) }}" maxlength="9" minlength="9" required>
                </p>
            </fieldset>

            <button type="submit">Guardar Cambios</button>
            <a href="/usuarios/consultar-alumnos" style="margin-left: 10px;">Cancelar</a>
        </form>
    </div>
</x-layouts.app>