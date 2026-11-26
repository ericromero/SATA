<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen" x-data="revisionDictamen()">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <!-- Navegación superior -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <a href="{{ route('titulacion.menu_f1') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 mb-2 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Volver al Menú Carga de F1
                    </a>
                    <div class="flex items-center gap-3">
                        <h1 class="text-3xl font-extrabold text-[#11052b] tracking-tight">Revisión y Emisión de Dictamen</h1>
                        <span class="bg-indigo-100 text-indigo-800 text-xs font-bold px-3 py-1 rounded-full">Panel Docente</span>
                    </div>
                    <p class="text-gray-500 text-sm mt-1">Evalúa el registro F1 y el anteproyecto del alumno para aprobar o emitir observaciones.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

                <!-- ================= COLUMNA IZQUIERDA: BANDEJA DE ALUMNOS ================= -->
                <div class="lg:col-span-4 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-4 bg-gray-50 border-b border-gray-200 flex items-center justify-between">
                        <h2 class="font-bold text-gray-900 text-sm">Solicitudes por Evaluar</h2>
                        <span class="bg-[#130b2e] text-white text-xs font-bold px-2.5 py-0.5 rounded-full" x-text="solicitudes.length"></span>
                    </div>

                    <div class="divide-y divide-gray-100">
                        <template x-for="item in solicitudes" :key="item.id">
                            <div @click="seleccionarSolicitud(item)"
                                 :class="solicitudActiva && solicitudActiva.id === item.id ? 'bg-indigo-50/70 border-l-4 border-indigo-600' : 'hover:bg-gray-50 border-l-4 border-transparent'"
                                 class="p-4 cursor-pointer transition-all">
                                <div class="flex justify-between items-start gap-2 mb-1">
                                    <h3 class="font-bold text-gray-900 text-sm leading-snug" x-text="item.alumno"></h3>
                                    <span x-show="item.estatus === 'pendiente'" class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-0.5 rounded-full whitespace-nowrap">Pendiente</span>
                                    <span x-show="item.estatus === 'aprobado'" class="bg-green-100 text-green-800 text-[10px] font-bold px-2 py-0.5 rounded-full whitespace-nowrap">Aprobado</span>
                                    <span x-show="item.estatus === 'rechazado'" class="bg-red-100 text-red-700 text-[10px] font-bold px-2 py-0.5 rounded-full whitespace-nowrap">Con Observaciones</span>
                                </div>
                                <p class="text-xs text-gray-500 mb-2">Cuenta: <span class="font-semibold text-gray-700" x-text="item.cuenta"></span> • <span x-text="item.modalidad"></span></p>
                                <p class="text-xs text-gray-600 line-clamp-2 italic" x-text="'&quot;' + item.titulo + '&quot;'"></p>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- ================= COLUMNA DERECHA: ÁREA DE DICTAMEN ================= -->
                <div class="lg:col-span-8">
                    <template x-if="solicitudActiva">
                        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

                            <!-- Cabecera del Expediente + Botón Vista Previa -->
                            <div class="p-6 md:p-8 border-b border-gray-200 bg-gray-50/60 flex flex-col md:flex-row md:items-center justify-between gap-4">
                                <div>
                                    <span class="text-xs font-bold uppercase tracking-wider text-indigo-600" x-text="'Expediente #' + solicitudActiva.folio"></span>
                                    <h2 class="text-xl font-extrabold text-gray-900 mt-0.5" x-text="solicitudActiva.alumno"></h2>
                                    <p class="text-xs text-gray-500 mt-1">
                                        Director: <span class="font-semibold text-gray-700" x-text="solicitudActiva.director"></span> | 
                                        Área: <span class="font-semibold text-gray-700" x-text="solicitudActiva.area"></span>
                                    </p>
                                </div>

                                <!-- BOTÓN DE VISTA PREVIA (F1 + PDF) -->
                                <button type="button" @click="modalVistaPrevia = true; tabPreview = 'f1'"
                                        class="bg-white border-2 border-[#130b2e] text-[#130b2e] hover:bg-[#130b2e] hover:text-white px-5 py-2.5 rounded-xl text-sm font-bold transition flex items-center justify-center gap-2 shadow-sm flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Vista Previa F1 / PDF
                                </button>
                            </div>

                            <!-- Resumen Rápido del Proyecto -->
                            <div class="p-6 md:p-8 border-b border-gray-200">
                                <h3 class="text-xs font-bold uppercase text-gray-400 tracking-wider mb-2">Título del Proyecto Registrado</h3>
                                <p class="text-sm font-semibold text-gray-900 bg-gray-50 p-4 rounded-lg border border-gray-200" x-text="solicitudActiva.titulo"></p>
                            </div>

                            <!-- Formulario de Resolución (Si aún no se emite dictamen en esta sesión) -->
                            <div x-show="!dictamenEmitido" class="p-6 md:p-8">
                                <h3 class="text-base font-bold text-gray-900 mb-4">Resolución del Comité / Revisor</h3>

                                <!-- Selector de Acción: Aprobar vs Rechazar con Observaciones -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                                    <button type="button" @click="tipoDictamen = 'aprobar'"
                                            :class="tipoDictamen === 'aprobar' ? 'border-green-600 bg-green-50 ring-2 ring-green-200' : 'border-gray-200 bg-white hover:bg-gray-50'"
                                            class="p-4 rounded-xl border-2 text-left transition flex items-start gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-gray-900">Emitir Dictamen Favorable</p>
                                            <p class="text-xs text-gray-500 mt-0.5">Aprueba el F1 y habilita el avance del alumno.</p>
                                        </div>
                                    </button>

                                    <button type="button" @click="tipoDictamen = 'rechazar'"
                                            :class="tipoDictamen === 'rechazar' ? 'border-red-600 bg-red-50 ring-2 ring-red-200' : 'border-gray-200 bg-white hover:bg-gray-50'"
                                            class="p-4 rounded-xl border-2 text-left transition flex items-start gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                        </div>
                                        <div>
                                            <p class="font-bold text-sm text-gray-900">Rechazar con Observaciones</p>
                                            <p class="text-xs text-gray-500 mt-0.5">Notifica al alumno los puntos exactos a corregir.</p>
                                        </div>
                                    </button>
                                </div>

                                <!-- PANEL A: DICTAMEN FAVORABLE -->
                                <div x-show="tipoDictamen === 'aprobar'" x-transition class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 mb-1">Comentarios adicionales de aprobación (Opcional)</label>
                                        <textarea x-model="comentarioAprobacion" rows="3" placeholder="Ej. Proyecto viable y bien estructurado. Se autoriza su registro oficial..." class="w-full rounded-lg border-gray-300 text-sm text-gray-900 focus:border-green-500 focus:ring-green-500"></textarea>
                                    </div>
                                    <div class="flex justify-end pt-2">
                                        <button type="button" @click="confirmarDictamen()" class="bg-[#10b981] hover:bg-[#059669] text-white px-8 py-3 rounded-xl text-sm font-bold shadow-md transition flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            Firmar y Emitir Dictamen Favorable
                                        </button>
                                    </div>
                                </div>

                                <!-- PANEL B: INGENIERÍA INVERSA DE OBSERVACIONES -->
                                <div x-show="tipoDictamen === 'rechazar'" style="display: none;" x-transition class="space-y-6">
                                    
                                    <!-- Constructor de Viñetas (Lo que verá el alumno en rojo) -->
                                    <div class="bg-red-50/50 border border-red-200 rounded-xl p-5">
                                        <label class="block text-xs font-bold text-red-900 uppercase tracking-wider mb-1">1. Señalamientos Específicos (Lista de Correcciones)</label>
                                        <p class="text-xs text-gray-600 mb-3">Agrega cada error o ajuste requerido. El alumno recibirá esta lista puntual en su buzón de observaciones.</p>

                                        <!-- Atajos rápidos para el docente -->
                                        <div class="flex flex-wrap gap-1.5 mb-3">
                                            <button type="button" @click="agregarSugerencia('El título del proyecto excede el límite de palabras recomendado.')" class="text-[11px] bg-white border border-gray-300 hover:border-indigo-500 text-gray-700 px-2.5 py-1 rounded-full transition">+ Extensión de título</button>
                                            <button type="button" @click="agregarSugerencia('Falta especificar los datos de contacto completos en el formato F1.')" class="text-[11px] bg-white border border-gray-300 hover:border-indigo-500 text-gray-700 px-2.5 py-1 rounded-full transition">+ Datos incompletos</button>
                                            <button type="button" @click="agregarSugerencia('Alinear los objetivos específicos con el planteamiento del problema en el PDF.')" class="text-[11px] bg-white border border-gray-300 hover:border-indigo-500 text-gray-700 px-2.5 py-1 rounded-full transition">+ Ajustar metodología</button>
                                        </div>

                                        <!-- Input para añadir punto -->
                                        <div class="flex gap-2 mb-4">
                                            <input type="text" x-model="nuevaObservacion" @keydown.enter.prevent="agregarPunto()" placeholder="Escribe una observación puntual y presiona Agregar..." class="flex-1 rounded-lg border-gray-300 text-sm text-gray-900 focus:border-red-500 focus:ring-red-500">
                                            <button type="button" @click="agregarPunto()" class="bg-[#130b2e] text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-indigo-900 transition">Agregar</button>
                                        </div>

                                        <!-- Lista dinámica de puntos agregados -->
                                        <div class="bg-white rounded-lg border border-gray-200 p-4">
                                            <template x-if="listaObservaciones.length > 0">
                                                <ul class="space-y-2">
                                                    <template x-for="(obs, idx) in listaObservaciones" :key="idx">
                                                        <li class="flex items-start justify-between gap-3 text-sm text-red-700 font-medium bg-red-50/70 px-3 py-2 rounded-md">
                                                            <div class="flex items-start gap-2">
                                                                <span class="font-bold">•</span>
                                                                <span x-text="obs"></span>
                                                            </div>
                                                            <button type="button" @click="eliminarPunto(idx)" class="text-gray-400 hover:text-red-600 text-xs font-bold">Quitar</button>
                                                        </li>
                                                    </template>
                                                </ul>
                                            </template>
                                            <p x-show="listaObservaciones.length === 0" class="text-xs text-gray-400 italic text-center py-2">Aún no has agregado señalamientos puntuales.</p>
                                        </div>
                                    </div>

                                    <!-- Nota General -->
                                    <div>
                                        <label class="block text-xs font-bold text-gray-700 mb-1">2. Instrucciones Generales para el Alumno</label>
                                        <textarea x-model="comentarioGeneral" rows="3" placeholder="Ej. Por favor, modifique su documento PDF original con las correcciones solicitadas y vuelva a subirlo en la plataforma..." class="w-full rounded-lg border-gray-300 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                                    </div>

                                    <div class="flex justify-end pt-2">
                                        <button type="button" @click="confirmarDictamen()" class="bg-[#d33a36] hover:bg-red-700 text-white px-8 py-3 rounded-xl text-sm font-bold shadow-md transition flex items-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                            Rechazar y Enviar Observaciones
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirmación Visual Post-Envío -->
                            <div x-show="dictamenEmitido" style="display: none;" x-transition class="p-8 text-center bg-gray-50">
                                <div class="w-16 h-16 rounded-full mx-auto mb-4 flex items-center justify-center"
                                     :class="tipoDictamen === 'aprobar' ? 'bg-green-100 text-green-600' : 'bg-amber-100 text-amber-600'">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <h3 class="text-xl font-extrabold text-gray-900 mb-2" x-text="tipoDictamen === 'aprobar' ? '¡Dictamen Favorable Emitido!' : '¡Observaciones Enviadas al Alumno!'"></h3>
                                <p class="text-sm text-gray-600 max-w-md mx-auto mb-6" x-text="tipoDictamen === 'aprobar' ? 'Se ha notificado al estudiante y el expediente continúa al flujo de firmas.' : 'El alumno ya puede visualizar tus señalamientos en su apartado de Observaciones para subir su corrección.'"></p>
                                <button type="button" @click="dictamenEmitido = false" class="bg-[#130b2e] text-white px-6 py-2.5 rounded-lg text-xs font-bold hover:bg-indigo-900 transition">Modificar Dictamen</button>
                            </div>

                        </div>
                    </template>
                </div>

            </div>
        </div>

        <!-- ================= MODAL VISTA PREVIA (FORMATO F1 Y PDF) ================= -->
        <div x-show="modalVistaPrevia" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div x-show="modalVistaPrevia" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-80" @click="modalVistaPrevia = false"></div>

                <div x-show="modalVistaPrevia" x-transition class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full overflow-hidden border border-gray-200">
                    
                    <!-- Barra superior del modal con pestañas -->
                    <div class="bg-[#11052b] text-white px-6 py-4 flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <button type="button" @click="tabPreview = 'f1'"
                                    :class="tabPreview === 'f1' ? 'bg-white text-[#11052b]' : 'bg-white/10 text-white hover:bg-white/20'"
                                    class="px-4 py-1.5 rounded-lg text-xs font-bold transition">
                                Formato Oficial F1
                            </button>
                            <button type="button" @click="tabPreview = 'pdf'"
                                    :class="tabPreview === 'pdf' ? 'bg-white text-[#11052b]' : 'bg-white/10 text-white hover:bg-white/20'"
                                    class="px-4 py-1.5 rounded-lg text-xs font-bold transition">
                                Anteproyecto Adjunto (PDF)
                            </button>
                        </div>
                        <button type="button" @click="modalVistaPrevia = false" class="text-gray-300 hover:text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <!-- CONTENIDO PESTAÑA 1: FORMA 1 -->
                    <div x-show="tabPreview === 'f1'" class="p-8 md:p-10 max-h-[75vh] overflow-y-auto text-gray-900">
                        <template x-if="solicitudActiva">
                            <div>
                                <div class="flex justify-between items-center mb-6 border-b pb-4">
                                    <div class="w-24 text-center">
                                        <div class="w-14 h-16 border border-gray-400 mx-auto flex items-center justify-center text-[10px] font-bold text-gray-500">UNAM</div>
                                    </div>
                                    <div class="text-center flex-1">
                                        <p class="text-xs font-bold">FORMA 1</p>
                                        <h2 class="text-base font-bold uppercase">Facultad de Psicología</h2>
                                        <p class="text-xs font-semibold uppercase">División de Estudios Profesionales</p>
                                        <p class="text-xs font-bold uppercase mt-1">Forma de Registro de Proyecto</p>
                                    </div>
                                    <div class="w-24 text-center">
                                        <div class="w-14 h-14 border border-gray-400 mx-auto flex items-center justify-center text-[10px] font-bold text-gray-500">PSI</div>
                                    </div>
                                </div>

                                <div class="border border-black p-3 mb-3 text-xs">
                                    <p><span class="font-bold">OPCIÓN ELEGIDA:</span> <span class="uppercase" x-text="solicitudActiva.modalidad"></span></p>
                                    <p class="mt-2"><span class="font-bold">TÍTULO:</span> <span class="uppercase" x-text="solicitudActiva.titulo"></span></p>
                                </div>

                                <div class="border border-black mb-3 text-xs">
                                    <div class="bg-gray-100 px-3 py-1.5 border-b border-black font-bold">DATOS DE LA O EL PASANTE</div>
                                    <div class="grid grid-cols-4 p-3 gap-2">
                                        <div><span class="font-bold block text-[10px] text-gray-500">NOMBRE</span><span x-text="solicitudActiva.alumno"></span></div>
                                        <div><span class="font-bold block text-[10px] text-gray-500">NO. DE CUENTA</span><span x-text="solicitudActiva.cuenta"></span></div>
                                        <div><span class="font-bold block text-[10px] text-gray-500">TELÉFONO</span><span x-text="solicitudActiva.telefono"></span></div>
                                        <div><span class="font-bold block text-[10px] text-gray-500">CORREO</span><span x-text="solicitudActiva.correo"></span></div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-xs">
                                    <div class="border border-black p-3">
                                        <p class="font-bold mb-2">DIRECTOR(A) DEL PROYECTO</p>
                                        <p><span class="font-bold">NOMBRE:</span> <span x-text="solicitudActiva.director"></span></p>
                                        <p class="mt-1"><span class="font-bold">ADSCRIPCIÓN:</span> <span x-text="solicitudActiva.area"></span></p>
                                    </div>
                                    <div class="border border-black p-3">
                                        <p class="font-bold mb-2">REVISOR(A) DEL PROYECTO</p>
                                        <p><span class="font-bold">NOMBRE:</span> <span x-text="solicitudActiva.revisor"></span></p>
                                        <p class="mt-1"><span class="font-bold">ADSCRIPCIÓN:</span> <span x-text="solicitudActiva.area"></span></p>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- CONTENIDO PESTAÑA 2: VISOR PDF SIMULADO -->
                    <div x-show="tabPreview === 'pdf'" style="display: none;" class="p-8 bg-gray-100 max-h-[75vh] overflow-y-auto">
                        <template x-if="solicitudActiva">
                            <div class="bg-white border border-gray-300 rounded-xl p-8 max-w-2xl mx-auto shadow-sm text-center">
                                <svg class="w-16 h-16 text-red-500 mx-auto mb-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
                                <h3 class="text-lg font-bold text-gray-900" x-text="solicitudActiva.archivoPdf"></h3>
                                <p class="text-xs text-gray-500 mt-1 mb-6">Documento protocolario cargado por el sustentante (2.4 MB)</p>
                                
                                <div class="text-left bg-gray-50 p-5 rounded-lg border border-gray-200 text-xs text-gray-700 space-y-2 mb-6">
                                    <p class="font-bold text-gray-900 uppercase">Resumen Ejecutivo Detectado:</p>
                                    <p>El presente anteproyecto aborda la evaluación e intervención clínica bajo el enfoque cognitivo-conductual, cumpliendo con los apartados de planteamiento del problema, justificación, objetivos e hipótesis.</p>
                                </div>

                                <button type="button" @click="alert('Descargando ' + solicitudActiva.archivoPdf)" class="bg-[#130b2e] text-white px-6 py-2.5 rounded-lg text-xs font-bold hover:bg-indigo-900 transition">
                                    Descargar PDF Completo
                                </button>
                            </div>
                        </template>
                    </div>

                    <!-- Pie del Modal -->
                    <div class="bg-gray-50 px-6 py-3 border-t border-gray-200 flex justify-end">
                        <button type="button" @click="modalVistaPrevia = false" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-5 py-2 rounded-lg text-xs font-bold transition">Cerrar Vista Previa</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function revisionDictamen() {
            return {
                modalVistaPrevia: false,
                tabPreview: 'f1',
                tipoDictamen: 'aprobar',
                dictamenEmitido: false,
                comentarioAprobacion: '',
                comentarioGeneral: 'Por favor, modifique su documento PDF original con las correcciones solicitadas y vuelva a subirlo en esta misma plataforma.',
                nuevaObservacion: '',
                listaObservaciones: [],

                solicitudes: [
                    {
                        id: 1,
                        folio: 'F1-2026-084',
                        alumno: 'NUÑEZ BADILLO ARMANDO ADAIR',
                        cuenta: '320191963',
                        telefono: '5512345678',
                        correo: 'armando@comunidad.unam.mx',
                        modalidad: 'Tesis',
                        area: 'Psicología Clínica y de la Salud',
                        titulo: 'Efectividad de las intervenciones cognitivo-conductuales digitales en estudiantes universitarios con ansiedad académica.',
                        director: 'DRA. CÁRDENAS LÓPEZ MARÍA GEORGINA',
                        revisor: 'DRA. ROJAS FERNÁNDEZ GILDA TERESA',
                        archivoPdf: 'anteproyecto_v1.pdf',
                        estatus: 'pendiente'
                    },
                    {
                        id: 2,
                        folio: 'F1-2026-085',
                        alumno: 'BONILLA VAZQUEZ ALEJANDRA',
                        cuenta: '307233530',
                        telefono: '5573013815',
                        correo: 'psico_ale@outlook.com',
                        modalidad: 'Tesina',
                        area: 'Psicología Educativa',
                        titulo: 'Estrategias de autorregulación emocional en adolescentes de nivel medio superior.',
                        director: 'DR. JUAN VELÁZQUEZ',
                        revisor: 'DRA. CÁRDENAS LÓPEZ MARÍA GEORGINA',
                        archivoPdf: 'protocolo_bonilla_2026.pdf',
                        estatus: 'pendiente'
                    }
                ],

                solicitudActiva: null,

                init() {
                    this.solicitudActiva = this.solicitudes[0];
                },

                seleccionarSolicitud(item) {
                    this.solicitudActiva = item;
                    this.dictamenEmitido = false;
                    this.listaObservaciones = [];
                    this.nuevaObservacion = '';
                },

                agregarPunto() {
                    if (this.nuevaObservacion.trim() === '') return;
                    this.listaObservaciones.push(this.nuevaObservacion.trim());
                    this.nuevaObservacion = '';
                },

                agregarSugerencia(texto) {
                    if (!this.listaObservaciones.includes(texto)) {
                        this.listaObservaciones.push(texto);
                    }
                },

                eliminarPunto(index) {
                    this.listaObservaciones.splice(index, 1);
                },

                confirmarDictamen() {
                    if (this.tipoDictamen === 'rechazar' && this.listaObservaciones.length === 0) {
                        alert('Por favor agrega al menos una observación puntual antes de rechazar el proyecto.');
                        return;
                    }
                    this.solicitudActiva.estatus = this.tipoDictamen === 'aprobar' ? 'aprobado' : 'rechazado';
                    this.dictamenEmitido = true;
                }
            }
        }
    </script>
</x-layouts.app>