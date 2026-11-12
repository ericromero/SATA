<x-layouts.app>
    <x-slot name="header">
        <h2>Alta de Alumnos</h2>
    </x-slot>

    <div style="padding: 20px;">
        
        <!-- Alerta de Errores de Validación -->
        @if($errors->any())
        <div style="background-color: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 15px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/usuarios/alta-alumnos" method="POST">
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
                    <!-- La contraseña nunca se recupera con old() por seguridad -->
                    <input type="password" name="password" required>
                </p>

                <p>
                    <label>CURP:</label><br>
                    <input type="text" name="CURP" value="{{ old('CURP') }}" maxlength="18" required style="text-transform: uppercase;" oninput="this.value = this.value.toUpperCase()">
                </p>

                <p>
                    <label>Número de Cuenta:</label><br>
                    <input type="text" name="account_number" value="{{ old('account_number') }}" maxlength="9" required>
                </p>
            </fieldset>

            <button type="submit">Aceptar / Guardar Alumno</button>
        </form>
    </div>
</x-layouts.app>