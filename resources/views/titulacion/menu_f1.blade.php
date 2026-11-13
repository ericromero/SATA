<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Encabezado -->
            <div class="text-center mb-10">
                <p class="text-sm text-gray-500 font-medium mb-1">Dashboard de Procesos</p>
                <h1 class="text-3xl font-extrabold text-[#11052b] tracking-tight">Menú Carga de F1</h1>
            </div>

            <!-- Estructura a 2 Columnas -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                
                <!-- ================= COLUMNA 1 (Izquierda: Procesos Conectados) ================= -->
                <div class="lg:col-span-7 relative flex flex-col gap-6 z-10">
                    
                    <!-- LÍNEA CONECTORA (Pasa exacto por detrás de los iconos) -->
                    <div class="absolute left-10 top-12 bottom-12 w-1 bg-indigo-200 -z-10 -ml-[2px] hidden sm:block"></div>

                    <!-- 1. Seleccionar modalidad y registrar F1 (AHORA ES EL PASO 1) -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex flex-col hover:shadow-md transition">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 flex-shrink-0 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 leading-tight">1. Seleccionar modalidad y registrar F1</h3>
                        </div>
                        <div class="pl-14 flex flex-col flex-1">
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600 w-fit mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                            <p class="text-xs text-gray-600 mb-4 flex-1">Selecciona tu modalidad, sube tu documento final y espera el visto bueno.</p>
                            <!-- Enlace conectado a tu vista -->
                            <a href="{{ route('titulacion.seleccionar_modalidad') }}" class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                                Vamos <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>

                    <!-- 2. Buscador de docentes (AHORA ES EL PASO 2) -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex flex-col hover:shadow-md transition">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 flex-shrink-0 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                                <svg class="w-4 h-4 -ml-2 mt-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 leading-tight">2. Buscador de docentes</h3>
                        </div>
                        <div class="pl-14 flex flex-col flex-1">
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600 w-fit mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                            <p class="text-xs text-gray-600 mb-4 flex-1">Invita a tus posibles sínodos a tu proyecto.</p>
                            <!-- Enlace conectado a la vista del buscador -->
                            <a href="{{ route('titulacion.buscador_docentes') }}" class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                                Vamos <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>

                    <!-- 3. Firmas, creación y revisión -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex flex-col hover:shadow-md transition">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 flex-shrink-0 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 leading-tight">3. Firmas, creación y revisión</h3>
                        </div>
                        <div class="pl-14 flex flex-col flex-1">
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600 w-fit mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                            <p class="text-xs text-gray-600 mb-4 flex-1">Envía tu documento para la validación final de firmas.</p>
                            <a href="{{ route('titulacion.firmas_revision') }}" class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                                Vamos <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>

                </div>

                <!-- ================= COLUMNA 2 (Derecha) ================= -->
                <div class="lg:col-span-5 flex flex-col gap-6 items-center lg:items-start">
                    
                    <!-- Botón "Puro Ojito" (Observaciones) -->
                    <a href="{{ route('titulacion.observaciones') }}" class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md hover:border-indigo-500 transition group flex flex-col items-center justify-center gap-2 w-32 h-32" title="Observaciones para mi formato">
                        <div class="bg-indigo-50 text-indigo-600 rounded-full p-3.5 group-hover:bg-indigo-600 group-hover:text-white transition">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-gray-500 group-hover:text-indigo-700 text-center leading-tight">Ver<br>Observaciones</span>
                    </a>

                    <!-- Revisión / Emisión dictamen -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-5 flex flex-col hover:shadow-md transition w-full">
                        <div class="flex items-center gap-3 mb-1">
                            <div class="w-10 h-10 flex-shrink-0 bg-indigo-50 text-indigo-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-900 leading-tight">Revisión / Emisión dictamen</h3>
                        </div>
                        <div class="pl-14 flex flex-col flex-1">
                            <p class="text-[10px] font-bold text-gray-400 mb-2">(Solo docentes autorizados)</p>
                            <span class="inline-flex items-center gap-1.5 py-0.5 px-2.5 rounded-full text-[11px] font-bold bg-red-50 text-red-600 w-fit mb-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Incompleto
                            </span>
                            <p class="text-xs text-gray-600 mb-4 flex-1">Revisa el trabajo del alumno y evalúalo.</p>
                            <button class="w-full bg-[#130b2e] text-white py-2.5 rounded-lg text-sm font-semibold hover:bg-[#20134a] transition flex items-center justify-center gap-2">
                                Vamos <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
            
            <!-- Botón de regreso al Dashboard -->
            <div class="mt-10 flex justify-center">
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-indigo-600 font-semibold transition flex items-center gap-2 bg-white px-5 py-2 rounded-full shadow-sm border border-gray-200 hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Volver al Menú Principal
                </a>
            </div>

        </div>
    </div>
</x-layouts.app>