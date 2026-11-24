<x-layouts.app title="Explorar eventos — Eventos Académicos">
    <div class="min-h-screen bg-white text-gray-900 p-6 md:p-10">
        <div class="max-w-7xl mx-auto space-y-6">

            {{-- Encabezado --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Explorar eventos</h1>
                    <p class="text-sm text-gray-500 mt-0.5">
                        Descubre conferencias, talleres, seminarios y cursos disponibles y regístrate con un clic.
                    </p>
                </div>
                <a href="{{ route('eventos-academicos.alumnos.inicio') }}"
                   class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition self-start sm:self-auto">
                    ← Volver a Inicio
                </a>
            </div>

            @if (session('status'))
                <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-medium">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Filtros de búsqueda y categoría --}}
            <div class="bg-white border border-gray-200 rounded-xl p-5 shadow-xs flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div class="relative flex-1 max-w-lg">
                    <input
                        id="buscador-explorar"
                        type="text"
                        oninput="filtrarExplorar()"
                        placeholder="Buscar por título, ponente o sede..."
                        class="w-full pl-9 pr-4 py-2 text-xs bg-white border border-gray-300 rounded-full text-gray-900 placeholder-gray-400 focus:outline-none focus:border-indigo-500"
                    >
                    <svg class="w-4 h-4 text-indigo-600 absolute left-3 top-2.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </div>

                <div class="flex flex-wrap items-center gap-2 text-xs">
                    <button type="button" onclick="filtrarCategoriaExplorar('todos', this)" class="filtro-cat px-3.5 py-2 rounded-full font-medium bg-indigo-600 text-white cursor-pointer">
                        Todos
                    </button>
                    <button type="button" onclick="filtrarCategoriaExplorar('conferencia', this)" class="filtro-cat px-3.5 py-2 rounded-full font-medium bg-white border border-gray-200 text-gray-700 hover:border-indigo-300 cursor-pointer">
                        Conferencia
                    </button>
                    <button type="button" onclick="filtrarCategoriaExplorar('taller', this)" class="filtro-cat px-3.5 py-2 rounded-full font-medium bg-white border border-gray-200 text-gray-700 hover:border-indigo-300 cursor-pointer">
                        Taller
                    </button>
                    <button type="button" onclick="filtrarCategoriaExplorar('seminario', this)" class="filtro-cat px-3.5 py-2 rounded-full font-medium bg-white border border-gray-200 text-gray-700 hover:border-indigo-300 cursor-pointer">
                        Seminario
                    </button>
                    <button type="button" onclick="filtrarCategoriaExplorar('curso', this)" class="filtro-cat px-3.5 py-2 rounded-full font-medium bg-white border border-gray-200 text-gray-700 hover:border-indigo-300 cursor-pointer">
                        Curso
                    </button>
                </div>
            </div>

            {{-- Catálogo de eventos --}}
            <div id="grid-explorar" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                {{-- Evento 1 --}}
                <div class="evento-explorar bg-white border border-gray-200 rounded-xl p-5 flex flex-col justify-between shadow-xs hover:border-indigo-300 transition"
                     data-categoria="conferencia"
                     data-buscar="psicología social desde ultratumba creencias de la vida después de la muerte dr. cristian ivan bonilla toeyotl auditorio torner silvia macotela">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-indigo-50 text-indigo-700">
                            Conferencia
                        </span>
                        <h2 class="text-base font-bold text-gray-900 leading-snug">
                            Psicología social desde ultratumba: Creencias de la vida después de la muerte
                        </h2>
                        <p class="text-xs text-gray-500 pb-2 border-b border-gray-100">
                            Dr. Cristian Ivan Bonilla Toeyotl
                        </p>
                        <div class="space-y-1 text-xs text-gray-600">
                            <p><span class="font-semibold text-gray-800">Fecha:</span> Miércoles 3 de noviembre de 2026</p>
                            <p><span class="font-semibold text-gray-800">Horario:</span> 17:00 - 19:00</p>
                            <p><span class="font-semibold text-gray-800">Sede:</span> Auditorio Torner / Auditorio "Dra. Silvia Macotela"</p>
                        </div>
                    </div>

                    <form action="{{ route('eventos-academicos.alumnos.inscribirse', ['id' => 1]) }}" method="POST" class="mt-5">
                        @csrf
                        <button type="submit" class="w-full py-2.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-lg transition cursor-pointer">
                            Inscribirse a evento
                        </button>
                    </form>
                </div>

                {{-- Evento 2 --}}
                <div class="evento-explorar bg-white border border-gray-200 rounded-xl p-5 flex flex-col justify-between shadow-xs hover:border-indigo-300 transition"
                     data-categoria="taller"
                     data-buscar="primer encuentro enseñanza del razonamiento cuantitativo enseñar la abstracción dra. patricia romero luis fernando beltrán armando cuevas miguel pineda marina ménez auditorio torner">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-indigo-50 text-indigo-700">
                            Taller
                        </span>
                        <h2 class="text-base font-bold text-gray-900 leading-snug">
                            Primer Encuentro: Enseñanza del Razonamiento Cuantitativo: Enseñar la Abstracción
                        </h2>
                        <p class="text-xs text-gray-500 pb-2 border-b border-gray-100">
                            Dra. Patricia Romero, Dr. Luis Fernando Beltrán, Dr. Armando Cuevas, Dr. Miguel Pineda, Dra. Marina Ménez
                        </p>
                        <div class="space-y-1 text-xs text-gray-600">
                            <p><span class="font-semibold text-gray-800">Fecha:</span> Miércoles 4 de noviembre de 2026</p>
                            <p><span class="font-semibold text-gray-800">Horario:</span> 11:00 - 13:00</p>
                            <p><span class="font-semibold text-gray-800">Sede:</span> Auditorio Torner</p>
                        </div>
                    </div>

                    <form action="{{ route('eventos-academicos.alumnos.inscribirse', ['id' => 2]) }}" method="POST" class="mt-5">
                        @csrf
                        <button type="submit" class="w-full py-2.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-lg transition cursor-pointer">
                            Inscribirse a evento
                        </button>
                    </form>
                </div>

                {{-- Evento 3 --}}
                <div class="evento-explorar bg-white border border-gray-200 rounded-xl p-5 flex flex-col justify-between shadow-xs hover:border-indigo-300 transition"
                     data-categoria="seminario"
                     data-buscar="el marco de la cátedra especial ezequiel a. chávez aula c-204">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-indigo-50 text-indigo-700">
                            Seminario
                        </span>
                        <h2 class="text-base font-bold text-gray-900 leading-snug">
                            El Marco de la Cátedra Especial
                        </h2>
                        <p class="text-xs text-gray-500 pb-2 border-b border-gray-100">
                            Ezequiel A. Chávez
                        </p>
                        <div class="space-y-1 text-xs text-gray-600">
                            <p><span class="font-semibold text-gray-800">Fecha:</span> Miércoles 4 de noviembre de 2026</p>
                            <p><span class="font-semibold text-gray-800">Horario:</span> 14:00 - 16:00</p>
                            <p><span class="font-semibold text-gray-800">Sede:</span> Aula C-204</p>
                        </div>
                    </div>

                    <form action="{{ route('eventos-academicos.alumnos.inscribirse', ['id' => 3]) }}" method="POST" class="mt-5">
                        @csrf
                        <button type="submit" class="w-full py-2.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-lg transition cursor-pointer">
                            Inscribirse a evento
                        </button>
                    </form>
                </div>

                {{-- Evento 4 --}}
                <div class="evento-explorar bg-white border border-gray-200 rounded-xl p-5 flex flex-col justify-between shadow-xs hover:border-indigo-300 transition"
                     data-categoria="curso"
                     data-buscar="la vida es un cine película ciclo de cine y análisis martes 10 de noviembre de 2026 12:00 horas por confirmar">
                    <div class="space-y-3">
                        <span class="inline-block px-3 py-1 text-xs font-medium rounded-full bg-indigo-50 text-indigo-700">
                            Curso
                        </span>
                        <h2 class="text-base font-bold text-gray-900 leading-snug">
                            La Vida es un Cine — Película
                        </h2>
                        <p class="text-xs text-gray-500 pb-2 border-b border-gray-100">
                            Ciclo de cine y análisis
                        </p>
                        <div class="space-y-1 text-xs text-gray-600">
                            <p><span class="font-semibold text-gray-800">Fecha:</span> Martes 10 de noviembre de 2026</p>
                            <p><span class="font-semibold text-gray-800">Horario:</span> 12:00 horas</p>
                            <p><span class="font-semibold text-gray-800">Sede:</span> Por confirmar</p>
                        </div>
                    </div>

                    <form action="{{ route('eventos-academicos.alumnos.inscribirse', ['id' => 4]) }}" method="POST" class="mt-5">
                        @csrf
                        <button type="submit" class="w-full py-2.5 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold rounded-lg transition cursor-pointer">
                            Inscribirse a evento
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        let categoriaSeleccionada = 'todos';

        function filtrarCategoriaExplorar(categoria, btnElement) {
            categoriaSeleccionada = categoria;
            document.querySelectorAll('.filtro-cat').forEach(btn => {
                btn.classList.remove('bg-indigo-600', 'text-white');
                btn.classList.add('bg-white', 'border', 'border-gray-200', 'text-gray-700');
            });
            btnElement.classList.remove('bg-white', 'border', 'border-gray-200', 'text-gray-700');
            btnElement.classList.add('bg-indigo-600', 'text-white');
            filtrarExplorar();
        }

        function filtrarExplorar() {
            const texto = document.getElementById('buscador-explorar').value.toLowerCase().trim();
            document.querySelectorAll('.evento-explorar').forEach(card => {
                const cat = card.dataset.categoria || '';
                const buscar = card.dataset.buscar || '';
                const coincideCat = categoriaSeleccionada === 'todos' || cat === categoriaSeleccionada;
                const coincideTexto = !texto || buscar.includes(texto);
                card.style.display = (coincideCat && coincideTexto) ? 'flex' : 'none';
            });
        }
    </script>
</x-layouts.app>