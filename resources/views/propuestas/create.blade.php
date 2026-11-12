<x-layouts.app>
    <div class="py-12" x-data="{ metodo: 'excel' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                
                <div class="mb-6 border-b border-gray-200 dark:border-neutral-700 pb-4 flex justify-between items-end">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Registrar Propuestas</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Ingresa las materias para el periodo mediante carga masiva o registro individual.</p>
                    </div>
                </div>

                <!-- Tabs de navegación -->
                <div class="flex space-x-1 bg-gray-100 dark:bg-neutral-900 p-1 rounded-lg mb-8 max-w-md">
                    <button @click="metodo = 'excel'" 
                            :class="metodo === 'excel' ? 'bg-white dark:bg-neutral-800 shadow text-indigo-600 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900'"
                            class="flex-1 py-2 px-4 rounded-md text-sm font-medium transition-all">
                        Carga Masiva (Excel)
                    </button>
                    <button @click="metodo = 'manual'" 
                            :class="metodo === 'manual' ? 'bg-white dark:bg-neutral-800 shadow text-indigo-600 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900'"
                            class="flex-1 py-2 px-4 rounded-md text-sm font-medium transition-all">
                        Registro Manual
                    </button>
                </div>

                <!-- OPCIÓN 1: CARGA MASIVA POR EXCEL -->
                <div x-show="metodo === 'excel'" class="space-y-6">
                    <div class="bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-100 dark:border-indigo-800 rounded-lg p-4 flex items-start gap-4">
                        <svg class="w-6 h-6 text-indigo-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <div>
                            <h4 class="text-sm font-semibold text-indigo-900 dark:text-indigo-300">Descarga la plantilla oficial</h4>
                            <p class="text-sm text-indigo-700 dark:text-indigo-400 mt-1">Para evitar errores en la importación, asegúrate de utilizar el formato predefinido con las columnas correctas (Materia, Grupo, Día, Hora Inicio, Aula, Docentes).</p>
                            <a href="#" class="inline-block mt-2 text-sm font-medium text-indigo-600 hover:text-indigo-800 underline">Descargar plantilla_propuestas.xlsx</a>
                        </div>
                    </div>

                    <div class="mt-4 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-neutral-600 border-dashed rounded-md hover:border-indigo-500 transition-colors bg-gray-50 dark:bg-neutral-900/50 cursor-pointer">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600 dark:text-gray-400 justify-center">
                                <label for="file-upload" class="relative cursor-pointer bg-transparent rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                    <span>Sube un archivo .xlsx</span>
                                    <input id="file-upload" name="file-upload" type="file" class="sr-only" accept=".xlsx, .csv">
                                </label>
                                <p class="pl-1">o arrástralo y suéltalo aquí</p>
                            </div>
                            <p class="text-xs text-gray-500">Excel o CSV hasta 10MB</p>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button type="button" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700">
                            Procesar e Importar Propuestas
                        </button>
                    </div>
                </div>

                <!-- OPCIÓN 2: REGISTRO MANUAL -->
                <div x-show="metodo === 'manual'" style="display: none;">
                    <form action="#" method="POST" class="space-y-6">
                        <!-- Datos de la Materia -->
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
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora inicio</label>
                                <input type="time" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Hora fin</label>
                                <input type="time" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Aula</label>
                                <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option>Aula A301</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Grupo</label>
                                <input type="text" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <hr class="border-gray-200 dark:border-neutral-700 my-6">

                        <!-- Asignación de Docentes (Actualizado) -->
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Asignación de Docentes</h3>
                        <div class="bg-gray-50 dark:bg-neutral-900 p-6 rounded-lg border border-gray-100 dark:border-neutral-800 space-y-6">
                            
                            <!-- Docente 1 (Titular) -->
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                    Docente Titular (Encargado de firmar) *
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Seleccionar docente</label>
                                        <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <option>Seleccionar...</option>
                                            <option>Mtra. Ana Gómez</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas asignadas</label>
                                        <input type="number" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. 4">
                                    </div>
                                </div>
                            </div>

                            <hr class="border-gray-200 dark:border-neutral-700">

                            <!-- Docente 2 (Opcional) -->
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 dark:text-white mb-3 text-gray-500">Segundo Docente (Opcional)</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Seleccionar docente</label>
                                        <select class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <option>Ninguno (Dejar en blanco)</option>
                                            <option>Dr. Juan Pérez</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Horas asignadas</label>
                                        <input type="number" class="mt-1 block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ej. 2">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex justify-end gap-4 mt-8">
                            <button type="button" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                Guardar y Enviar Manualmente
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>