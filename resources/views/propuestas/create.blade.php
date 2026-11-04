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
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Materia</label>
                            <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option>Selecciona una materia...</option>
                                <option>Psicología I</option>
                                <option>Psicología II</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Día de la semana</label>
                            <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option>Lunes y Miércoles</option>
                                <option>Martes y Jueves</option>
                                <option>Viernes</option>
                                <option>Lunes y Viernes</option>
                            </select>
                        </div>
                        
                        <!-- Nuevos campos de tiempo -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora de inicio</label>
                            <input type="time" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora de fin</label>
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
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grupo</label>
                            <input type="text" placeholder="Ej. 1152" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <!-- Campo de Observaciones -->
                        <div class="md:col-span-4">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Observaciones</label>
                            <textarea rows="3" placeholder="Añade detalles relevantes (ej. requiere proyector especial, el profesor tiene limitación de movilidad, etc.)" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>
                    </div>

                    <hr class="border-gray-200 dark:border-neutral-700 my-6">

                    <!-- Sección: Asignación de Docentes (Interactiva con Alpine.js) -->
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">2. Asignación de Docentes</h3>
                    
                    <div x-data="{ mostrarSegundoProfesor: false }" class="bg-gray-50 dark:bg-neutral-900 p-6 rounded-lg border border-gray-100 dark:border-neutral-800">
                        
                        <!-- Docente 1 (Siempre visible) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Docente Principal</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option>Seleccionar docente...</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas asignadas (Docente 1)</label>
                                <input type="number" placeholder="Ej. 4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>
                        
                        <!-- Botón para agregar Docente 2 -->
                        <div x-show="!mostrarSegundoProfesor" class="mt-4">
                            <button type="button" @click="mostrarSegundoProfesor = true" class="text-sm font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Agregar profesor secundario (compartido)
                            </button>
                        </div>

                        <!-- Docente 2 (Oculto por defecto) -->
                        <div x-show="mostrarSegundoProfesor" style="display: none;" class="mt-6 pt-6 border-t border-gray-200 dark:border-neutral-700 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Docente Secundario</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option>Seleccionar docente...</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas asignadas (Docente 2)</label>
                                <input type="number" placeholder="Ej. 2" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <!-- Botón para quitar Docente 2 -->
                            <div class="md:col-span-2">
                                <button type="button" @click="mostrarSegundoProfesor = false" class="text-sm font-medium text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                    Quitar profesor secundario
                                </button>
                            </div>
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