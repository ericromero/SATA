<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto space-y-6">
            
            <!-- Encabezado -->
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Evaluación de Participantes</h1>
                    <p class="text-sm text-gray-500">Registra la evaluación final para cada alumno inscrito en el evento.</p>
                </div>
                <a href="{{ route('academic-events.grades') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Lista de Eventos
                </a>
            </div>

            <!-- TARJETA RESUMEN DEL EVENTO -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
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

                <button type="button" onclick="openExportModal()"
                        class="inline-flex items-center gap-2 px-4 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 shadow-sm transition">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    Exportar lista
                </button>
            </div>

            <!-- CONTENEDOR DE TABLA DE EVALUACIÓN -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm space-y-6">
                
                <!-- Buscador -->
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

                <!-- Tabla de Calificaciones -->
                <form id="gradesForm">
                    @csrf
                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 text-xs font-bold text-gray-500 uppercase tracking-wider">
                                <tr>
                                    <th class="px-4 py-3 text-center w-12">#</th>
                                    <th class="px-6 py-3 text-left">Nombre del alumno</th>
                                    <th class="px-6 py-3 text-left">Número de cuenta</th>
                                    <th class="px-6 py-3 text-center">
                                        <div>Calificación</div>
                                        <div class="flex justify-center gap-6 mt-1 text-gray-600 font-semibold normal-case">
                                            <span>5</span><span>6</span><span>7</span><span>8</span><span>9</span><span>10</span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                
                                @php
                                    $students = [
                                        ['id' => 1, 'name' => 'Fernando Alejandro Vega Ruiz', 'account' => '423019875'],
                                        ['id' => 2, 'name' => 'Fausto Fernando Salazar Medina', 'account' => '423019876'],
                                        ['id' => 3, 'name' => 'Ricardo Emmanuel Aguilar Pérez', 'account' => '423019877'],
                                        ['id' => 4, 'name' => 'Rosa María Gómez Pérez', 'account' => '423019878'],
                                        ['id' => 5, 'name' => 'Diego Sebastián Porras Romero', 'account' => '423019879'],
                                        ['id' => 6, 'name' => 'Miguel Ángel Vargas Romero', 'account' => '423019880'],
                                    ];
                                @endphp

                                @foreach ($students as $index => $student)
                                    <tr class="student-row hover:bg-gray-50">
                                        <td class="px-4 py-3 text-center text-gray-500 font-medium">{{ $index + 1 }}</td>
                                        <td class="px-6 py-3 font-semibold text-gray-900 student-name">{{ $student['name'] }}</td>
                                        <td class="px-6 py-3 text-gray-600 student-account">{{ $student['account'] }}</td>
                                        <td class="px-6 py-3 text-center">
                                            <div class="flex justify-center gap-6">
                                                @for ($g = 5; $g <= 10; $g++)
                                                    <label class="inline-flex items-center cursor-pointer">
                                                        <input type="radio" name="grade[{{ $student['id'] }}]" value="{{ $g }}" 
                                                               {{ $g == 10 ? 'checked' : '' }}
                                                               class="text-indigo-600 focus:ring-indigo-500 h-4 w-4">
                                                    </label>
                                                @endfor
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex items-center justify-end gap-3 pt-4">
                        <button type="button" onclick="openConfirmModal()"
                                class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                            Enviar calificaciones
                        </button>
                        
                        <button type="button" id="btnModifyGrades" onclick="openConfirmModal()" 
                                class="hidden px-6 py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                            Modificar calificaciones
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- MODAL DE CONFIRMACIÓN DE EVALUACIÓN FINAL -->
    <div id="modal-confirm-grades" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-lg w-full p-6 shadow-xl space-y-4">
            <h3 class="text-xl font-bold text-gray-900">Confirmación de evaluación final</h3>
            
            <p class="text-sm text-gray-600 leading-relaxed">
                Al confirmar, las calificaciones quedarán registradas preliminarmente. Podrás editarlas posteriormente hasta la fecha límite de cierre de actas que son <strong>5 días después de haber asentado las calificaciones</strong>.
            </p>

            <p class="text-sm font-semibold text-gray-900">
                ¿Seguro que deseas continuar?
            </p>

            <div class="flex items-center justify-end gap-3 pt-2">
                <button type="button" onclick="closeConfirmModal()"
                        class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                    Volver
                </button>
                <button type="button" onclick="submitGrades()"
                        class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                    Confirmar y enviar
                </button>
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

        function openConfirmModal() {
            document.getElementById('modal-confirm-grades').classList.remove('hidden');
            document.getElementById('modal-confirm-grades').classList.add('flex');
        }

        function closeConfirmModal() {
            document.getElementById('modal-confirm-grades').classList.add('hidden');
            document.getElementById('modal-confirm-grades').classList.remove('flex');
        }

        function openExportModal() {
            document.getElementById('modal-export-success').classList.remove('hidden');
            document.getElementById('modal-export-success').classList.add('flex');
        }

        function closeExportModal() {
            document.getElementById('modal-export-success').classList.add('hidden');
            document.getElementById('modal-export-success').classList.remove('flex');
        }

        function submitGrades() {
            closeConfirmModal();
            // Mostrar botón secundario de modificación (tal como en el prototipo)
            document.getElementById('btnModifyGrades').classList.remove('hidden');
            alert('Calificaciones registradas preliminarmente.');
        }
    </script>
</x-layouts.app>