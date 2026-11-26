<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen" x-data="generadorF2()">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <!-- Navegación Superior -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <a href="{{ route('titulacion.menu_f2') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 mb-2 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Volver al Menú Carga de F2
                    </a>
                    <div class="flex items-center gap-3">
                        <span class="bg-[#130b2e] text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">PASO 02</span>
                        <h1 class="text-3xl font-extrabold text-[#11052b] tracking-tight">Generador de Formato F2</h1>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Vincula a los integrantes de tu jurado examinador y genera tu Forma 2 oficial.</p>
                </div>
            </div>

            <!-- ================= ESTADO 1: VINCULACIÓN DE SÍNODO Y GENERACIÓN ================= -->
            <div x-show="!f2Generado" x-transition class="space-y-6">

                <!-- Resumen del Expediente Heredado de F1 -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                    <div class="flex flex-wrap items-center justify-between gap-2 border-b border-gray-100 pb-4 mb-4">
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-indigo-600">Datos Precargados del Sistema</span>
                            <h2 class="text-base font-bold text-gray-900">Expediente del Sustentante</h2>
                        </div>
                        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">VoBo Inicial Verificado</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                        <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-100">
                            <p class="text-[11px] font-bold uppercase text-gray-400">Pasante</p>
                            <p class="font-bold text-gray-900 mt-0.5" x-text="datosAlumno.nombre"></p>
                            <p class="text-xs text-gray-500" x-text="'Cuenta: ' + datosAlumno.cuenta"></p>
                        </div>
                        <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-100">
                            <p class="text-[11px] font-bold uppercase text-gray-400">Opción y Procedencia</p>
                            <p class="font-bold text-gray-900 mt-0.5" x-text="datosAlumno.modalidad"></p>
                            <p class="text-xs text-gray-500" x-text="'Sistema: ' + datosAlumno.sistema"></p>
                        </div>
                        <div class="bg-gray-50 p-3.5 rounded-xl border border-gray-100">
                            <p class="text-[11px] font-bold uppercase text-gray-400">Área Académica</p>
                            <p class="font-bold text-gray-900 mt-0.5" x-text="datosAlumno.area"></p>
                            <p class="text-xs text-gray-500">Plan de Estudios Vigente</p>
                        </div>
                    </div>

                    <div class="mt-4 bg-gray-50 p-3.5 rounded-xl border border-gray-100">
                        <p class="text-[11px] font-bold uppercase text-gray-400">Título del Trabajo Recepcional</p>
                        <p class="text-sm font-semibold text-gray-900 mt-0.5" x-text="datosAlumno.titulo"></p>
                    </div>
                </div>

                <!-- Selección de Jurado / Sínodo (5 Cargos Oficiales de Forma 2) -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 border-b border-gray-100 pb-4 mb-6">
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Propuesta de Jurado Examinador (Sínodo)</h2>
                            <p class="text-xs text-gray-500">El Presidente y Vocal ya están fijos desde tu F1. Selecciona a los sinodales restantes.</p>
                        </div>
                        <a href="{{ route('titulacion.buscador_docentes') }}" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 underline">
                            Consultar perfiles en Buscador →
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        
                        <!-- 1. Presidente (Director) - FIJO DESDE F1 -->
                        <div class="bg-indigo-50/50 border border-indigo-200 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-xs font-extrabold uppercase text-indigo-900">1. Presidente (Director)</label>
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold bg-indigo-100 text-indigo-800 px-2.5 py-0.5 rounded-full">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    Vinculado F1
                                </span>
                            </div>
                            <div class="w-full rounded-lg border border-indigo-200 bg-white/80 px-3.5 py-2.5 text-sm font-bold text-gray-800 select-none">
                                <span x-text="jurado.presidente"></span>
                            </div>
                        </div>

                        <!-- 2. Vocal (Revisor) - FIJO DESDE F1 -->
                        <div class="bg-indigo-50/50 border border-indigo-200 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-xs font-extrabold uppercase text-indigo-900">2. Vocal (Revisor)</label>
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold bg-indigo-100 text-indigo-800 px-2.5 py-0.5 rounded-full">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    Vinculado F1
                                </span>
                            </div>
                            <div class="w-full rounded-lg border border-indigo-200 bg-white/80 px-3.5 py-2.5 text-sm font-bold text-gray-800 select-none">
                                <span x-text="jurado.vocal"></span>
                            </div>
                        </div>

                        <!-- 3. Secretario -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                            <label class="block text-xs font-extrabold uppercase text-gray-700 mb-1.5">3. Secretario(a)</label>
                            <select x-model="jurado.secretario" class="w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Seleccionar docente --</option>
                                <template x-for="doc in sinodalesDisponibles" :key="doc.id">
                                    <option :value="doc.nombre" x-text="doc.nombre + ' (' + doc.area + ')'"></option>
                                </template>
                            </select>
                        </div>

                        <!-- 4. Suplente 1 -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4">
                            <label class="block text-xs font-extrabold uppercase text-gray-700 mb-1.5">4. Suplente 1</label>
                            <select x-model="jurado.suplente1" class="w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Seleccionar docente --</option>
                                <template x-for="doc in sinodalesDisponibles" :key="doc.id">
                                    <option :value="doc.nombre" x-text="doc.nombre + ' (' + doc.area + ')'"></option>
                                </template>
                            </select>
                        </div>

                        <!-- 5. Suplente 2 -->
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 md:col-span-2">
                            <label class="block text-xs font-extrabold uppercase text-gray-700 mb-1.5">5. Suplente 2</label>
                            <select x-model="jurado.suplente2" class="w-full rounded-lg border-gray-300 bg-white text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">-- Seleccionar docente --</option>
                                <template x-for="doc in sinodalesDisponibles" :key="doc.id">
                                    <option :value="doc.nombre" x-text="doc.nombre + ' (' + doc.area + ')'"></option>
                                </template>
                            </select>
                        </div>

                    </div>

                    <!-- Botón de Generación -->
                    <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <button type="button" @click="autocompletarSinodo()" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 underline">
                            Autocompletar sugerencia del sistema
                        </button>

                        <button type="button" @click="procesarGeneracionF2()" :disabled="procesando"
                                class="w-full sm:w-auto bg-[#130b2e] hover:bg-[#20134a] text-white px-8 py-3.5 rounded-xl text-sm font-bold shadow-md transition flex items-center justify-center gap-2">
                            <svg x-show="procesando" style="display: none;" class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            <span x-text="procesando ? 'Vinculando docentes y generando F2...' : 'Vincular Sínodo y Generar Formato F2'"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- ================= ESTADO 2: GENERACIÓN EXITOSA Y DETALLES ================= -->
            <div x-show="f2Generado" style="display: none;" x-transition class="space-y-6">

                <!-- Tarjeta Superior de Éxito -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 text-center">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xs">
                        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path></svg>
                    </div>

                    <h2 class="text-2xl font-extrabold text-gray-900 italic">¡¡Generación Exitosa!!</h2>
                    <p class="text-sm text-gray-600 italic mt-1 max-w-2xl mx-auto">
                        El formato F2 ha sido procesado correctamente y está listo para su descarga; tus docentes han sido vinculados.
                    </p>

                    <!-- Botones Vista Previa y Descargar -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-2xl mx-auto mt-8">
                        <button type="button" @click="modalF2Visible = true"
                                class="w-full bg-[#130b2e] hover:bg-[#20134a] text-white py-3.5 px-6 rounded-xl text-sm font-extrabold uppercase tracking-wider shadow-md transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            Vista Previa
                        </button>

                        <button type="button" @click="descargarPDF()"
                                class="w-full bg-[#130b2e] hover:bg-[#20134a] text-white py-3.5 px-6 rounded-xl text-sm font-extrabold uppercase tracking-wider shadow-md transition flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Descargar Formato F2
                        </button>
                    </div>

                    <p class="text-[11px] text-gray-400 italic mt-4">PDF generado automáticamente por el Sistema de la Facultad</p>
                </div>

                <!-- Tarjeta: Detalles del Documento -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 md:p-8">
                    <h3 class="text-center text-sm font-extrabold text-gray-800 italic mb-6">Detalles del documento</h3>

                    <div class="bg-gray-50 rounded-xl border border-gray-200 divide-y divide-gray-200">
                        <!-- Folio -->
                        <div class="p-4 flex items-center justify-between">
                            <div>
                                <p class="text-xs font-extrabold text-gray-800">Folio de registro</p>
                                <p class="text-sm text-gray-600 italic mt-0.5" x-text="folioRegistro"></p>
                            </div>
                            <div class="w-9 h-9 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 6a2 2 0 012-2h5l2 2h5a2 2 0 012 2v6a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"></path></svg>
                            </div>
                        </div>

                        <!-- Fecha de generación -->
                        <div class="p-4 flex items-center justify-between">
                            <div>
                                <p class="text-xs font-extrabold text-gray-800">Fecha de generación</p>
                                <p class="text-sm text-gray-600 italic mt-0.5" x-text="'Generado el ' + fechaGeneracion"></p>
                            </div>
                            <div class="w-9 h-9 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>

                        <!-- Título -->
                        <div class="p-4 flex items-center justify-between gap-4">
                            <div>
                                <p class="text-xs font-extrabold text-gray-800">Título Trabajo / Proyecto</p>
                                <p class="text-sm text-gray-600 italic mt-0.5" x-text="datosAlumno.titulo"></p>
                            </div>
                            <div class="w-9 h-9 rounded-lg bg-white border border-gray-200 flex items-center justify-center text-gray-600 flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Botón Principal: Enviar a Revisión -->
                    <div class="mt-8 flex flex-col items-center">
                        <template x-if="!enviadoARevision">
                            <div class="w-full max-w-md flex flex-col items-center gap-3">
                                <button type="button" @click="enviarARevisionSinodo()"
                                        class="w-full bg-[#130b2e] hover:bg-[#20134a] text-white py-3.5 px-8 rounded-xl text-base font-extrabold italic shadow-lg transition">
                                    Enviar a revisión
                                </button>
                                <button type="button" @click="f2Generado = false" class="text-xs text-gray-500 hover:text-indigo-600 underline">
                                    Editar propuesta de sínodo
                                </button>
                            </div>
                        </template>

                        <!-- Confirmación post-envío -->
                        <template x-if="enviadoARevision">
                            <div class="w-full bg-green-50 border border-green-200 rounded-xl p-5 text-center">
                                <span class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-bold bg-indigo-100 text-indigo-800 mb-2">
                                    Estatus actualizado: En Revisión por Sínodo
                                </span>
                                <p class="text-sm font-bold text-green-900">¡Tu Formato F2 y trabajo final han sido turnados a los sinodales!</p>
                                <p class="text-xs text-green-700 mt-1 mb-4">Se ha enviado la notificación automática a los docentes vinculados (plazo límite de evaluación: 21 días).</p>
                                <div class="flex flex-wrap justify-center gap-3">
                                    <a href="{{ route('titulacion.menu_f2') }}" class="bg-white border border-gray-300 text-gray-800 px-5 py-2.5 rounded-lg text-xs font-bold hover:bg-gray-50 transition">
                                        Volver al Menú Carga de F2
                                    </a>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

        </div>

        <!-- ================= MODAL OFICIAL: FORMA 2 ================= -->
        <div x-show="modalF2Visible" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div x-show="modalF2Visible" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-80" @click="modalF2Visible = false"></div>

                <div x-show="modalF2Visible" x-transition class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full p-6 md:p-10 text-gray-900 border-t-8 border-[#130b2e]">
                    
                    <!-- Cabecera del Modal -->
                    <div class="flex items-center justify-between border-b border-gray-200 pb-4 mb-6">
                        <h3 class="text-lg md:text-xl font-bold text-gray-900">Se ha creado tu F2, pero requiere enviarse a revisión por tu Sínodo seleccionado</h3>
                        <button type="button" @click="modalF2Visible = false" class="bg-gray-100 hover:bg-gray-200 text-gray-600 p-2 rounded-full transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <!-- Documento Oficial FORMA 2 -->
                    <div class="border border-gray-300 p-6 md:p-10 bg-white shadow-inner max-h-[70vh] overflow-y-auto text-xs leading-relaxed">
                        
                        <!-- Encabezado Institucional -->
                        <div class="flex justify-between items-start mb-6">
                            <div class="w-24 text-center">
                                <div class="w-14 h-16 border border-gray-400 mx-auto flex items-center justify-center text-[9px] font-bold text-gray-500">UNAM</div>
                                <p class="text-[7px] uppercase font-bold mt-1 leading-tight">Universidad Nacional Autónoma de México</p>
                            </div>
                            <div class="text-center flex-1">
                                <p class="font-bold uppercase">División de Estudios Profesionales</p>
                                <p class="font-bold uppercase">Facultad de Psicología</p>
                                <p class="font-extrabold uppercase mt-1">FORMA 2</p>
                            </div>
                            <div class="w-24 text-center">
                                <div class="w-14 h-14 border border-gray-400 mx-auto flex items-center justify-center text-[9px] font-bold text-gray-500">PSI</div>
                                <p class="text-[8px] font-bold mt-1 leading-tight">Facultad de Psicología</p>
                            </div>
                        </div>

                        <!-- Sistema de Procedencia -->
                        <div class="flex justify-end mb-6">
                            <p class="font-bold uppercase text-[11px]">
                                SISTEMA DE PROCEDENCIA: <span class="underline font-normal" x-text="datosAlumno.sistema"></span>
                            </p>
                        </div>

                        <!-- Destinatario -->
                        <div class="mb-6 font-bold uppercase text-[11px] leading-snug">
                            <p>DR. GERMÁN PALAFOX PALAFOX</p>
                            <p>DIRECTOR, FACULTAD DE PSICOLOGÍA</p>
                            <p>PRESENTE</p>
                        </div>

                        <!-- Cuerpo del Oficio -->
                        <p class="mb-6 text-justify">
                            Me permito proponer a usted el jurado que examinará a el pasante
                            <span class="font-bold uppercase underline px-1" x-text="datosAlumno.nombre"></span>
                            con número de cuenta: <span class="font-bold underline px-1" x-text="datosAlumno.cuenta"></span>
                            quien sustentará la <span class="font-bold uppercase" x-text="datosAlumno.modalidad"></span> cuyo título es:
                            <span class="font-bold uppercase underline px-1" x-text="datosAlumno.titulo"></span>.
                            Para obtener el Título de: <span class="font-bold">LICENCIADO EN PSICOLOGÍA.</span>
                        </p>

                        <!-- Lista del Jurado Propuesto -->
                        <div class="space-y-2.5 mb-8 pl-2 text-[11px]">
                            <p><span class="font-bold inline-block w-28">PRESIDENTE:</span> <span class="uppercase" x-text="jurado.presidente"></span></p>
                            <p><span class="font-bold inline-block w-28">VOCAL:</span> <span class="uppercase" x-text="jurado.vocal"></span></p>
                            <p><span class="font-bold inline-block w-28">SECRETARIO:</span> <span class="uppercase" x-text="jurado.secretario"></span></p>
                            <p><span class="font-bold inline-block w-28">SUPLENTE:</span> <span class="uppercase" x-text="jurado.suplente1"></span></p>
                            <p><span class="font-bold inline-block w-28">SUPLENTE:</span> <span class="uppercase" x-text="jurado.suplente2"></span></p>
                        </div>

                        <!-- Lema y Fecha -->
                        <div class="mb-12 text-[11px]">
                            <p class="font-bold uppercase">ATENTAMENTE</p>
                            <p class="font-bold uppercase">“POR MI RAZA HABLARÁ EL ESPÍRITU”</p>
                            <p>Ciudad Universitaria, Cd. Mx., <span class="underline" x-text="fechaGeneracion"></span></p>
                        </div>

                        <!-- Firmas Institucionales -->
                        <div class="grid grid-cols-2 gap-8 text-center text-[10px] font-bold uppercase mb-8 pt-6">
                            <div>
                                <div class="border-t border-black pt-1 mx-4">
                                    COORDINADORA DEL ÁREA DE PSICOLOGÍA CLÍNICA Y DE LA SALUD
                                </div>
                            </div>
                            <div>
                                <div class="border-t border-black pt-1 mx-4">
                                    JEFE DE LA DIVISIÓN DE ESTUDIOS PROFESIONALES
                                </div>
                            </div>
                        </div>

                        <div class="text-center text-[10px] font-bold uppercase mb-8">
                            <p class="mb-8">AUTORIZACIÓN</p>
                            <div class="border-t border-black pt-1 max-w-xs mx-auto">
                                <p>DR. GERMÁN PALAFOX PALAFOX</p>
                                <p>DIRECTOR DE LA FACULTAD DE PSICOLOGÍA</p>
                            </div>
                        </div>

                        <!-- Pie Institucional y Código de Barras -->
                        <div class="text-center border-t border-gray-200 pt-3">
                            <p class="text-[9px] text-gray-600 mb-2">Av. Universidad 3004, Col. Copilco - Universidad, C.P. 04510, Del. Coyoacán, México, Cd. Mx.</p>
                            <div class="flex justify-center h-6 opacity-60">
                                <svg class="w-40 h-full" preserveAspectRatio="none" viewBox="0 0 100 20" fill="currentColor"><path d="M0 0h2v20H0zM4 0h1v20H4zM7 0h3v20H7zM12 0h1v20h-1zM15 0h4v20h-4zM21 0h2v20h-2zM25 0h1v20h-1zM28 0h3v20h-3zM33 0h1v20h-1zM36 0h4v20h-4zM42 0h2v20h-2zM46 0h1v20h-1zM49 0h3v20h-3zM54 0h1v20h-1zM57 0h4v20h-4zM63 0h2v20h-2zM67 0h1v20h-1zM70 0h3v20h-3zM75 0h1v20h-1zM78 0h4v20h-4zM84 0h2v20h-2zM88 0h1v20h-1zM91 0h3v20h-3zM96 0h1v20h-1zM99 0h1v20h-1z"/></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Botón Regresar -->
                    <div class="mt-6 flex justify-end">
                        <button type="button" @click="modalF2Visible = false" class="bg-[#130b2e] hover:bg-[#20134a] text-white px-8 py-2.5 rounded-xl text-sm font-extrabold italic shadow-md transition">
                            Regresar
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
        function generadorF2() {
            return {
                procesando: false,
                f2Generado: false,
                modalF2Visible: false,
                enviadoARevision: false,
                folioRegistro: '#ID-213828129-F2',
                fechaGeneracion: new Date().toLocaleDateString('es-MX', { day: 'numeric', month: 'long', year: 'numeric' }),

                datosAlumno: {
                    nombre: 'NUÑEZ BADILLO ARMANDO ADAIR',
                    cuenta: '320191963',
                    modalidad: 'TESIS',
                    sistema: 'ESCOLARIZADO',
                    area: 'Psicología Clínica y de la Salud',
                    titulo: 'EFECTIVIDAD DE LAS INTERVENCIONES COGNITIVO-CONDUCTUALES DIGITALES EN ESTUDIANTES UNIVERSITARIOS CON ANSIEDAD ACADÉMICA.'
                },

                docentesDisponibles: [
                    { id: 1, nombre: 'DRA. CÁRDENAS LÓPEZ MARÍA GEORGINA', area: 'Clínica' },
                    { id: 2, nombre: 'DRA. ROJAS FERNÁNDEZ GILDA TERESA', area: 'Educativa' },
                    { id: 3, nombre: 'DR. JUAN VELÁZQUEZ', area: 'Neurociencias' },
                    { id: 4, nombre: 'MTRO. ERICK ROMERO', area: 'Clínica' },
                    { id: 5, nombre: 'DR. ALONSO PAIPAL', area: 'Organizacional' },
                    { id: 6, nombre: 'DRA. MANOLA HERNÁNDEZ HERNÁNDEZ', area: 'Clínica' }
                ],

                jurado: {
                    presidente: 'DRA. CÁRDENAS LÓPEZ MARÍA GEORGINA',
                    vocal: 'DRA. ROJAS FERNÁNDEZ GILDA TERESA',
                    secretario: '',
                    suplente1: '',
                    suplente2: ''
                },

                get sinodalesDisponibles() {
                    return this.docentesDisponibles.filter(
                        doc => doc.nombre !== this.jurado.presidente && doc.nombre !== this.jurado.vocal
                    );
                },

                autocompletarSinodo() {
                    this.jurado.secretario = 'DR. JUAN VELÁZQUEZ';
                    this.jurado.suplente1 = 'MTRO. ERICK ROMERO';
                    this.jurado.suplente2 = 'DRA. MANOLA HERNÁNDEZ HERNÁNDEZ';
                },

                procesarGeneracionF2() {
                    if (!this.jurado.secretario || !this.jurado.suplente1 || !this.jurado.suplente2) {
                        alert('Por favor selecciona al Secretario y a los dos Suplentes para completar el jurado.');
                        return;
                    }

                    this.procesando = true;
                    setTimeout(() => {
                        this.procesando = false;
                        this.f2Generado = true;
                        this.modalF2Visible = true;
                    }, 800);
                },

                descargarPDF() {
                    alert('Descargando archivo oficial: FORMA_2_' + this.datosAlumno.cuenta + '.pdf');
                },

                enviarARevisionSinodo() {
                    this.enviadoARevision = true;
                }
            }
        }
    </script>
</x-layouts.app>