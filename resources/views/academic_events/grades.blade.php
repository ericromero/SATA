<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Encabezado de Navegación -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Asignación de Calificaciones</h1>
                    <p class="text-sm text-gray-500">Selecciona un evento para asignar o editar las calificaciones de los alumnos</p>
                </div>
                <a href="{{ route('academic-events.index') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Eventos Académicos
                </a>
            </div>

            <!-- Grid de Tarjetas de Eventos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- TARJETA 1: Pendiente o Calificado -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 mb-2">Taller de Estrategias de Aprendizaje</h3>
                        <div class="mb-6">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                Pendiente de calificar
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.grades-form', 1) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Calificar alumnos
                    </a>
                </div>

                <!-- TARJETA 2 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 mb-2">Curso Psicología Educativa 2</h3>
                        <div class="mb-6">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                Pendiente de calificar
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.grades-form', 2) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Calificar alumnos
                    </a>
                </div>

                <!-- TARJETA 3 -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 mb-2">Seminario de Inclusión Educativa</h3>
                        <div class="mb-6">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                Pendiente de calificar
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.grades-form', 3) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Calificar alumnos
                    </a>
                </div>

                <!-- TARJETA 4: Ejemplo con Calificaciones Emitidas -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 mb-2">Curso de Evaluación del Aprendizaje</h3>
                        <div class="mb-6">
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Calificaciones emitidas
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.grades-form', 4) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Calificar alumnos
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>