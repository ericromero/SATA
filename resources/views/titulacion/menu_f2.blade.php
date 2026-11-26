<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <!-- Encabezado con distintivo de Fase II -->
            <div class="text-center mb-10">
                <span class="inline-flex items-center gap-1.5 py-1 px-3.5 rounded-full text-xs font-bold bg-indigo-100 text-indigo-800 mb-2">
                    Fase II • Trabajo Final y Sínodo
                </span>
                <h1 class="text-3xl font-extrabold text-[#11052b] tracking-tight">Menú Carga de F2</h1>
                <p class="text-sm text-gray-500 mt-1">Gestiona la entrega de tu documento final, la asignación de sinodales y los votos aprobatorios.</p>
            </div>

            <!-- ================= SECCIÓN 1: RUTA SECUENCIAL HORIZONTAL (3 PASOS) ================= -->
            <div class="relative mb-10 z-10">
                
                <!-- Línea conectora horizontal (visible en pantallas medianas y grandes) -->
                <div class="hidden md:block absolute top-11 left-[16%] right-[16%] h-1 bg-indigo-200 -z-10"></div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- PASO 1: Cargar documento final -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 flex flex-col hover:shadow-md hover:border-indigo-300 transition">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 bg-[#130b2e] text-white rounded-xl flex items-center justify-center font-extrabold text-sm shadow-sm">
                                01
                            </div>
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-gray-900 mb-2">Cargar documento final</h3>
                        <p class="text-xs text-gray-600 leading-relaxed mb-6 flex-1">
                            Sube tu trabajo final en PDF (requiere VoBo de Director y Revisor) y espera validación.
                        </p>

                        <a href="{{ route('titulacion.cargar_documento_f2') }}" class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                            Vamos
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>

                    <!-- PASO 2: Generador de formato F2 -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 flex flex-col hover:shadow-md hover:border-indigo-300 transition">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 bg-[#130b2e] text-white rounded-xl flex items-center justify-center font-extrabold text-sm shadow-sm">
                                02
                            </div>
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-gray-900 mb-2">Generador de tu formato</h3>
                        <p class="text-xs text-gray-600 leading-relaxed mb-6 flex-1">
                            Vincula a los 4 integrantes de tu sínodo y genera tu documento oficial Forma 2 (F2).
                        </p>

                        <a href="{{ route('titulacion.generador_f2') }}" class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                            Vamos
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>

                    <!-- PASO 3: Firmas, creación y revisión -->
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 flex flex-col hover:shadow-md hover:border-indigo-300 transition">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-11 h-11 bg-[#130b2e] text-white rounded-xl flex items-center justify-center font-extrabold text-sm shadow-sm">
                                03
                            </div>
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                        </div>

                        <h3 class="text-base font-bold text-gray-900 mb-2">Firmas, creación y revisión</h3>
                        <p class="text-xs text-gray-600 leading-relaxed mb-6 flex-1">
                            Envía tu F2 para los 4 votos aprobatorios del sínodo y las firmas administrativas finales.
                        </p>

                        <button type="button" class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                            Vamos
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>

                </div>
            </div>

            <!-- ================= SECCIÓN 2: ACCESOS DE APOYO Y PANEL DOCENTE ================= -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">

                <!-- Columna Izquierda (6 cols): Buscador de Docentes y Observaciones -->
                <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-4">

                    <!-- Acceso 1: Buscador de Docentes (Sínodo) -->
                    <a href="{{ route('titulacion.buscador_docentes') }}" class="bg-white border-2 border-indigo-100 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-600 hover:-translate-y-0.5 transition-all p-6 flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-indigo-50 text-indigo-700 rounded-xl flex items-center justify-center group-hover:bg-[#130b2e] group-hover:text-white transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <span class="text-[10px] font-bold uppercase bg-indigo-50 text-indigo-700 px-2.5 py-1 rounded-full">4 Sinodales</span>
                            </div>
                            <h4 class="text-base font-extrabold text-gray-900 group-hover:text-indigo-700 transition">Buscador de docentes</h4>
                            <p class="text-xs text-gray-500 mt-1">Invita a tus posibles sínodos a tu proyecto final.</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs font-bold text-indigo-600">
                            <span>Explorar plantilla</span>
                            <span>→</span>
                        </div>
                    </a>

                    <!-- Acceso 2: Observaciones para mi formato -->
                    <a href="{{ route('titulacion.observaciones') }}" class="bg-white border-2 border-indigo-100 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-600 hover:-translate-y-0.5 transition-all p-6 flex flex-col justify-between group">
                        <div>
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-indigo-50 text-indigo-700 rounded-xl flex items-center justify-center group-hover:bg-[#130b2e] group-hover:text-white transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold bg-red-50 text-red-600 px-2.5 py-1 rounded-full">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                                </span>
                            </div>
                            <h4 class="text-base font-extrabold text-gray-900 group-hover:text-indigo-700 transition">Observaciones para mi formato</h4>
                            <p class="text-xs text-gray-500 mt-1">Revisa el estatus y los ajustes solicitados a tu F2.</p>
                        </div>
                        <div class="mt-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs font-bold text-indigo-600">
                            <span>Ver retroalimentación</span>
                            <span>→</span>
                        </div>
                    </a>

                </div>

                <!-- Columna Derecha (6 cols): Revisión (Solo docentes autorizados / Sínodo) -->
                <div class="lg:col-span-6 bg-white rounded-2xl shadow-sm border border-gray-200 border-l-4 border-l-[#130b2e] p-6 flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="flex flex-wrap items-center justify-between gap-2 mb-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                                </div>
                                <div>
                                    <h3 class="text-base font-bold text-gray-900 leading-tight">Revisión y Voto de Sínodo</h3>
                                    <p class="text-[11px] font-bold text-indigo-600">(Solo docentes autorizados)</p>
                                </div>
                            </div>
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                        </div>

                        <p class="text-xs text-gray-600 leading-relaxed mb-4">
                            Revisa el trabajo final del alumno (plazo límite de 21 días), emite observaciones o registra tu voto aprobatorio para liberar el F2.
                        </p>
                    </div>

                    <button type="button" class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                        Vamos
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>

            </div>

            <!-- Botón de regreso al Menú Principal -->
            <div class="mt-10 flex justify-center">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-indigo-600 font-semibold transition flex items-center gap-2 bg-white px-5 py-2 rounded-full shadow-sm border border-gray-200 hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Volver al Menú Principal
                </a>
            </div>

        </div>
    </div>
</x-layouts.app>