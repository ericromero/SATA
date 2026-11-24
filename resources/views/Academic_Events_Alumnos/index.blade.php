<x-layouts.app title="Inicio — Eventos Académicos">
    <div class="min-h-screen bg-white text-gray-900">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 space-y-4">
            
            {{-- Encabezado --}}
            <div>
                <h1 class="text-xl font-bold text-gray-900">
                    ¡Hola, {{ Auth::user()->name ?? 'Alumno' }}!
                </h1>
                <p class="text-xs text-gray-500 mt-0.5">
                    Bienvenida al módulo de Eventos Académicos de la Facultad de Psicología.
                </p>
            </div>

            {{-- Fila superior: Aviso importante + Tu estatus --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 items-start">
                {{-- Aviso importante (ajustado a su contenido) --}}
                <div class="lg:col-span-2 h-fit bg-amber-50 border border-amber-200 rounded-xl p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                    <div class="flex items-start gap-3">
                        <div class="p-2 bg-amber-100 text-amber-600 rounded-lg shrink-0">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-xs font-semibold text-gray-900">Aviso importante</h2>
                            <p class="text-xs text-gray-600 mt-0.5">
                                El evento <span class="font-medium text-gray-800">"Taller de Estrategias de Aprendizaje"</span> ha sido reprogramado. Se ha actualizado la fecha, horario y sede. Consulta los detalles en "Mis eventos".
                            </p>
                        </div>
                    </div>
                    <a href="{{ url('/eventos-academicos/alumnos/mis-eventos') }}" class="shrink-0 px-3.5 py-1.5 bg-amber-500 hover:bg-amber-600 text-white text-xs font-medium rounded-lg transition">
                        Ver detalles
                    </a>
                </div>

                {{-- Tu estatus --}}
                <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-xs space-y-2">
                    <div class="flex items-center gap-2 text-indigo-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                        </svg>
                        <h2 class="text-xs font-semibold text-gray-900">Tu estatus</h2>
                    </div>
                    <div class="flex items-center justify-between text-xs">
                        <span class="text-gray-500">Cancelaciones disponibles</span>
                        <span class="font-bold text-gray-900">1 / 2</span>
                    </div>
                    <div class="p-2 rounded-lg bg-emerald-50 border border-emerald-200 text-[11px] text-emerald-800">
                        <span class="font-semibold">Sin penalizaciones activas:</span> Puedes inscribirte en nuevos eventos.
                    </div>
                </div>
            </div>

            {{-- Próximos eventos destacados (Carrusel) --}}
            <div class="bg-white border border-gray-200 rounded-xl p-4 shadow-xs space-y-4">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Próximos eventos destacados</h2>
                        <p class="text-xs text-gray-500">No te pierdas los eventos más próximos de la Facultad.</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-1">
                            <button type="button" onclick="moverCarrusel(-1)" class="p-1.5 rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50" title="Anterior">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                </svg>
                            </button>
                            <button type="button" onclick="moverCarrusel(1)" class="p-1.5 rounded-lg border border-gray-200 bg-white text-gray-600 hover:bg-gray-50" title="Siguiente">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                        <a href="{{ url('/eventos-academicos/alumnos/explorar') }}" class="text-xs font-medium text-indigo-600 hover:text-indigo-700">
                            Ver todos los eventos →
                        </a>
                    </div>
                </div>

                {{-- Contenedor de tarjetas del carrusel --}}
                <div id="carrusel-eventos" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    {{-- Flyer 1: Conferencia --}}
                    <div class="flyer-evento border border-gray-200 rounded-xl p-4 flex flex-col justify-between bg-white hover:border-indigo-300 transition">
                        <div class="space-y-2">
                            <span class="inline-block px-2 py-0.5 text-[11px] font-medium rounded-full bg-indigo-50 text-indigo-700">
                                Conferencia
                            </span>
                            <h3 class="text-sm font-bold text-gray-900 leading-snug">
                                Psicología social desde ultratumba: Creencias de la vida después de la muerte
                            </h3>
                            <p class="text-xs text-gray-500">
                                Dr. Cristian Ivan Bonilla Toeyotl
                            </p>
                            <div class="pt-2 border-t border-gray-100 space-y-1 text-xs text-gray-600">
                                <p><span class="font-medium text-gray-800">Fecha:</span> Miércoles 3 de noviembre de 2026</p>
                                <p><span class="font-medium text-gray-800">Horario:</span> 17:00 - 19:00</p>
                                <p><span class="font-medium text-gray-800">Sede:</span> Auditorio Torner / Auditorio "Dra. Silvia Macotela"</p>
                            </div>
                        </div>
                        <form action="{{ url('/eventos-academicos/alumnos/eventos/1/inscribirse') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg transition cursor-pointer">
                                Inscribirse a evento
                            </button>
                        </form>
                    </div>

                    {{-- Flyer 2: Taller --}}
                    <div class="flyer-evento border border-gray-200 rounded-xl p-4 flex flex-col justify-between bg-white hover:border-indigo-300 transition">
                        <div class="space-y-2">
                            <span class="inline-block px-2 py-0.5 text-[11px] font-medium rounded-full bg-indigo-50 text-indigo-700">
                                Taller
                            </span>
                            <h3 class="text-sm font-bold text-gray-900 leading-snug">
                                Primer Encuentro: Enseñanza del Razonamiento Cuantitativo: Enseñar la Abstracción
                            </h3>
                            <p class="text-xs text-gray-500">
                                Dra. Patricia Romero, Dr. Luis Fernando Beltrán, Dr. Armando Cuevas, Dr. Miguel Pineda, Dra. Marina Ménez
                            </p>
                            <div class="pt-2 border-t border-gray-100 space-y-1 text-xs text-gray-600">
                                <p><span class="font-medium text-gray-800">Fecha:</span> Miércoles 4 de noviembre de 2026</p>
                                <p><span class="font-medium text-gray-800">Horario:</span> 11:00 - 13:00</p>
                                <p><span class="font-medium text-gray-800">Sede:</span> Auditorio Torner</p>
                            </div>
                        </div>
                        <form action="{{ url('/eventos-academicos/alumnos/eventos/2/inscribirse') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg transition cursor-pointer">
                                Inscribirse a evento
                            </button>
                        </form>
                    </div>

                    {{-- Flyer 3: Seminario --}}
                    <div class="flyer-evento border border-gray-200 rounded-xl p-4 flex flex-col justify-between bg-white hover:border-indigo-300 transition">
                        <div class="space-y-2">
                            <span class="inline-block px-2 py-0.5 text-[11px] font-medium rounded-full bg-indigo-50 text-indigo-700">
                                Seminario
                            </span>
                            <h3 class="text-sm font-bold text-gray-900 leading-snug">
                                El Marco de la Cátedra Especial
                            </h3>
                            <p class="text-xs text-gray-500">
                                Ezequiel A. Chávez
                            </p>
                            <div class="pt-2 border-t border-gray-100 space-y-1 text-xs text-gray-600">
                                <p><span class="font-medium text-gray-800">Fecha:</span> Miércoles 4 de noviembre de 2026</p>
                                <p><span class="font-medium text-gray-800">Horario:</span> 14:00 - 16:00</p>
                                <p><span class="font-medium text-gray-800">Sede:</span> Aula C-204</p>
                            </div>
                        </div>
                        <form action="{{ url('/eventos-academicos/alumnos/eventos/3/inscribirse') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg transition cursor-pointer">
                                Inscribirse a evento
                            </button>
                        </form>
                    </div>

                    {{-- Flyer 4: Curso --}}
                    <div class="flyer-evento border border-gray-200 rounded-xl p-4 flex flex-col justify-between bg-white hover:border-indigo-300 transition">
                        <div class="space-y-2">
                            <span class="inline-block px-2 py-0.5 text-[11px] font-medium rounded-full bg-indigo-50 text-indigo-700">
                                Curso
                            </span>
                            <h3 class="text-sm font-bold text-gray-900 leading-snug">
                                La Vida es un Cine — Película
                            </h3>
                            <p class="text-xs text-gray-500">
                                Ciclo de cine y análisis
                            </p>
                            <div class="pt-2 border-t border-gray-100 space-y-1 text-xs text-gray-600">
                                <p><span class="font-medium text-gray-800">Fecha:</span> Martes 10 de noviembre de 2026</p>
                                <p><span class="font-medium text-gray-800">Horario:</span> 12:00 horas</p>
                                <p><span class="font-medium text-gray-800">Sede:</span> Por confirmar</p>
                            </div>
                        </div>
                        <form action="{{ url('/eventos-academicos/alumnos/eventos/4/inscribirse') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg transition cursor-pointer">
                                Inscribirse a evento
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Accesos rápidos inferiores --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <a href="{{ url('/eventos-academicos/alumnos/mis-eventos') }}" class="min-h-[165px] bg-white border border-gray-200 rounded-xl p-6 flex flex-col items-center justify-center text-center hover:border-indigo-400 hover:shadow-xs transition">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-900">Mis eventos próximos</h3>
                    <p class="text-xs text-gray-500 mt-1 max-w-xs">
                        Revisa los eventos a los que estás inscrito y gestiona tu asistencia.
                    </p>
                </a>

                <a href="{{ url('/eventos-academicos/alumnos/historial') }}" class="min-h-[165px] bg-white border border-gray-200 rounded-xl p-6 flex flex-col items-center justify-center text-center hover:border-indigo-400 hover:shadow-xs transition">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-900">Historial de eventos</h3>
                    <p class="text-xs text-gray-500 mt-1 max-w-xs">
                        Consulta el registro de tus asistencias pasadas y justificaciones.
                    </p>
                </a>

                <a href="{{ url('/eventos-academicos/alumnos/mis-constancias') }}" class="min-h-[165px] bg-white border border-gray-200 rounded-xl p-6 flex flex-col items-center justify-center text-center hover:border-indigo-400 hover:shadow-xs transition">
                    <div class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-50 text-indigo-600 mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-gray-900">Mis constancias</h3>
                    <p class="text-xs text-gray-500 mt-1 max-w-xs">
                        Descarga tus constancias de participación en los eventos que has acreditado.
                    </p>
                </a>
            </div>
        </div>
    </div>

    <script>
        let indiceInicio = 0;

        function actualizarCarrusel() {
            const tarjetas = document.querySelectorAll('#carrusel-eventos .flyer-evento');
            const visibles = 3;
            if (!tarjetas.length) return;

            tarjetas.forEach((tarjeta, idx) => {
                if (idx >= indiceInicio && idx < indiceInicio + visibles) {
                    tarjeta.style.display = 'flex';
                } else {
                    tarjeta.style.display = 'none';
                }
            });
        }

        function moverCarrusel(direccion) {
            const tarjetas = document.querySelectorAll('#carrusel-eventos .flyer-evento');
            const visibles = 3;
            if (tarjetas.length <= visibles) return;

            indiceInicio += direccion;
            if (indiceInicio < 0) {
                indiceInicio = tarjetas.length - visibles;
            } else if (indiceInicio > tarjetas.length - visibles) {
                indiceInicio = 0;
            }
            actualizarCarrusel();
        }

        document.addEventListener('DOMContentLoaded', actualizarCarrusel);
    </script>
</x-layouts.app>