<x-layouts.app title="Historial de eventos — Eventos Académicos">
    <div class="min-h-screen bg-white text-gray-900">
        <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8 space-y-5">

            {{-- Encabezado --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">
                        ¡Hola, {{ Auth::user()->name ?? 'Alumno' }}!
                    </h1>
                    <p class="text-sm text-gray-500 mt-0.5">
                        Aquí puedes gestionar tus eventos académicos.
                    </p>
                </div>
                <a href="{{ url('/eventos-academicos/alumnos/inicio') }}" class="text-xs font-medium text-indigo-600 hover:text-indigo-700 self-start sm:self-auto">
                    ← Volver a Inicio
                </a>
            </div>

            {{-- Contenedor principal de Historial de eventos --}}
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-xs space-y-4">
                {{-- Título de sección --}}
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-bold text-gray-900">Historial de eventos</h2>
                </div>

                {{-- Pestañas de estatus --}}
                <div class="flex flex-wrap gap-6 border-b border-gray-200 text-xs font-medium">
                    <button type="button" onclick="filtrarEstatus('todos', this)" class="tab-estatus pb-2.5 border-b-2 border-indigo-600 text-indigo-600 font-semibold cursor-pointer">
                        Todos
                    </button>
                    <button type="button" onclick="filtrarEstatus('asistio', this)" class="tab-estatus pb-2.5 border-b-2 border-transparent text-gray-500 hover:text-gray-800 cursor-pointer">
                        Asistidos
                    </button>
                    <button type="button" onclick="filtrarEstatus('no_asistio', this)" class="tab-estatus pb-2.5 border-b-2 border-transparent text-gray-500 hover:text-gray-800 cursor-pointer">
                        No asistidos
                    </button>
                    <button type="button" onclick="filtrarEstatus('cancelado', this)" class="tab-estatus pb-2.5 border-b-2 border-transparent text-gray-500 hover:text-gray-800 cursor-pointer">
                        Cancelados
                    </button>
                </div>

                {{-- Barra de búsqueda y filtros --}}
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3 pt-1">
                    <div class="relative flex-1 max-w-xl">
                        <input
                            id="buscador-historial"
                            type="text"
                            oninput="filtrarHistorial()"
                            placeholder="Buscar por título o ponente..."
                            class="w-full pl-9 pr-4 py-2 text-xs bg-white border border-gray-200 rounded-full text-gray-900 placeholder-gray-400 focus:outline-none focus:border-indigo-500"
                        >
                        <svg class="w-4 h-4 text-indigo-600 absolute left-3 top-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>

                    <div class="flex flex-wrap items-center gap-2 text-xs">
                        <select
                            id="filtro-rango"
                            onchange="filtrarHistorial()"
                            class="px-3.5 py-2 bg-white border border-gray-200 hover:border-indigo-300 text-gray-700 font-medium rounded-full focus:outline-none cursor-pointer"
                        >
                            <option value="todos">Rango de fechas</option>
                            <option value="mayo-2026">Mayo 2026</option>
                            <option value="junio-2026">Junio 2026</option>
                        </select>

                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden ml-1">
                            <button type="button" id="btn-vista-lista" onclick="cambiarVista('lista')" class="p-2 bg-indigo-600 text-white cursor-pointer" title="Vista lista">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </button>
                            <button type="button" id="btn-vista-cuadricula" onclick="cambiarVista('cuadricula')" class="p-2 bg-white text-gray-600 hover:bg-gray-50 cursor-pointer" title="Vista cuadrícula">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Lista de eventos del historial --}}
                <div id="contenedor-historial" class="grid grid-cols-1 gap-4 pt-2">

                    {{-- Item 1: Taller - Asistió --}}
                    <div class="item-historial border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white hover:border-indigo-300 transition"
                         data-titulo="taller de estrategias de aprendizaje"
                         data-ponente="dra. laura martínez"
                         data-estatus="asistio"
                         data-rango="mayo-2026">
                        <div class="flex items-start sm:items-center gap-4">
                            <div class="w-16 h-16 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 shrink-0">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z" />
                                </svg>
                            </div>
                            <div class="space-y-1.5">
                                <span class="inline-block px-2.5 py-0.5 text-[11px] font-medium rounded-full bg-indigo-50 text-indigo-700">
                                    Taller
                                </span>
                                <h3 class="text-base font-bold text-gray-900">
                                    Taller de Estrategias de Aprendizaje
                                </h3>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-600">
                                    <span><strong class="font-medium text-gray-800">Fecha:</strong> 15 may. 2026</span>
                                    <span><strong class="font-medium text-gray-800">Horario:</strong> 10:00 - 14:00</span>
                                    <span><strong class="font-medium text-gray-800">Sede:</strong> Aula 204, Edificio A</span>
                                    <span><strong class="font-medium text-gray-800">Ponente:</strong> Dra. Laura Martínez</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex sm:flex-col items-end justify-between shrink-0">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                ✓ Asistió
                            </span>
                        </div>
                    </div>

                    {{-- Item 2: Seminario - Asistió --}}
                    <div class="item-historial border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white hover:border-indigo-300 transition"
                         data-titulo="neurociencia y comportamiento"
                         data-ponente="dra. alejandra torres"
                         data-estatus="asistio"
                         data-rango="mayo-2026">
                        <div class="flex items-start sm:items-center gap-4">
                            <div class="w-16 h-16 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 shrink-0">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                            <div class="space-y-1.5">
                                <span class="inline-block px-2.5 py-0.5 text-[11px] font-medium rounded-full bg-emerald-50 text-emerald-700">
                                    Seminario
                                </span>
                                <h3 class="text-base font-bold text-gray-900">
                                    Neurociencia y comportamiento
                                </h3>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-600">
                                    <span><strong class="font-medium text-gray-800">Fecha:</strong> 28 may. 2026</span>
                                    <span><strong class="font-medium text-gray-800">Horario:</strong> 11:00 - 13:00</span>
                                    <span><strong class="font-medium text-gray-800">Sede:</strong> Aula 105, Edificio B</span>
                                    <span><strong class="font-medium text-gray-800">Ponente:</strong> Dra. Alejandra Torres</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex sm:flex-col items-end justify-between shrink-0">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                ✓ Asistió
                            </span>
                        </div>
                    </div>

                    {{-- Item 3: Conferencia - No asistió --}}
                    <div class="item-historial border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white hover:border-indigo-300 transition"
                         data-titulo="salud mental universitaria: retos y perspectivas"
                         data-ponente="dr. carlos ramírez"
                         data-estatus="no_asistio"
                         data-rango="mayo-2026">
                        <div class="flex items-start sm:items-center gap-4">
                            <div class="w-16 h-16 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 shrink-0">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                                </svg>
                            </div>
                            <div class="space-y-1.5">
                                <span class="inline-block px-2.5 py-0.5 text-[11px] font-medium rounded-full bg-indigo-50 text-indigo-700">
                                    Conferencia
                                </span>
                                <h3 class="text-base font-bold text-gray-900">
                                    Salud Mental Universitaria: retos y perspectivas
                                </h3>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-600">
                                    <span><strong class="font-medium text-gray-800">Fecha:</strong> 20 may. 2026</span>
                                    <span><strong class="font-medium text-gray-800">Horario:</strong> 16:00 - 18:00</span>
                                    <span><strong class="font-medium text-gray-800">Sede:</strong> Auditorio Dr. Luis Lara Tapia</span>
                                    <span><strong class="font-medium text-gray-800">Ponente:</strong> Dr. Carlos Ramírez</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row sm:flex-col items-center sm:items-end justify-between gap-2 shrink-0">
                            <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-medium rounded-full bg-red-50 text-red-700 border border-red-200">
                                ▲ No asistió
                            </span>
                            <button type="button" onclick="abrirModalJustificar('Salud Mental Universitaria: retos y perspectivas', 3)" class="px-3.5 py-1.5 bg-white hover:bg-indigo-50 text-indigo-700 text-xs font-medium rounded-lg border border-indigo-200 transition cursor-pointer">
                                Justificar inasistencia
                            </button>
                        </div>
                    </div>

                    {{-- Item 4: Curso - Cancelado --}}
                    <div class="item-historial border border-gray-200 rounded-xl p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white hover:border-indigo-300 transition"
                         data-titulo="intervención en crisis psicológica"
                         data-ponente="mtro. diego vargas"
                         data-estatus="cancelado"
                         data-rango="junio-2026">
                        <div class="flex items-start sm:items-center gap-4">
                            <div class="w-16 h-16 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-700 font-serif font-bold text-2xl shrink-0">
                                Ψ
                            </div>
                            <div class="space-y-1.5">
                                <span class="inline-block px-2.5 py-0.5 text-[11px] font-medium rounded-full bg-indigo-50 text-indigo-700">
                                    Curso
                                </span>
                                <h3 class="text-base font-bold text-gray-900">
                                    Intervención en crisis psicológica
                                </h3>
                                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-xs text-gray-600">
                                    <span><strong class="font-medium text-gray-800">Fecha:</strong> 02 jun. 2026</span>
                                    <span><strong class="font-medium text-gray-800">Horario:</strong> 09:00 - 13:00</span>
                                    <span><strong class="font-medium text-gray-800">Sede:</strong> Aula 302, Edificio A</span>
                                    <span><strong class="font-medium text-gray-800">Ponente:</strong> Mtro. Diego Vargas</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex sm:flex-col items-end justify-between shrink-0">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-600 border border-gray-200">
                                ⊘ Cancelado
                            </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Modal para Justificar Inasistencia --}}
    <div id="modal-justificar" class="hidden fixed inset-0 z-50 bg-black/40 flex items-center justify-center p-4">
        <div class="bg-white border border-gray-200 rounded-xl max-w-md w-full p-6 shadow-lg space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-bold text-gray-900">Justificar inasistencia</h3>
                <button type="button" onclick="cerrarModalJustificar()" class="text-gray-400 hover:text-gray-600 text-lg cursor-pointer">×</button>
            </div>
            <p class="text-xs text-gray-500">
                Evento: <strong id="modal-evento-titulo" class="text-gray-800"></strong>
            </p>
            <form id="form-justificar" action="{{ url('/eventos-academicos/alumnos/eventos/3/justificar') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Motivo de la inasistencia</label>
                    <textarea name="motivo" rows="3" required placeholder="Describe brevemente el motivo..." class="w-full text-xs border border-gray-200 rounded-lg p-2.5 text-gray-900 focus:outline-none focus:border-indigo-500"></textarea>
                </div>
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Comprobante (PDF o imagen, opcional)</label>
                    <input type="file" name="comprobante" accept=".pdf,.jpg,.jpeg,.png" class="w-full text-xs text-gray-600 border border-gray-200 rounded-lg p-2">
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="cerrarModalJustificar()" class="px-4 py-2 text-xs font-medium text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2 text-xs font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg cursor-pointer">
                        Enviar justificación
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let estatusActivo = 'todos';

        function filtrarEstatus(estatus, btnElement) {
            estatusActivo = estatus;
            document.querySelectorAll('.tab-estatus').forEach(tab => {
                tab.classList.remove('border-indigo-600', 'text-indigo-600', 'font-semibold');
                tab.classList.add('border-transparent', 'text-gray-500');
            });
            btnElement.classList.remove('border-transparent', 'text-gray-500');
            btnElement.classList.add('border-indigo-600', 'text-indigo-600', 'font-semibold');
            filtrarHistorial();
        }

        function filtrarHistorial() {
            const texto = document.getElementById('buscador-historial').value.toLowerCase().trim();
            const rango = document.getElementById('filtro-rango').value;
            const items = document.querySelectorAll('.item-historial');

            items.forEach(item => {
                const titulo = item.dataset.titulo || '';
                const ponente = item.dataset.ponente || '';
                const estatus = item.dataset.estatus || '';
                const rangoItem = item.dataset.rango || '';

                const coincideTexto = !texto || titulo.includes(texto) || ponente.includes(texto);
                const coincideEstatus = estatusActivo === 'todos' || estatus === estatusActivo;
                const coincideRango = rango === 'todos' || rangoItem === rango;

                item.style.display = (coincideTexto && coincideEstatus && coincideRango) ? 'flex' : 'none';
            });
        }

        function cambiarVista(modo) {
            const contenedor = document.getElementById('contenedor-historial');
            const btnLista = document.getElementById('btn-vista-lista');
            const btnCuadricula = document.getElementById('btn-vista-cuadricula');

            if (modo === 'cuadricula') {
                contenedor.classList.remove('grid-cols-1');
                contenedor.classList.add('grid-cols-1', 'md:grid-cols-2');
                btnCuadricula.classList.remove('bg-white', 'text-gray-600');
                btnCuadricula.classList.add('bg-indigo-600', 'text-white');
                btnLista.classList.remove('bg-indigo-600', 'text-white');
                btnLista.classList.add('bg-white', 'text-gray-600');
            } else {
                contenedor.classList.remove('md:grid-cols-2');
                contenedor.classList.add('grid-cols-1');
                btnLista.classList.remove('bg-white', 'text-gray-600');
                btnLista.classList.add('bg-indigo-600', 'text-white');
                btnCuadricula.classList.remove('bg-indigo-600', 'text-white');
                btnCuadricula.classList.add('bg-white', 'text-gray-600');
            }
        }

        function abrirModalJustificar(titulo, id) {
            document.getElementById('modal-evento-titulo').textContent = titulo;
            document.getElementById('form-justificar').action = `/eventos-academicos/alumnos/eventos/${id}/justificar`;
            document.getElementById('modal-justificar').classList.remove('hidden');
        }

        function cerrarModalJustificar() {
            document.getElementById('modal-justificar').classList.add('hidden');
        }
    </script>
</x-layouts.app>