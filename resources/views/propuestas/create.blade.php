<x-layouts.app>
    <div class="py-12" x-data="{ metodo: 'historial', paso: 1 }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                
                <div class="mb-6 border-b border-gray-200 dark:border-neutral-700 pb-4 flex justify-between items-end">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Registro de Propuestas (Secretario Técnico)</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Importa las materias del semestre anterior o registra nuevas de forma individual.</p>
                    </div>
                </div>

                <!-- Tabs de navegación -->
                <div class="flex space-x-1 bg-gray-100 dark:bg-neutral-900 p-1 rounded-lg mb-8 max-w-md">
                    <button @click="metodo = 'historial'; paso = 1" 
                            :class="metodo === 'historial' ? 'bg-white dark:bg-neutral-800 shadow text-indigo-600 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900'"
                            class="flex-1 py-2 px-4 rounded-md text-sm font-medium transition-all">
                        Cargar Historial (BD)
                    </button>
                    <button @click="metodo = 'manual'" 
                            :class="metodo === 'manual' ? 'bg-white dark:bg-neutral-800 shadow text-indigo-600 dark:text-indigo-400' : 'text-gray-600 dark:text-gray-400 hover:text-gray-900'"
                            class="flex-1 py-2 px-4 rounded-md text-sm font-medium transition-all">
                        Registro Manual
                    </button>
                </div>

                <!-- OPCIÓN 1: JALAR HISTORIAL DESDE LA BASE DE DATOS (PASO 1) -->
                <div x-show="metodo === 'historial' && paso === 1" class="space-y-6">
                    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 rounded-lg p-6 text-center">
                        <div class="mx-auto w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                        </div>
                        <h4 class="text-lg font-bold text-blue-900 dark:text-blue-300 mb-2">Recuperar Materias del Semestre Anterior</h4>
                        <p class="text-sm text-blue-700 dark:text-blue-400 max-w-lg mx-auto">
                            El sistema buscará todas las asignaturas impartidas en el ciclo anterior para tu área. Podrás revisar la lista y cambiar a los docentes titulares antes de enviar las propuestas definitivas.
                        </p>
                        
                        <div class="mt-6">
                            <button @click="paso = 2" type="button" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 shadow-sm transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Extraer datos de la Base de Datos
                            </button>
                        </div>
                    </div>
                </div>

                <!-- OPCIÓN 1: REVISIÓN DE HISTORIAL JALADO (PASO 2) -->
                <div x-show="metodo === 'historial' && paso === 2" style="display: none;" class="space-y-6">
                    <div class="flex justify-between items-center bg-green-50 dark:bg-green-900/20 p-4 rounded-lg border border-green-200 dark:border-green-800">
                        <div class="flex items-center gap-2 text-green-800 dark:text-green-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="font-semibold text-sm">Datos recuperados con éxito. Se encontraron 45 materias del semestre pasado.</span>
                        </div>
                        <button @click="paso = 1" class="text-xs text-green-700 hover:underline font-medium">Volver a extraer</button>
                    </div>

                    <p class="text-sm text-gray-600 dark:text-gray-400 font-medium">Revisa las asignaciones. Selecciona un nuevo docente titular si es necesario antes de enviar las propuestas:</p>

                    <div class="overflow-x-auto border border-gray-200 dark:border-neutral-700 rounded-lg shadow-sm">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-900">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materia y Grupo</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Horario y Aula</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Docente Titular (Reasignar)</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-neutral-700">
    
                                <!-- Fila 1 -->
                                <tr x-data="{ editar: false, docenteAsignado: 'Mtra. Ana Gómez (Anterior)' }">
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">Psicología I (Gpo: 1101)</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Lu-Mi 10:00-12:00 | A301</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        
                                        <!-- Vista normal (Texto fijo + botón) -->
                                        <div x-show="!editar" class="flex items-center justify-between">
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300" x-text="docenteAsignado"></span>
                                            <button @click="editar = true" type="button" class="text-xs text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-semibold underline ml-4 transition">
                                                Cambiar docente
                                            </button>
                                        </div>
                                        
                                        <!-- Vista de edición (Cuadro de diálogo inline) -->
                                        <div x-show="editar" style="display: none;" class="flex items-center gap-2">
                                            <select x-model="docenteAsignado" class="block w-full text-sm rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                                <option value="Mtra. Ana Gómez (Anterior)">Mtra. Ana Gómez (Anterior)</option>
                                                <option value="Dr. Juan Pérez">Dr. Juan Pérez</option>
                                                <option value="Lic. Laura Martínez">Lic. Laura Martínez</option>
                                            </select>
                                            <button @click="editar = false" type="button" class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-semibold hover:bg-green-200 transition">
                                                Guardar
                                            </button>
                                            <button @click="editar = false" type="button" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 text-xs underline">
                                                Cancelar
                                            </button>
                                        </div>
                            
                                    </td>
                                </tr>
                            
                                <!-- Fila 2 -->
                                <tr x-data="{ editar: false, docenteAsignado: 'Dr. Juan Pérez (Anterior)' }">
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">Psicología II (Gpo: 1102)</td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">Ma-Ju 08:00-10:00 | B102</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        
                                        <!-- Vista normal (Texto fijo + botón) -->
                                        <div x-show="!editar" class="flex items-center justify-between">
                                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300" x-text="docenteAsignado"></span>
                                            <button @click="editar = true" type="button" class="text-xs text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-semibold underline ml-4 transition">
                                                Cambiar docente
                                            </button>
                                        </div>
                                        
                                        <!-- Vista de edición (Cuadro de diálogo inline) -->
                                        <div x-show="editar" style="display: none;" class="flex items-center gap-2">
                                            <select x-model="docenteAsignado" class="block w-full text-sm rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                                <option value="Dr. Juan Pérez (Anterior)">Dr. Juan Pérez (Anterior)</option>
                                                <option value="Lic. Laura Martínez">Lic. Laura Martínez</option>
                                                <option value="Mtra. Ana Gómez">Mtra. Ana Gómez</option>
                                            </select>
                                            <button @click="editar = false" type="button" class="bg-green-100 text-green-700 px-3 py-1.5 rounded text-xs font-semibold hover:bg-green-200 transition">
                                                Guardar
                                            </button>
                                            <button @click="editar = false" type="button" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 text-xs underline">
                                                Cancelar
                                            </button>
                                        </div>
                            
                                    </td>
                                </tr>
                            
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end gap-4 mt-6">
                        <button type="button" class="inline-flex items-center px-6 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 shadow-sm">
                            Confirmar y Enviar a Docentes
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

                        <!-- Asignación de Docentes -->
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
                                            <option>Prof. Encargado</option>
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
                                            <option>Prof. Adjunto</option>
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