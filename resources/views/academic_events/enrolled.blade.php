<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Encabezado de Navegación -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Eventos con participantes inscritos</h1>
                    <p class="text-sm text-gray-500">Consulta la cantidad de alumnos inscritos y el pase de lista a cada uno de ellos</p>
                </div>
                <a href="{{ route('academic-events.index') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Eventos Académicos
                </a>
            </div>

            <!-- Grid de Tarjetas de Eventos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- TARJETA 1 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Taller de Estrategias de Aprendizaje</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Evento publicado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 20/05/2026</p>
                            <p><strong>LUGAR:</strong> Aula 101 - Edificio A</p>
                            <p><strong>INSCRITOS:</strong> 25 alumnos</p>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.enrolled-list', 1) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Ver inscritos
                    </a>
                </div>

                <!-- TARJETA 2 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Curso Psicología Educativa 2</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Evento publicado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 22/05/2026</p>
                            <p><strong>LUGAR:</strong> Auditorio Sor Juana</p>
                            <p><strong>INSCRITOS:</strong> 30 alumnos</p>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.enrolled-list', 2) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Ver inscritos
                    </a>
                </div>

                <!-- TARJETA 3 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Seminario de Inclusión Educativa</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Evento publicado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 28/05/2026</p>
                            <p><strong>LUGAR:</strong> Aula Magna</p>
                            <p><strong>INSCRITOS:</strong> 18 alumnos</p>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.enrolled-list', 3) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Ver inscritos
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>