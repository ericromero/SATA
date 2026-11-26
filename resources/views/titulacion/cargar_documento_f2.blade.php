<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen" x-data="cargaDocumentoF2()">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <!-- Navegación Superior -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <a href="{{ route('titulacion.menu_f2') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 mb-2 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Volver al Menú Carga de F2
                    </a>
                    <div class="flex items-center gap-3">
                        <span class="bg-[#130b2e] text-white text-xs font-extrabold px-2.5 py-1 rounded-lg">PASO 01</span>
                        <h1 class="text-3xl font-extrabold text-[#11052b] tracking-tight">Cargar Documento Final</h1>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Sube la versión concluida de tu trabajo recepcional en formato PDF para iniciar la Fase II.</p>
                </div>
            </div>

            <!-- ================= PANEL DE SIMULACIÓN VoBo (PARA PRUEBAS DE FLUJO) ================= -->
            <div class="bg-indigo-50/70 border border-indigo-200 rounded-xl p-4 mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <p class="text-xs font-extrabold text-indigo-900 uppercase tracking-wider">Simulador de Validación Previa (BD)</p>
                    <p class="text-xs text-indigo-700 mt-0.5">Activa o desactiva los vistos buenos iniciales para probar la validación <code>verificarVoBo()</code>:</p>
                </div>
                <div class="flex items-center gap-4">
                    <label class="inline-flex items-center gap-2 cursor-pointer bg-white px-3 py-1.5 rounded-lg border border-indigo-200 shadow-xs">
                        <input type="checkbox" x-model="voboDirector" @change="errorValidacion = null" class="rounded text-indigo-600 focus:ring-indigo-500">
                        <span class="text-xs font-bold text-gray-800">VoBo Director</span>
                    </label>
                    <label class="inline-flex items-center gap-2 cursor-pointer bg-white px-3 py-1.5 rounded-lg border border-indigo-200 shadow-xs">
                        <input type="checkbox" x-model="voboRevisor" @change="errorValidacion = null" class="rounded text-indigo-600 focus:ring-indigo-500">
                        <span class="text-xs font-bold text-gray-800">VoBo Revisor</span>
                    </label>
                </div>
            </div>

            <!-- ================= TARJETA DE VERIFICACIÓN DE REQUISITOS (VoBo) ================= -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-4">
                    <div>
                        <h2 class="text-base font-bold text-gray-900">Verificación de Visto Bueno Inicial (Fase I)</h2>
                        <p class="text-xs text-gray-500">El sistema comprueba que tu Director y Revisor hayan avalado la conclusión del borrador.</p>
                    </div>
                    <span x-show="voboCompleto" class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Avales Completos</span>
                    <span x-show="!voboCompleto" style="display: none;" class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">Avales Pendientes</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- Estado Director -->
                    <div class="p-4 rounded-xl border flex items-center justify-between"
                         :class="voboDirector ? 'bg-green-50/40 border-green-200' : 'bg-gray-50 border-gray-200'">
                        <div>
                            <p class="text-[11px] font-bold uppercase text-gray-400">Director(a) de Proyecto</p>
                            <p class="text-sm font-bold text-gray-900 mt-0.5">DRA. CÁRDENAS LÓPEZ MARÍA GEORGINA</p>
                        </div>
                        <span x-show="voboDirector" class="text-green-600 font-extrabold text-xs flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            VoBo OK
                        </span>
                        <span x-show="!voboDirector" style="display: none;" class="text-red-500 font-bold text-xs">Pendiente</span>
                    </div>

                    <!-- Estado Revisor -->
                    <div class="p-4 rounded-xl border flex items-center justify-between"
                         :class="voboRevisor ? 'bg-green-50/40 border-green-200' : 'bg-gray-50 border-gray-200'">
                        <div>
                            <p class="text-[11px] font-bold uppercase text-gray-400">Revisor(a) de Proyecto</p>
                            <p class="text-sm font-bold text-gray-900 mt-0.5">DRA. ROJAS FERNÁNDEZ GILDA TERESA</p>
                        </div>
                        <span x-show="voboRevisor" class="text-green-600 font-extrabold text-xs flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            VoBo OK
                        </span>
                        <span x-show="!voboRevisor" style="display: none;" class="text-red-500 font-bold text-xs">Pendiente</span>
                    </div>
                </div>
            </div>

            <!-- ================= ALERTA DE ERROR E.REV.01 (SI voBoStatus == False) ================= -->
            <div x-show="errorValidacion" style="display: none;" x-transition class="bg-red-50 border-l-4 border-red-600 rounded-r-xl p-5 mb-6 shadow-sm">
                <div class="flex items-start gap-3">
                    <div class="w-9 h-9 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2">
                            <span class="bg-red-600 text-white text-[10px] font-extrabold px-2 py-0.5 rounded uppercase tracking-wider">Error E.REV.01</span>
                            <h3 class="text-sm font-extrabold text-red-900">Falta Visto Bueno inicial</h3>
                        </div>
                        <p class="text-xs text-red-800 mt-1 leading-relaxed" x-text="errorValidacion"></p>
                    </div>
                </div>
            </div>

            <!-- ================= FORMULARIO DE CARGA DEL TRABAJO FINAL ================= -->
            <div x-show="!cargaExitosa" class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 md:p-8">
                    <div class="mb-6">
                        <span class="text-xs font-bold uppercase text-indigo-600 tracking-wider">Proyecto Registrado (F1 Aprobado)</span>
                        <h3 class="text-base font-bold text-gray-900 mt-1">Efectividad de las intervenciones cognitivo-conductuales digitales en estudiantes universitarios con ansiedad académica.</h3>
                    </div>

                    <input type="file" x-ref="inputTrabajoFinal" accept=".pdf" class="hidden" @change="seleccionarArchivo($event)">

                    <!-- Zona Drag & Drop PDF -->
                    <div @click="$refs.inputTrabajoFinal.click()"
                         :class="archivoNombre ? 'border-indigo-500 bg-indigo-50/40' : 'border-gray-300 bg-gray-50 hover:border-indigo-500 hover:bg-indigo-50/30'"
                         class="w-full border-2 border-dashed rounded-2xl py-12 px-6 flex flex-col items-center justify-center cursor-pointer transition-all text-center">

                        <template x-if="!archivoNombre">
                            <div class="flex flex-col items-center">
                                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm border border-gray-200 flex items-center justify-center text-indigo-600 mb-4">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                </div>
                                <p class="text-sm font-bold text-gray-800">Haz clic para seleccionar el PDF de tu Trabajo Final</p>
                                <p class="text-xs text-gray-500 mt-1">Formato único permitido: PDF • Tamaño máximo: 20 MB</p>
                            </div>
                        </template>

                        <template x-if="archivoNombre">
                            <div class="flex flex-col items-center">
                                <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mb-3">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <p class="text-sm font-extrabold text-[#11052b]" x-text="archivoNombre"></p>
                                <p class="text-xs text-gray-500 mt-0.5" x-text="'Tamaño: ' + archivoTamano"></p>
                                <span class="mt-3 text-xs font-bold text-indigo-600 underline">Cambiar archivo PDF</span>
                            </div>
                        </template>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="mt-8 pt-6 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <button type="button" @click="limpiar()" class="w-full sm:w-auto bg-white border border-gray-300 text-gray-700 px-6 py-2.5 rounded-xl text-sm font-semibold hover:bg-gray-50 transition">
                            Limpiar selección
                        </button>

                        <button type="button" @click="subirTrabajoFinal()" :disabled="procesando"
                                class="w-full sm:w-auto bg-[#130b2e] hover:bg-[#20134a] text-white px-8 py-3 rounded-xl text-sm font-bold shadow-md transition flex items-center justify-center gap-2">
                            <svg x-show="procesando" style="display: none;" class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            <span x-text="procesando ? 'Validando VoBo y subiendo...' : 'Validar VoBo y Subir Trabajo Final'"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- ================= ESTADO EXITOSO: SOLICITUD F2 PENDIENTE ================= -->
            <div x-show="cargaExitosa" style="display: none;" x-transition class="bg-white rounded-2xl shadow-sm border border-green-200 p-8 md:p-10 text-center">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>

                <span class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-bold bg-amber-100 text-amber-800 mb-3">
                    Estatus actualizado: Solicitud F2 Pendiente
                </span>

                <h2 class="text-2xl font-extrabold text-gray-900 mb-2">¡Trabajo Final cargado correctamente!</h2>
                <p class="text-sm text-gray-600 max-w-lg mx-auto mb-6">
                    El archivo <span class="font-bold text-gray-900" x-text="archivoNombre"></span> ha sido almacenado y se ha enviado la notificación automática a la <strong>Coordinación de Área / Gestor de Titulación</strong>.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="{{ route('titulacion.menu_f2') }}" class="w-full sm:w-auto bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-xl text-sm font-bold transition">
                        Volver al Menú Carga de F2
                    </a>
                    <a href="{{ route('titulacion.buscador_docentes') }}" class="w-full sm:w-auto bg-[#130b2e] hover:bg-[#20134a] text-white px-8 py-3 rounded-xl text-sm font-bold shadow-md transition">
                        Continuar: Buscar Sínodo (4 Docentes) →
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script>
        function cargaDocumentoF2() {
            return {
                voboDirector: true,
                voboRevisor: true,
                archivoNombre: '',
                archivoTamano: '',
                procesando: false,
                errorValidacion: null,
                cargaExitosa: false,

                get voboCompleto() {
                    return this.voboDirector && this.voboRevisor;
                },

                seleccionarArchivo(event) {
                    const file = event.target.files[0];
                    this.errorValidacion = null;
                    if (!file) return;

                    if (file.type !== 'application/pdf') {
                        alert('Solo se permiten archivos en formato PDF.');
                        event.target.value = '';
                        return;
                    }

                    this.archivoNombre = file.name;
                    this.archivoTamano = (file.size / (1024 * 1024)).toFixed(2) + ' MB';
                },

                limpiar() {
                    this.archivoNombre = '';
                    this.archivoTamano = '';
                    this.errorValidacion = null;
                    this.$refs.inputTrabajoFinal.value = '';
                },

                subirTrabajoFinal() {
                    if (!this.archivoNombre) {
                        alert('Por favor selecciona el archivo PDF de tu trabajo final antes de continuar.');
                        return;
                    }

                    this.procesando = true;
                    this.errorValidacion = null;

                    // Simula la llamada uploadTrabajo() -> verificarVoBo() del diagrama de secuencia
                    setTimeout(() => {
                        this.procesando = false;

                        if (!this.voboCompleto) {
                            let faltantes = [];
                            if (!this.voboDirector) faltantes.push('Director(a) de Proyecto');
                            if (!this.voboRevisor) faltantes.push('Revisor(a) de Proyecto');

                            this.errorValidacion = 'No es posible registrar tu trabajo final porque falta el Visto Bueno inicial de: ' + faltantes.join(' y ') + '. Solicita su aval en Fase I antes de reintentar.';
                            return;
                        }

                        // Si voBoStatus == True -> guardarArchivo() y actualizarEstatus("Solicitud F2 Pendiente")
                        this.cargaExitosa = true;
                    }, 900);
                }
            }
        }
    </script>
</x-layouts.app>