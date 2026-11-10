<x-layouts.app>
    <x-slot name="header">
        <h2>Gestión de Usuarios</h2>
    </x-slot>

    <div style="padding: 20px;">

        <!-- Alertas de Éxito -->
        @if(session('success'))
        <div style="background-color: #d1fae5; border: 1px solid #34d399; color: #065f46; padding: 15px; margin-bottom: 20px;">
            <strong>Éxito:</strong> {{ session('success') }}
        </div>
        @endif

        <!-- Alertas de Error -->
        @if($errors->any())
        <div style="background-color: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 15px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Contenedor de Tarjetas (Estilo Clásico) -->
        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            
            <!-- Tarjeta: Alta de Alumnos -->
            <a href="/usuarios/alta-alumnos" style="border: 1px solid #e5e7eb; padding: 20px; background: white; width: 250px; text-align: center; text-decoration: none; color: black; display: block;">
                <div style="font-size: 24px; color: #4f46e5; margin-bottom: 10px;">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3 style="margin: 0 0 10px 0; font-size: 18px;">Alta de Alumnos</h3>
                <p style="font-size: 14px; color: #6b7280; margin: 0;">Registra un nuevo usuario en el sistema como estudiante</p>
            </a>

            <!-- Tarjeta: Alta de Docentes -->
            <a href="/usuarios/alta-docentes" style="border: 1px solid #e5e7eb; padding: 20px; background: white; width: 250px; text-align: center; text-decoration: none; color: black; display: block;">
                <div style="font-size: 24px; color: #4f46e5; margin-bottom: 10px;">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3 style="margin: 0 0 10px 0; font-size: 18px;">Alta de Docentes</h3>
                <p style="font-size: 14px; color: #6b7280; margin: 0;">Registra un nuevo usuario en el sistema como docente o funcionario</p>
            </a>

            <!-- Tarjeta: Consultar Alumnos -->
            <a href="/usuarios/consultar-alumnos" style="border: 1px solid #e5e7eb; padding: 20px; background: white; width: 250px; text-align: center; text-decoration: none; color: black; display: block;">
                <div style="font-size: 24px; color: #4f46e5; margin-bottom: 10px;">
                    <i class="fas fa-users"></i>
                </div>
                <h3 style="margin: 0 0 10px 0; font-size: 18px;">Consultar Alumnos</h3>
                <p style="font-size: 14px; color: #6b7280; margin: 0;">Despliega la lista de los usuarios registrados en el sistema</p>
            </a>

            <!-- Tarjeta: Consultar Académicos -->
           <a href="/usuarios/consultar-academicos" style="border: 1px solid #e5e7eb; padding: 20px; background: white; width: 250px; text-align: center; text-decoration: none; color: black; display: block;">
                <div style="font-size: 24px; color: #4f46e5; margin-bottom: 10px;">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3 style="margin: 0 0 10px 0; font-size: 18px;">Consultar Académicos</h3>
                <p style="font-size: 14px; color: #6b7280; margin: 0;">Despliega la lista de los usuarios registrados en el sistema</p>
            </a>

        </div>
    </div>
</x-layouts.app>