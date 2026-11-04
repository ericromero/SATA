<x-layouts.app>
    <!-- Barra Superior: Botón Alta, Buscador, Filtros y Solicitar Alta -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
        
        <!-- Botón Verde Alta Alumnos -->
        <a href="/usuarios/alta-alumnos" class="bg-[#4ade80] hover:bg-[#22c55e] text-gray-900 font-bold px-6 py-2.5 rounded-lg shadow-sm transition-colors text-sm">
            Alta Alumnos
        </a>

        <!-- Input de Búsqueda Central -->
        <div class="flex-1 max-w-md">
            <input type="text" placeholder="Ingrese algún dato" class="w-full bg-white border border-gray-200 rounded-lg px-4 py-2.5 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500 shadow-sm">
        </div>

        <!-- Botones de la derecha (Filtros y Solicitar Alta) -->
        <div class="flex items-center gap-3">
            <button class="bg-[#818cf8] hover:bg-[#6366f1] text-white font-medium px-5 py-2.5 rounded-lg shadow-sm transition-colors text-sm">
                Filtros
            </button>
            <button class="bg-[#fde047] hover:bg-[#facc15] text-gray-900 font-medium px-5 py-2.5 rounded-lg shadow-sm transition-colors text-sm">
                Solicitar Alta
            </button>
        </div>
    </div>

    <!-- Contenedor de la Tabla -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-200/60 border-b border-gray-200 text-sm text-gray-900">
                    <th class="px-6 py-4 font-bold">Apellidos / Nombre(s)</th>
                    <th class="px-6 py-4 font-bold">Número de Cuenta</th>
                    <th class="px-6 py-4 font-bold">Correo Electrónico</th>
                    <th class="px-6 py-4 font-bold text-right pr-8">Modificar</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-600 divide-y divide-gray-100">
                
                @foreach($alumnos as $alumno)
                <tr class="hover:bg-gray-50 transition-colors">
                    <!-- Nombre Completo -->
                    <td class="px-6 py-4 font-medium text-gray-900">{{ $alumno->user->name ?? 'N/A' }}</td>
                    
                    <!-- Número de Cuenta -->
                    <td class="px-6 py-4">{{ $alumno->account_number }}</td>
                    
                    <!-- Correo -->
                    <td class="px-6 py-4">{{ $alumno->user->email ?? 'N/A' }}</td>
                    
                    <!-- Botones Editar / Eliminar -->
                    <td class="px-6 py-4 text-right space-x-2">
                        <button class="bg-[#6366f1] hover:bg-[#4f46e5] text-white text-xs font-semibold px-4 py-2 rounded-lg shadow transition-colors">
                            Editar
                        </button>
                        <button class="bg-[#ef4444] hover:bg-[#dc2626] text-white text-xs font-semibold px-4 py-2 rounded-lg shadow transition-colors">
                            Eliminar
                        </button>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        
        @if($alumnos->isEmpty())
        <div class="p-8 text-center text-gray-500">
            Aún no hay alumnos registrados en el sistema.
        </div>
        @endif
    </div>
</x-layouts.app>