<x-layouts.app>
    <x-slot name="header">
        <h2>Alta de Alumnos</h2>
    </x-slot>

    <div style="padding: 20px;">
        <form action="/usuarios/alta-alumnos" method="POST">
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
                    <label>Número de Cuenta:</label><br>
                    <input type="text" name="account_number" maxlength="10" required>
                </p>
            </fieldset>

            <button type="submit">Aceptar / Guardar Alumno</button>
        </form>
    </div>
</x-layouts.app>