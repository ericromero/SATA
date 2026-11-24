<x-layouts.app title="Mis eventos próximos — Eventos Académicos">
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

            {{-- Título de sección --}}
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-xs space-y-4">
                <div class="flex items-start gap-3">
                    <div class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Mis eventos próximos</h2>
                        <p class="text-xs text-gray-500 mt-0.5">
                            Aquí puedes ver los eventos en los que estás inscrito y gestionar tu asistencia.
                        </p>
                    </div>
                </div>

                {{-- Barra de búsqueda y filtros --}}
                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-3 pt-1">
                    <div class="relative flex-1 max-w-md">
                        <input
                            id="buscador-mis-eventos"
                            type="text"
                            oninput="filtrarEventos()"
                            placeholder="Buscar por título o ponente..."
                            class="w-full pl-9 pr-4 py-2 text-xs bg-white border border-indigo-200 rounded-full text-gray-900 placeholder-gray-400 focus:outline-none focus:border-indigo-500"
                        >
                        <svg class="w-4 h-4 text-indigo-600 absolute left-3 top-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </div>

                    <div class="flex flex-wrap items-center gap-2 text-xs">
                        <select
                            id="filtro-categoria"
                            onchange="filtrarEventos()"
                            class="px-3.5 py-2 bg-indigo-600 text-white font-medium rounded-full border border-indigo-600 focus:outline-none cursor-pointer"
                        >
                            <option value="todas">Todas las categorías</option>
                            <option value="taller">Taller</option>
                            <option value="conferencia">Conferencia</option>
                            <option value="seminario">Seminario</option>
                        </select>

                        <button type="button" onclick="filtrarPeriodo('semana', this)" class="filtro-periodo px-3.5 py-2 bg-white border border-gray-200 hover:border-indigo-300 text-gray-700 font-medium rounded-full transition cursor-pointer">
                            Esta semana
                        </button>

                        <button type="button" onclick="filtrarPeriodo('mes', this)" class="filtro-periodo px-3.5 py-2 bg-white border border-gray-200 hover:border-indigo-300 text-gray-700 font-medium rounded-full transition cursor-pointer">
                            Este mes
                        </button>

                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden ml-1">
                            <button type="button" id="btn-vista-lista" onclick="cambiarVista('lista')" class="p-2 bg-white text-gray-600 hover:bg-gray-50 cursor-pointer" title="Vista lista">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>
                            </button>
                            <button type="button" id="btn-vista-cuadricula" onclick="cambiarVista('cuadricula')" class="p-2 bg-indigo-600 text-white cursor-pointer" title="Vista cuadrícula">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Contenedor de tarjetas de eventos inscritos --}}
                <div id="contenedor-proximos-eventos" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 pt-2">

                    {{-- Tarjeta 1: Taller (Reprogramado) --}}
                    <div class="tarjeta-evento border border-gray-200 rounded-xl p-5 flex flex-col justify-between bg-white hover:border-indigo-300 transition"
                         data-titulo="taller de estrategias de aprendizaje"
                         data-ponente="dra. laura martínez"
                         data-categoria="taller"
                         data-periodo="semana mes">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full bg-indigo-50 text-indigo-700">
                                    Taller
                                </span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    ✓ Inscrito
                                </span>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-16 h-16 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 shrink-0">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z" />
                                    </svg>
                                </div>
                                <div class="space-y-1.5">
                                    <h3 class="text-base font-bold text-gray-900 leading-snug">
                                        Taller de Estrategias de Aprendizaje
                                    </h3>
                                    <div class="space-y-1 text-xs text-gray-600">
                                        <p><span class="font-medium text-gray-800">Fecha:</span> 15 may. 2026</p>
                                        <p><span class="font-medium text-gray-800">Horario:</span> 10:00 - 14:00</p>
                                        <p><span class="font-medium text-gray-800">Sede:</span> Aula 204, Edificio A</p>
                                        <p><span class="font-medium text-gray-800">Ponente:</span> Dra. Laura Martínez</p>
                                    </div>
                                    <div class="pt-1">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 text-[11px] font-medium rounded-full bg-amber-50 text-amber-800 border border-amber-200" title="Fecha, horario o sede actualizados">
                                            ⚠ Reprogramado ⓘ
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 mt-5 border-t border-gray-100 flex justify-end">
                            <form action="{{ url('/eventos-academicos/alumnos/eventos/1/cancelar-asistencia') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 bg-white hover:bg-red-50 text-indigo-700 hover:text-red-700 text-xs font-semibold rounded-full border border-indigo-200 hover:border-red-300 transition cursor-pointer">
                                    ⊗ Cancelar asistencia
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Tarjeta 2: Conferencia --}}
                    <div class="tarjeta-evento border border-gray-200 rounded-xl p-5 flex flex-col justify-between bg-white hover:border-indigo-300 transition"
                         data-titulo="salud mental universitaria: retos y perspectivas"
                         data-ponente="dr. carlos ramírez"
                         data-categoria="conferencia"
                         data-periodo="mes">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full bg-indigo-50 text-indigo-700">
                                    Conferencia
                                </span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    ✓ Inscrito
                                </span>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-16 h-16 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 shrink-0">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                                    </svg>
                                </div>
                                <div class="space-y-1.5">
                                    <h3 class="text-base font-bold text-gray-900 leading-snug">
                                        Salud Mental Universitaria: retos y perspectivas
                                    </h3>
                                    <div class="space-y-1 text-xs text-gray-600">
                                        <p><span class="font-medium text-gray-800">Fecha:</span> 20 may. 2026</p>
                                        <p><span class="font-medium text-gray-800">Horario:</span> 16:00 - 18:00</p>
                                        <p><span class="font-medium text-gray-800">Sede:</span> Auditorio Dr. Luis Lara Tapia</p>
                                        <p><span class="font-medium text-gray-800">Ponente:</span> Dr. Carlos Ramírez</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 mt-5 border-t border-gray-100 flex justify-end">
                            <form action="{{ url('/eventos-academicos/alumnos/eventos/2/cancelar-asistencia') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 bg-white hover:bg-red-50 text-indigo-700 hover:text-red-700 text-xs font-semibold rounded-full border border-indigo-200 hover:border-red-300 transition cursor-pointer">
                                    ⊗ Cancelar asistencia
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Tarjeta 3: Seminario --}}
                    <div class="tarjeta-evento border border-gray-200 rounded-xl p-5 flex flex-col justify-between bg-white hover:border-indigo-300 transition"
                         data-titulo="neurociencia y comportamiento"
                         data-ponente="dra. alejandra torres"
                         data-categoria="seminario"
                         data-periodo="mes">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between gap-2">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 text-xs font-medium rounded-full bg-indigo-50 text-indigo-700">
                                    Seminario
                                </span>
                                <span class="inline-flex items-center gap-1 px-2.5 py-1 text-xs font-medium rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    ✓ Inscrito
                                </span>
                            </div>

                            <div class="flex items-start gap-3.5">
                                <div class="w-16 h-16 rounded-xl bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-600 shrink-0">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                    </svg>
                                </div>
                                <div class="space-y-1.5">
                                    <h3 class="text-base font-bold text-gray-900 leading-snug">
                                        Neurociencia y comportamiento
                                    </h3>
                                    <div class="space-y-1 text-xs text-gray-600">
                                        <p><span class="font-medium text-gray-800">Fecha:</span> 28 may. 2026</p>
                                        <p><span class="font-medium text-gray-800">Horario:</span> 11:00 - 13:00</p>
                                        <p><span class="font-medium text-gray-800">Sede:</span> Aula 105, Edificio B</p>
                                        <p><span class="font-medium text-gray-800">Ponente:</span> Dra. Alejandra Torres</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 mt-5 border-t border-gray-100 flex justify-end">
                            <form action="{{ url('/eventos-academicos/alumnos/eventos/3/cancelar-asistencia') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center gap-1.5 px-4 py-2 bg-white hover:bg-red-50 text-indigo-700 hover:text-red-700 text-xs font-semibold rounded-full border border-indigo-200 hover:border-red-300 transition cursor-pointer">
                                    ⊗ Cancelar asistencia
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        let periodoActivo = null;

        function filtrarPeriodo(periodo, btnElement) {
            const botones = document.querySelectorAll('.filtro-periodo');
            if (periodoActivo === periodo) {
                periodoActivo = null;
                botones.forEach(b => {
                    b.classList.remove('bg-indigo-50', 'text-indigo-700', 'border-indigo-300');
                    b.classList.add('bg-white', 'text-gray-700', 'border-gray-200');
                });
            } else {
                periodoActivo = periodo;
                botones.forEach(b => {
                    b.classList.remove('bg-indigo-50', 'text-indigo-700', 'border-indigo-300');
                    b.classList.add('bg-white', 'text-gray-700', 'border-gray-200');
                });
                btnElement.classList.remove('bg-white', 'text-gray-700', 'border-gray-200');
                btnElement.classList.add('bg-indigo-50', 'text-indigo-700', 'border-indigo-300');
            }
            filtrarEventos();
        }

        function filtrarEventos() {
            const texto = document.getElementById('buscador-mis-eventos').value.toLowerCase().trim();
            const categoria = document.getElementById('filtro-categoria').value;
            const tarjetas = document.querySelectorAll('.tarjeta-evento');

            tarjetas.forEach(tarjeta => {
                const titulo = tarjeta.dataset.titulo || '';
                const ponente = tarjeta.dataset.ponente || '';
                const catTarjeta = tarjeta.dataset.categoria || '';
                const periodos = (tarjeta.dataset.periodo || '').split(' ');

                const coincideTexto = !texto || titulo.includes(texto) || ponente.includes(texto);
                const coincideCategoria = categoria === 'todas' || catTarjeta === categoria;
                const coincidePeriodo = !periodoActivo || periodos.includes(periodoActivo);

                tarjeta.style.display = (coincideTexto && coincideCategoria && coincidePeriodo) ? 'flex' : 'none';
            });
        }

        function cambiarVista(modo) {
            const contenedor = document.getElementById('contenedor-proximos-eventos');
            const btnLista = document.getElementById('btn-vista-lista');
            const btnCuadricula = document.getElementById('btn-vista-cuadricula');

            if (modo === 'lista') {
                contenedor.classList.remove('md:grid-cols-2', 'lg:grid-cols-3');
                contenedor.classList.add('grid-cols-1');
                btnLista.classList.remove('bg-white', 'text-gray-600');
                btnLista.classList.add('bg-indigo-600', 'text-white');
                btnCuadricula.classList.remove('bg-indigo-600', 'text-white');
                btnCuadricula.classList.add('bg-white', 'text-gray-600');
            } else {
                contenedor.classList.remove('grid-cols-1');
                contenedor.classList.add('md:grid-cols-2', 'lg:grid-cols-3');
                btnCuadricula.classList.remove('bg-white', 'text-gray-600');
                btnCuadricula.classList.add('bg-indigo-600', 'text-white');
                btnLista.classList.remove('bg-indigo-600', 'text-white');
                btnLista.classList.add('bg-white', 'text-gray-600');
            }
        }
    </script>
</x-layouts.app>