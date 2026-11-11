<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto space-y-6">
            
            <!-- Encabezado de Navegación -->
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Lista de inscritos</h1>
                    <p class="text-sm text-gray-500">Consulta los participantes inscritos en este evento</p>
                </div>
                <a href="{{ route('academic-events.enrolled') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Lista de Eventos
                </a>
            </div>

            <!-- TARJETA RESUMEN DEL EVENTO -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-3">
                            <h2 class="text-xl font-bold text-gray-900">Taller de Estrategias de Aprendizaje</h2>
                            <span class="px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Evento publicado
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">25 alumnos inscritos</p>
                    </div>
                </div>

                <!-- Botón Exportar Lista -->
                <button type="button" onclick="openExportModal()"
                        class="inline-flex items-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Exportar lista
                </button>
            </div>

            <!-- CONTENEDOR PRINCIPAL: BUSCADOR + TABLA DE ASISTENCIA -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm space-y-6">
                
                <!-- Buscador de alumnos -->
                <div class="max-w-md">
                    <div class="relative">
                        <input type="text" id="searchInput" onkeyup="filterStudents()" 
                               placeholder="Buscar por nombre o número de cuenta..." 
                               class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-900 focus:ring-2 focus:ring-indigo-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Formulario de Guardado de Asistencia -->
                <form action="#" method="POST" id="attendanceForm">
                    @csrf
                    
                    <!-- Tabla de Participantes -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200" id="studentsTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-12 text-center">
                                        Asistencia
                                    </th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-12">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Nombre del alumno
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Número de cuenta
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Fecha de inscripción
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase tracking-wider">
                                        Contacto
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                
                                <tr class="student-row hover:bg-gray-50">
                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox" name="attendance[]" value="320159201" class="rounded text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 font-medium">1</td>
                                    <td class="px-6 py-3 font-semibold text-gray-900 student-name">Fausto Fernando Salazar Medina</td>
                                    <td class="px-6 py-3 text-gray-600 student-account">423019878</td>
                                    <td class="px-6 py-3 text-gray-500">05/06/2026</td>
                                    <td class="px-6 py-3 text-right">
                                        <button type="button" onclick="sendMessage('Fausto Fernando Salazar Medina')" 
                                                class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-md transition shadow-sm">
                                            Enviar mensaje
                                        </button>
                                    </td>
                                </tr>

                                <tr class="student-row hover:bg-gray-50">
                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox" name="attendance[]" value="320159202" class="rounded text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 font-medium">2</td>
                                    <td class="px-6 py-3 font-semibold text-gray-900 student-name">Rosa María Gómez Pérez</td>
                                    <td class="px-6 py-3 text-gray-600 student-account">423019879</td>
                                    <td class="px-6 py-3 text-gray-500">05/06/2026</td>
                                    <td class="px-6 py-3 text-right">
                                        <button type="button" onclick="sendMessage('Rosa María Gómez Pérez')" 
                                                class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-md transition shadow-sm">
                                            Enviar mensaje
                                        </button>
                                    </td>
                                </tr>

                                <tr class="student-row hover:bg-gray-50">
                                    <td class="px-4 py-3 text-center">
                                        <input type="checkbox" name="attendance[]" value="320159203" class="rounded text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 font-medium">3</td>
                                    <td class="px-6 py-3 font-semibold text-gray-900 student-name">Ricardo Emmanuel Aguilar</td>
                                    <td class="px-6 py-3 text-gray-600 student-account">423019880</td>
                                    <td class="px-6 py-3 text-gray-500">05/06/2026</td>
                                    <td class="px-6 py-3 text-right">
                                        <button type="button" onclick="sendMessage('Ricardo Emmanuel Aguilar')" 
                                                class="px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-md transition shadow-sm">
                                            Enviar mensaje
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- Botón Guardar Asistencia -->
                    <div class="pt-4">
                        <button type="button" onclick="saveAttendance()" 
                                class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                            Guardar asistencia
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- MODAL DE EXPORTACIÓN EXITOSA -->
    <div id="modal-export-success" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-md w-full p-6 shadow-xl text-center space-y-4">
            <h3 class="text-xl font-bold text-gray-900">Descarga exitosa</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                Se ha iniciado la descarga con éxito y lo más reciente estará guardado dentro de sus descargas.
            </p>
            <div class="pt-2">
                <button type="button" onclick="closeExportModal()"
                        class="px-8 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                    Ok
                </button>
            </div>
        </div>
    </div>

    <!-- JS Filtro, Notificaciones y Modales -->
    <script>
        function filterStudents() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let rows = document.querySelectorAll('.student-row');

            rows.forEach(row => {
                let name = row.querySelector('.student-name').textContent.toLowerCase();
                let account = row.querySelector('.student-account').textContent.toLowerCase();
                if (name.includes(input) || account.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function openExportModal() {
            document.getElementById('modal-export-success').classList.remove('hidden');
            document.getElementById('modal-export-success').classList.add('flex');
        }

        function closeExportModal() {
            document.getElementById('modal-export-success').classList.add('hidden');
            document.getElementById('modal-export-success').classList.remove('flex');
        }

        function saveAttendance() {
            alert('Asistencia registrada correctamente en el sistema.');
        }

        function sendMessage(studentName) {
            alert('Redirigiendo al buzón para enviar un mensaje a: ' + studentName);
        }
    </script>
</x-layouts.app>