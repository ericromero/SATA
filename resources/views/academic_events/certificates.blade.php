<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto space-y-6">
            
            <!-- Encabezado de Navegación -->
            <div class="flex items-center justify-between">
                <div>
                    <div class="flex items-center gap-3">
                        <h1 class="text-2xl font-bold text-gray-900">Descarga de constancias</h1>
                        <!-- Botón de ayuda (?) -->
                        <button type="button" onclick="toggleHelpBanner()" 
                                title="Información sobre constancias"
                                class="w-7 h-7 rounded-full bg-indigo-50 hover:bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm transition">
                            ?
                        </button>
                    </div>
                    <p class="text-sm text-gray-500">Consulta y descarga tus constancias de participación como docente en los eventos realizados</p>
                </div>
                <a href="{{ route('academic-events.index') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Eventos Académicos
                </a>
            </div>

            <!-- BANNER DE AYUDA (Desplegable) -->
            <div id="helpBanner" class="hidden p-5 bg-blue-50 border border-blue-200 rounded-xl text-blue-900 shadow-sm transition">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-blue-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold text-blue-950 text-sm mb-1">¿No puedes descargar tu constancia?</h4>
                        <p class="text-xs leading-relaxed text-blue-800">
                            Las constancias están disponibles una vez que el evento haya finalizado y se hayan generado oficialmente (1 a 3 días hábiles). Si tienes alguna duda, contacta a la coordinación.
                        </p>
                    </div>
                </div>
            </div>

            <!-- BARRA DE CONTROLES: BUSCADOR, FILTRO Y MODO POR LOTE -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-end">
                    
                    <!-- Búsqueda por Nombre -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Buscar evento:</label>
                        <div class="relative">
                            <input type="text" id="searchInput" onkeyup="filterCertificates()" 
                                   placeholder="Buscar por nombre del evento..." 
                                   class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-lg text-sm text-gray-900 focus:ring-2 focus:ring-indigo-500">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Filtro por Semestre -->
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 mb-1">Semestre:</label>
                        <select id="semesterSelect" onchange="filterCertificates()" 
                                class="w-full bg-white border border-gray-300 rounded-lg py-2 px-3 text-sm text-gray-900 focus:ring-2 focus:ring-indigo-500">
                            <option value="">Selecciona una opción</option>
                            <option value="2026-1">2026-1</option>
                            <option value="2026-2">2026-2</option>
                            <option value="2025-1">2025-1</option>
                            <option value="2025-2">2025-2</option>
                        </select>
                    </div>

                    <!-- Toggle para Descarga por Lote -->
                    <div class="flex items-center justify-between md:justify-end gap-3 pb-1">
                        <span class="text-xs font-medium text-gray-600">Desliza para descargar constancias por lote</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="batchToggle" onchange="toggleBatchMode()" class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </label>
                    </div>
                </div>

                <!-- Botón de Descarga ZIP por Lote (Oculto inicialmente) -->
                <div id="batchActionContainer" class="hidden justify-end pt-2 border-t border-gray-100">
                    <button type="button" onclick="openZipModal()" 
                            class="inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Descargar ZIP (Descargar constancias seleccionadas)
                    </button>
                </div>
            </div>

            <!-- LISTADO DE CONSTANCIAS -->
            <div class="space-y-4">
                <h3 class="text-base font-bold text-gray-900">Mis constancias:</h3>

                <div id="certificatesContainer" class="space-y-3">
                    
                    <!-- TARJETA 1 -->
                    <div class="cert-item bg-white border border-gray-200 rounded-xl p-5 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4"
                         data-name="Taller de Estrategias de Aprendizaje" data-semester="2026-1">
                        <div class="flex items-center gap-4">
                            <!-- Checkbox Lote -->
                            <div class="batch-checkbox-wrapper hidden">
                                <input type="checkbox" class="batch-checkbox h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                            </div>
                            <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-gray-900">Taller de Estrategias de Aprendizaje</h4>
                                <div class="flex items-center gap-4 text-xs text-gray-500 mt-1">
                                    <span>08 de mayo de 2026</span>
                                    <span>•</span>
                                    <span>Semestre: <strong>2026-1</strong></span>
                                    <span>•</span>
                                    <span>Docente Ponente</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between md:justify-end gap-6 border-t md:border-0 pt-3 md:pt-0">
                            <div class="text-left md:text-right">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    ✓ Constancia disponible
                                </span>
                                <p class="text-[11px] text-gray-500 mt-1">Generada el 10/05/2026</p>
                                <p class="text-[10px] text-gray-400">FOLIO: 438411</p>
                            </div>
                            <button type="button" onclick="openPdfModal()"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Descargar PDF
                            </button>
                        </div>
                    </div>

                    <!-- TARJETA 2 -->
                    <div class="cert-item bg-white border border-gray-200 rounded-xl p-5 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4"
                         data-name="Seminario de Salud Mental Universitaria" data-semester="2026-1">
                        <div class="flex items-center gap-4">
                            <div class="batch-checkbox-wrapper hidden">
                                <input type="checkbox" class="batch-checkbox h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                            </div>
                            <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-gray-900">Seminario de Salud Mental Universitaria</h4>
                                <div class="flex items-center gap-4 text-xs text-gray-500 mt-1">
                                    <span>15 de abril de 2026</span>
                                    <span>•</span>
                                    <span>Semestre: <strong>2026-1</strong></span>
                                    <span>•</span>
                                    <span>Docente Ponente</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between md:justify-end gap-6 border-t md:border-0 pt-3 md:pt-0">
                            <div class="text-left md:text-right">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    ✓ Constancia disponible
                                </span>
                                <p class="text-[11px] text-gray-500 mt-1">Generada el 18/04/2026</p>
                                <p class="text-[10px] text-gray-400">FOLIO: 792310</p>
                            </div>
                            <button type="button" onclick="openPdfModal()"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Descargar PDF
                            </button>
                        </div>
                    </div>

                    <!-- TARJETA 3: NO DISPONIBLE -->
                    <div class="cert-item bg-white border border-gray-200 rounded-xl p-5 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4 opacity-75"
                         data-name="Congreso de Psicología 2026" data-semester="2026-1">
                        <div class="flex items-center gap-4">
                            <div class="batch-checkbox-wrapper hidden">
                                <input type="checkbox" disabled class="h-5 w-5 text-gray-300 rounded border-gray-200 cursor-not-allowed">
                            </div>
                            <div class="p-3 bg-gray-100 rounded-xl text-gray-400 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-gray-900">Congreso de Psicología 2026</h4>
                                <div class="flex items-center gap-4 text-xs text-gray-500 mt-1">
                                    <span>10 de mayo de 2026</span>
                                    <span>•</span>
                                    <span>Semestre: <strong>2026-1</strong></span>
                                    <span>•</span>
                                    <span>Docente Organizador</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between md:justify-end gap-6 border-t md:border-0 pt-3 md:pt-0">
                            <div class="text-left md:text-right">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 text-xs font-semibold rounded-full bg-rose-50 text-rose-700 border border-rose-200">
                                    Constancia no disponible
                                </span>
                                <p class="text-[11px] text-gray-500 mt-1">Por generar el 12/05/2026</p>
                            </div>
                            <button type="button" disabled
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-400 font-medium text-sm rounded-lg cursor-not-allowed">
                                Constancia no disponible
                            </button>
                        </div>
                    </div>

                    <!-- TARJETA 4: OTRO SEMESTRE -->
                    <div class="cert-item bg-white border border-gray-200 rounded-xl p-5 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4"
                         data-name="Taller de Estrategias de Aprendizaje" data-semester="2025-2">
                        <div class="flex items-center gap-4">
                            <div class="batch-checkbox-wrapper hidden">
                                <input type="checkbox" class="batch-checkbox h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                            </div>
                            <div class="p-3 bg-indigo-50 rounded-xl text-indigo-600 shrink-0">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-gray-900">Taller de Estrategias de Aprendizaje</h4>
                                <div class="flex items-center gap-4 text-xs text-gray-500 mt-1">
                                    <span>20 de noviembre de 2025</span>
                                    <span>•</span>
                                    <span>Semestre: <strong>2025-2</strong></span>
                                    <span>•</span>
                                    <span>Docente Ponente</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between md:justify-end gap-6 border-t md:border-0 pt-3 md:pt-0">
                            <div class="text-left md:text-right">
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    ✓ Constancia disponible
                                </span>
                                <p class="text-[11px] text-gray-500 mt-1">Generada el 22/11/2025</p>
                                <p class="text-[10px] text-gray-400">FOLIO: 397418</p>
                            </div>
                            <button type="button" onclick="openPdfModal()"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Descargar PDF
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 1: DESCARGA INDIVIDUAL DE PDF -->
    <div id="modal-pdf-success" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-md w-full p-6 shadow-xl text-center space-y-4">
            <h3 class="text-xl font-bold text-gray-900">Descarga exitosa</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                La constancia se ha descargado con éxito y la encontrará en la carpeta predeterminada de sus descargas.
            </p>
            <div class="pt-2">
                <button type="button" onclick="closePdfModal()"
                        class="px-8 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                    Ok
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL 2: DESCARGA POR LOTE (ZIP) -->
    <div id="modal-zip-success" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-md w-full p-6 shadow-xl text-center space-y-4">
            <h3 class="text-xl font-bold text-gray-900">Descarga exitosa</h3>
            <p class="text-sm text-gray-600 leading-relaxed">
                El ZIP de las constancias seleccionadas se ha descargado con éxito y lo encontrará en la carpeta predeterminada de sus descargas.
            </p>
            <div class="pt-2">
                <button type="button" onclick="closeZipModal()"
                        class="px-8 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                    Ok
                </button>
            </div>
        </div>
    </div>

    <!-- SCRIPTS INTERACTIVOS -->
    <script>
        function toggleHelpBanner() {
            let banner = document.getElementById('helpBanner');
            banner.classList.toggle('hidden');
        }

        function toggleBatchMode() {
            let isChecked = document.getElementById('batchToggle').checked;
            let wrappers = document.querySelectorAll('.batch-checkbox-wrapper');
            let actionContainer = document.getElementById('batchActionContainer');

            if (isChecked) {
                wrappers.forEach(el => el.classList.remove('hidden'));
                actionContainer.classList.remove('hidden');
                actionContainer.classList.add('flex');
            } else {
                wrappers.forEach(el => el.classList.add('hidden'));
                actionContainer.classList.add('hidden');
                actionContainer.classList.remove('flex');
            }
        }

        function filterCertificates() {
            let searchText = document.getElementById('searchInput').value.toLowerCase();
            let selectedSemester = document.getElementById('semesterSelect').value;
            let items = document.querySelectorAll('.cert-item');

            items.forEach(item => {
                let name = item.getAttribute('data-name').toLowerCase();
                let semester = item.getAttribute('data-semester');

                let matchesSearch = name.includes(searchText);
                let matchesSemester = selectedSemester === '' || semester === selectedSemester;

                if (matchesSearch && matchesSemester) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        }

        function openPdfModal() {
            document.getElementById('modal-pdf-success').classList.remove('hidden');
            document.getElementById('modal-pdf-success').classList.add('flex');
        }

        function closePdfModal() {
            document.getElementById('modal-pdf-success').classList.add('hidden');
            document.getElementById('modal-pdf-success').classList.remove('flex');
        }

        function openZipModal() {
            document.getElementById('modal-zip-success').classList.remove('hidden');
            document.getElementById('modal-zip-success').classList.add('flex');
        }

        function closeZipModal() {
            document.getElementById('modal-zip-success').classList.add('hidden');
            document.getElementById('modal-zip-success').classList.remove('flex');
        }
    </script>
</x-layouts.app>