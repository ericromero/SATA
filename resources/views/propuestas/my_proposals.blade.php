<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Encabezado y Acción: Agregar Asignatura -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Mis Propuestas Asignadas</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Revisa tu carga horaria y toma una decisión sobre cada materia.</p>
                </div>
                <button class="mt-4 sm:mt-0 bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold text-sm hover:bg-indigo-700 transition shadow-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Agregar Asignatura
                </button>
            </div>

            <!-- Tabla de Propuestas -->
            <div class="bg-white dark:bg-neutral-800 shadow-sm sm:rounded-xl border border-gray-200 dark:border-neutral-700 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-900">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Materia y Grupo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Horario y Aula</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Horas Asignadas</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            
                            <!-- Fila Interactiva -->
                            <tr x-data="{ mostrarCancelacion: false }">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900 dark:text-white">Psicología I</div>
                                    <div class="text-sm text-gray-500">Grupo: 1152</div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mt-1">Pendiente Docente</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">Lu y Mi (10:00 - 12:00)</div>
                                    <div class="text-sm text-gray-500">Aula A301</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">4 horas</div>
                                    <div class="text-xs text-gray-500">Contrato: 40 hrs base</div>
                                </td>
                                <td class="px-6 py-4">
                                    
                                    <!-- Botones Principales -->
                                    <div class="flex space-x-2" x-show="!mostrarCancelacion">
                                        <button class="bg-green-100 text-green-700 px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-green-200 transition">Aceptar</button>
                                        <button class="bg-blue-100 text-blue-700 px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-blue-200 transition">Modificar</button>
                                        <button @click="mostrarCancelacion = true" class="bg-red-100 text-red-700 px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-200 transition">Cancelar</button>
                                    </div>
                                    
                                    <!-- Caja de Solicitud de Cancelación (Oculta por defecto) -->
                                    <div x-show="mostrarCancelacion" style="display: none;" class="mt-2 p-3 bg-gray-50 dark:bg-neutral-900 rounded-md border border-gray-200 dark:border-neutral-700">
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Motivo de cancelación:</label>
                                        <textarea class="w-full text-sm rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="2" placeholder="Ej. Empalme con actividades de investigación..."></textarea>
                                        <div class="mt-2 flex justify-end space-x-2">
                                            <button @click="mostrarCancelacion = false" class="text-xs px-3 py-1.5 text-gray-600 hover:text-gray-900 font-medium">Volver</button>
                                            <button class="bg-red-600 text-white text-xs px-3 py-1.5 rounded hover:bg-red-700 font-medium shadow-sm">Enviar Solicitud</button>
                                        </div>
                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>