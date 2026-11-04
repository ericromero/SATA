<x-layouts.app>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Alta de Usuarios Estudiantes</h1>
    </div>

    <!-- Iniciamos el formulario apuntando a la ruta POST -->
    <form action="/usuarios/alta-alumnos" method="POST" class="relative h-[calc(100vh-14rem)]">
        @csrf
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6">
            <!-- Fila 1: Etiquetas -->
            <div class="flex flex-row justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/50 rounded-t-xl">
                <div class="font-bold text-sm text-gray-900 w-1/3 text-left">Nombre Completo</div>
                <div class="font-bold text-sm text-gray-900 w-1/3 text-center">Correo Electrónico</div>
                <div class="font-bold text-sm text-gray-900 w-1/3 text-right">Contraseña</div>
            </div>
            
            <!-- Fila 1: Inputs -->
            <div class="flex flex-row justify-between px-6 py-4 border-b border-gray-100">
                <div class="w-1/3 pr-4">
                    <input type="text" name="name" required placeholder="Nombre completo" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 outline-none">
                </div>
                <div class="w-1/3 px-2">
                    <input type="email" name="email" required placeholder="usuario@psicologia.unam.mx" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 outline-none text-center">
                </div>
                <div class="w-1/3 pl-4">
                    <input type="password" name="password" required placeholder="Contraseña de acceso" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 text-right outline-none">
                </div>
            </div>

            <!-- Fila 2: Etiquetas -->
            <div class="flex flex-row justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <div class="font-bold text-sm text-gray-900 w-1/3 text-left">Fecha de Nacimiento</div>
                <div class="font-bold text-sm text-gray-900 w-1/3 text-center">CURP</div>
                <div class="font-bold text-sm text-gray-900 w-1/3 text-right">Número de Cuenta</div>
            </div>
            
            <!-- Fila 2: Inputs -->
            <div class="flex flex-row justify-between px-6 py-4">
                <div class="w-1/3 pr-4">
                    <input type="date" name="birthday" required class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 bg-transparent p-0 outline-none text-left text-gray-400 focus:text-gray-600">
                </div>
                <div class="w-1/3 px-2">
                    <input type="text" name="CURP" maxlength="18" required placeholder="18 caracteres" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 outline-none text-center uppercase">
                </div>
                <div class="w-1/3 pl-4">
                    <input type="text" name="account_number" maxlength="10" required placeholder="Ej. 321586447" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 text-right outline-none">
                </div>
            </div>
        </div>

        <!-- Botón Aceptar tipo submit -->
        <div class="absolute bottom-0 right-0">
            <button type="submit" class="bg-[#3b2d59] hover:bg-[#2A0E5C] text-white font-medium py-2 px-8 rounded-lg shadow transition-colors">
                Aceptar
            </button>
        </div>
    </form>
</x-layouts.app>