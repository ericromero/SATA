<x-layouts.app>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                
                <div class="mb-6 border-b border-gray-200 dark:border-neutral-700 pb-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Revisión de Propuestas</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Bandeja del Coordinador: Aprueba las propuestas o modificaciones de los docentes.</p>
                </div>

                <!-- Tabla de Propuestas Pendientes -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 border border-gray-200 dark:border-neutral-700 rounded-lg">
                        <thead class="bg-gray-50 dark:bg-neutral-900">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Materia y Grupo</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Horario y Aula</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Docentes Asignados</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-neutral-800 divide-y divide-gray-200 dark:divide-neutral-700">
                            
                            <!-- Fila de Ejemplo 1 -->
                            <tr x-data="{ mostrarNotas: false }">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900 dark:text-white">Psicología I</div>
                                    <div class="text-sm text-gray-500">Grupo: 1152</div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 mt-1">
                                        Revisión Coordinador
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white">Lu y Mi (10:00 - 12:00)</div>
                                    <div class="text-sm text-gray-500">Aula A301</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">1. Dr. Armando Adair (4 hrs)</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <button class="bg-green-100 text-green-700 px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-green-200 transition">Aprobar Modificación</button>
                                        <button @click="mostrarNotas = !mostrarNotas" class="bg-red-100 text-red-700 px-3 py-1.5 rounded-md text-sm font-semibold hover:bg-red-200 transition">Rechazar</button>
                                    </div>
                                    
                                    <!-- Caja de observaciones (Oculta por defecto) -->
                                    <div x-show="mostrarNotas" style="display: none;" class="mt-3 p-3 bg-gray-50 dark:bg-neutral-900 rounded-md border border-gray-200 dark:border-neutral-700">
                                        <label class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">Motivo del rechazo:</label>
                                        <textarea class="w-full text-sm rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" rows="2" placeholder="Ej. El horario propuesto ya está ocupado..."></textarea>
                                        <div class="mt-2 flex justify-end">
                                            <button class="bg-indigo-600 text-white text-xs px-3 py-1.5 rounded hover:bg-indigo-700 font-medium">Devolver al Docente</button>
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