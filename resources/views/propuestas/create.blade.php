<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                
                <div class="mb-8 border-b border-gray-200 dark:border-neutral-700 pb-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Registrar Nueva Propuesta</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Asigna la materia, horario, aula y docentes para el periodo en curso.</p>
                </div>

                <form action="#" method="POST" class="space-y-6">
                    
                    <!-- Sección: Datos de la Materia y Horario -->
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">1. Detalles de la Clase</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Materia</label>
                            <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option>Selecciona una materia...</option>
                                <option>Psicologia 1</option>
                                <option>Psicología 2</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Día de la semana</label>
                            <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option>Lunes y Miércoles</option>
                                <option>Lunes y Martes</option>
                                <option>Martes y Jueves</option>
                                <option>Viernes</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horario</label>
                            <input type="time" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Aula</label>
                            <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option>A301</option>
                                <option>Laboratorio L205</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cupo máximo</label>
                            <input type="number" placeholder="Ej. 40" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grupo</label>
                            <input type="text" placeholder="Ej. 1152" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <hr class="border-gray-200 dark:border-neutral-700 my-6">

                    <!-- Sección: Asignación de Docentes (Reflejando la tabla pivote) -->
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">2. Asignación de Docentes</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 dark:bg-neutral-900 p-4 rounded-lg border border-gray-100 dark:border-neutral-800">
                        <!-- Docente 1 -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Docente Principal</label>
                            <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option>Seleccionar docente...</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas asignadas (Docente 1)</label>
                            <input type="number" placeholder="Horas" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        
                        <!-- Docente 2 (Opcional) -->
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Docente Secundario (Opcional)</label>
                            <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option>Seleccionar docente...</option>
                            </select>
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas asignadas (Docente 2)</label>
                            <input type="number" placeholder="Horas" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex justify-end gap-4 mt-8">
                        <a href="/dashboard" class="inline-flex items-center px-4 py-2 bg-white dark:bg-neutral-800 border border-gray-300 dark:border-neutral-600 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-neutral-700">
                            Cancelar
                        </a>
                        <button type="button" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                            Guardar y Enviar a Coordinador
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layouts.app>