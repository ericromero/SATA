<x-app-layout>
    <div class="min-h-screen bg-gray-200 py-12 px-4 sm:px-6 lg:px-8 flex flex-col justify-center items-center">
        <!-- Título principal -->
        <h1 class="text-4xl font-extrabold text-gray-900 mb-10 tracking-tight text-center">
            Eventos Académicos
        </h1>

        <!-- Grid de tarjetas (2 filas, 3 columnas) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl w-full">
            
            <!-- Tarjeta 1: Registrar Evento -->
            <a href="{{ route('events.management') }}" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col items-center text-center group cursor-pointer">
                <div class="p-3 bg-purple-50 text-purple-700 rounded-xl mb-4 group-hover:bg-purple-100 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l2 2 4-4" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Registrar Evento</h2>
                <p class="text-sm text-gray-500">Registrar un nuevo evento o actualiza un borrador</p>
            </a>

            <!-- Tarjeta 2: Cancelar Evento -->
            <a href="#" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col items-center text-center group opacity-60">
                <div class="p-3 bg-purple-50 text-purple-700 rounded-xl mb-4 group-hover:bg-purple-100 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l4 4m0-4l-4 4" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Cancelar Evento</h2>
                <p class="text-sm text-gray-500">Anular un evento antes de su realización</p>
            </a>

            <!-- Tarjeta 3: Reprogramar Evento -->
            <a href="#" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col items-center text-center group opacity-60">
                <div class="p-3 bg-purple-50 text-purple-700 rounded-xl mb-4 group-hover:bg-purple-100 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Reprogramar Evento</h2>
                <p class="text-sm text-gray-500">Modificar la fecha u horario de un evento académico</p>
            </a>

            <!-- Tarjeta 4: Lista de Inscritos -->
            <a href="#" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col items-center text-center group opacity-60">
                <div class="p-3 bg-purple-50 text-purple-700 rounded-xl mb-4 group-hover:bg-purple-100 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Lista de Inscritos</h2>
                <p class="text-sm text-gray-500">Visualizar la lista de participantes registrados</p>
            </a>

            <!-- Tarjeta 5: Asignar calificaciones -->
            <a href="#" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col items-center text-center group opacity-60">
                <div class="p-3 bg-purple-50 text-purple-700 rounded-xl mb-4 group-hover:bg-purple-100 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Asignar calificaciones</h2>
                <p class="text-sm text-gray-500">Visualizar lista de los alumnos acreditados</p>
            </a>

            <!-- Tarjeta 6: Descargar Constancias -->
            <a href="#" class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-200 flex flex-col items-center text-center group opacity-60">
                <div class="p-3 bg-purple-50 text-purple-700 rounded-xl mb-4 group-hover:bg-purple-100 transition-colors">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900 mb-2">Descargar Constancias</h2>
                <p class="text-sm text-gray-500">Emitir constancias de participación del evento</p>
            </a>

        </div>
    </div>
</x-app-layout>