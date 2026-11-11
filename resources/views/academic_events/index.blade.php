<x-layouts.app>
    <!-- Wrapper con fondo claro forzado -->
    <div class="min-h-screen bg-gray-50 p-8">
        <div class="max-w-7xl mx-auto">
            <!-- Título principal -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Eventos Académicos</h1>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Grid de Tarjetas (3 columnas) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- 1. Registrar Evento (Redirige a la Gestión de borradores) -->
                <a href="{{ route('academic-events.manage') }}" 
                class="group bg-white border border-gray-200 rounded-xl p-8 text-center flex flex-col items-center hover:border-indigo-500 hover:shadow-sm transition duration-150">
                    <div class="text-indigo-600 mb-4 group-hover:scale-105 transition-transform">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Registrar Evento</h3>
                    <p class="text-sm text-gray-500 leading-snug">Registrar un nuevo evento o actualiza un borrador</p>
                </a>
                
                <!-- 2. Cancelar Evento -->
                <a href="{{ route('academic-events.cancel') }}"
                   class="group bg-white border border-gray-200 rounded-xl p-8 text-center flex flex-col items-center hover:border-indigo-500 hover:shadow-sm transition duration-150">
                    <div class="text-indigo-600 mb-4 group-hover:scale-105 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12l4 4m0-4l-4 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Cancelar Evento</h3>
                    <p class="text-sm text-gray-500 leading-snug">Anular un evento antes de su realización</p>
                </a>

                <!-- 3. Reprogramar Evento -->
                <a href="{{ route('academic-events.reprogram') }}" 
                   class="group bg-white border border-gray-200 rounded-xl p-8 text-center flex flex-col items-center hover:border-indigo-500 hover:shadow-sm transition duration-150">
                    <div class="text-indigo-600 mb-4 group-hover:scale-105 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Reprogramar Evento</h3>
                    <p class="text-sm text-gray-500 leading-snug">Modificar la fecha u horario de un evento académico</p>
                </a>

                <!-- 4. Lista de Inscritos -->
                <a href="{{ route('academic-events.enrolled') }}"
                   class="group bg-white border border-gray-200 rounded-xl p-8 text-center flex flex-col items-center hover:border-indigo-500 hover:shadow-sm transition duration-150">
                    <div class="text-indigo-600 mb-4 group-hover:scale-105 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Lista de Inscritos</h3>
                    <p class="text-sm text-gray-500 leading-snug">Visualizar la lista de participantes registrados</p>
                </a>

                <!-- 5. Asignar calificaciones -->
                <a href="{{ route('academic-events.grades') }}"
                   class="group bg-white border border-gray-200 rounded-xl p-8 text-center flex flex-col items-center hover:border-indigo-500 hover:shadow-sm transition duration-150">
                    <div class="text-indigo-600 mb-4 group-hover:scale-105 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Asignar calificaciones</h3>
                    <p class="text-sm text-gray-500 leading-snug">Visualizar lista de los alumnos acreditados</p>
                </a>

                <!-- 6. Descargar Constancias -->
                <a href="{{ route('academic-events.certificates') }}"
                   class="group bg-white border border-gray-200 rounded-xl p-8 text-center flex flex-col items-center hover:border-indigo-500 hover:shadow-sm transition duration-150">
                    <div class="text-indigo-600 mb-4 group-hover:scale-105 transition-transform">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-gray-900 mb-1">Descargar Constancias</h3>
                    <p class="text-sm text-gray-500 leading-snug">Emitir constancias de participación del evento</p>
                </a>

            </div>
        </div>
    </div>
</x-layouts.app>