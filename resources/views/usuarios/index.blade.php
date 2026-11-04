<x-layouts.app>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gestión de Usuarios</h1>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
        <span class="block sm:inline"><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 shadow-sm">
        <ul class="list-disc pl-5 text-sm">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <!-- Grid de Tarjetas (Botones de Atajo) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Tarjeta: Alta de Alumnos -->
        <a href="/usuarios/alta-alumnos" class="block bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center mb-3">
                <i class="fas fa-user-plus text-2xl text-[#2A0E5C]"></i>
            </div>
            <h2 class="text-lg font-bold text-center text-gray-900 mb-2">Alta de Alumnos</h2>
            <p class="text-xs text-gray-500 text-center">Registra un nuevo usuario en el sistema como estudiante</p>
        </a>

        <!-- Tarjeta: Alta de Docentes -->
        <a href="/usuarios/alta-docentes" class="block bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center mb-3">
                <i class="fas fa-user-tie text-2xl text-[#2A0E5C]"></i>
            </div>
            <h2 class="text-lg font-bold text-center text-gray-900 mb-2">Alta de Docentes</h2>
            <p class="text-xs text-gray-500 text-center">Registra un nuevo usuario en el sistema como docente o funcionario</p>
        </a>

        <!-- Tarjeta: Consultar Alumnos -->
        <a href="/usuarios/consultar-alumnos" class="block bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center mb-3">
                <i class="fas fa-users text-2xl text-[#2A0E5C]"></i>
            </div>
            <h2 class="text-lg font-bold text-center text-gray-900 mb-2">Consultar Alumnos</h2>
            <p class="text-xs text-gray-500 text-center">Despliega la lista de los usuarios registrados en el sistema</p>
        </a>

        <!-- Tarjeta: Consultar Académicos -->
        <a href="#" class="block bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow border border-gray-100">
            <div class="text-center mb-3">
                <i class="fas fa-chalkboard-teacher text-2xl text-[#2A0E5C]"></i>
            </div>
            <h2 class="text-lg font-bold text-center text-gray-900 mb-2">Consultar Académicos</h2>
            <p class="text-xs text-gray-500 text-center">Despliega la lista de los usuarios registrados en el sistema</p>
        </a>

    </div>
</x-layouts.app>