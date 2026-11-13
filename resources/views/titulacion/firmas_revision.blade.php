<x-layouts.app>
    <!-- Alpine.js x-data: Gestiona el estado de firmas automático -->
    <div class="py-12 bg-gray-50 min-h-screen" x-data="{
        modalF1Visible: true,
        enviado: false,
        pasoActual: 0, /* 0=Director, 1=Revisor, 2=Coord, 3=División, 4=Terminado */
        intervaloProceso: null,
        ultimaActualizacion: '',

        /* Estructura de datos para el Timeline */
        firmantes: [
            { titulo: '1. Firma del Director', descripcion: 'Revisión y aval del director del proyecto.', estado: 'pendiente', fecha: '' },
            { titulo: '2. Firma del Revisor', descripcion: 'Validación metodológica del revisor asignado.', estado: 'pendiente', fecha: '' },
            { titulo: '3. Firma de Coordinación', descripcion: 'Visto bueno del área académica correspondiente.', estado: 'pendiente', fecha: '' },
            { titulo: '4. Firma de la División', descripcion: 'Sello oficial de Estudios Profesionales.', estado: 'pendiente', fecha: '' }
        ],

        enviarF1() {
            this.enviado = true;
            this.ultimaActualizacion = new Date().toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
            
            /* El primer paso pasa a 'en_proceso' automáticamente */
            this.firmantes[0].estado = 'en_proceso';

            /* SIMULACIÓN DE ACTUALIZACIÓN AUTOMÁTICA (En la vida real esto se hace con WebSockets o Polling a la BD) */
            /* Avanza automáticamente un paso cada 4 segundos */
            this.intervaloProceso = setInterval(() => {
                if (this.pasoActual < 4) {
                    /* Completa el paso actual */
                    this.firmantes[this.pasoActual].estado = 'completado';
                    this.firmantes[this.pasoActual].fecha = new Date().toLocaleDateString('es-MX') + ' ' + new Date().toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit' });
                    
                    this.pasoActual++;
                    
                    /* Si hay un paso siguiente, lo pone en proceso */
                    if (this.pasoActual < 4) {
                        this.firmantes[this.pasoActual].estado = 'en_proceso';
                    } else {
                        /* Si ya terminó, detiene el temporizador */
                        clearInterval(this.intervaloProceso);
                    }
                    
                    this.ultimaActualizacion = new Date().toLocaleTimeString('es-MX', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
                }
            }, 4000);
        }
    }">
        
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="{{ route('titulacion.menu_f1') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 mb-4 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Volver al Menú F1
                </a>
                <h1 class="text-3xl font-extrabold text-[#11052b] tracking-tight mb-2">Seguimiento de Firmas F1</h1>
                <p class="text-gray-500">Monitorea el progreso de tu trámite en tiempo real.</p>
            </div>

            <!-- Contenedor Principal (Reemplaza el diseño gris anterior) -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-200">
                
                <!-- ESTADO 1: Antes de Enviar -->
                <div x-show="!enviado" class="text-center py-12">
                    <div class="w-20 h-20 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Tu F1 está listo para enviarse</h2>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">Al hacer clic en enviar, tu documento viajará automáticamente a través de las 4 etapas de firmas institucionales requeridas.</p>
                    
                    <button @click="enviarF1" class="bg-[#18113a] text-white px-10 py-3 rounded-lg text-sm font-bold hover:bg-[#20134a] transition shadow-md flex items-center gap-2 mx-auto">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        Iniciar Proceso de Firmas
                    </button>
                </div>

                <!-- ESTADO 2: Proceso Activo (Timeline Moderno) -->
                <div x-show="enviado" style="display: none;">
                    
                    <div class="flex justify-between items-center mb-8 border-b pb-4">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Estatus del Documento</h3>
                            <div class="flex items-center gap-2 mt-1 text-xs">
                                <span class="relative flex h-3 w-3" x-show="pasoActual < 4">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                                </span>
                                <span class="text-gray-500" x-text="pasoActual < 4 ? 'Actualizando automáticamente...' : 'Proceso concluido'"></span>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Última actualización</p>
                            <p class="text-sm font-semibold text-indigo-600" x-text="ultimaActualizacion"></p>
                        </div>
                    </div>

                    <!-- TIMELINE VERTICAL -->
                    <div class="relative pl-4 sm:pl-6">
                        <template x-for="(paso, index) in firmantes" :key="index">
                            <div class="mb-8 relative flex items-start group">
                                
                                <!-- Línea conectora (se oculta en el último elemento) -->
                                <div x-show="index !== firmantes.length - 1" class="absolute left-[11px] top-8 bottom-[-2rem] w-0.5" :class="paso.estado === 'completado' ? 'bg-indigo-600' : 'bg-gray-200'"></div>

                                <!-- Iconos de Estado (Nodos) -->
                                <div class="relative z-10 flex items-center justify-center w-6 h-6 rounded-full mt-1 bg-white border-2" 
                                     :class="{
                                         'border-indigo-600 bg-indigo-600': paso.estado === 'completado',
                                         'border-amber-500': paso.estado === 'en_proceso',
                                         'border-gray-300': paso.estado === 'pendiente'
                                     }">
                                     
                                    <!-- Icono Completado -->
                                    <svg x-show="paso.estado === 'completado'" class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    
                                    <!-- Punto animado para 'En Proceso' -->
                                    <span x-show="paso.estado === 'en_proceso'" class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></span>
                                </div>

                                <!-- Contenido del Paso -->
                                <div class="ml-6 flex-1 bg-gray-50 rounded-lg p-4 border transition" :class="paso.estado === 'en_proceso' ? 'border-amber-200 shadow-sm' : 'border-transparent'">
                                    <div class="flex justify-between items-start mb-1">
                                        <h4 class="font-bold text-sm" :class="paso.estado === 'pendiente' ? 'text-gray-500' : 'text-gray-900'" x-text="paso.titulo"></h4>
                                        
                                        <!-- Badges de Estado -->
                                        <span x-show="paso.estado === 'completado'" class="bg-indigo-50 text-indigo-700 text-[10px] font-bold px-2 py-1 rounded-full uppercase">Firmado</span>
                                        <span x-show="paso.estado === 'en_proceso'" class="bg-amber-100 text-amber-800 text-[10px] font-bold px-2 py-1 rounded-full uppercase flex items-center gap-1">
                                            <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                            En revisión
                                        </span>
                                        <span x-show="paso.estado === 'pendiente'" class="bg-gray-200 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-full uppercase">Pendiente</span>
                                    </div>
                                    
                                    <p class="text-xs text-gray-500 mb-2" x-text="paso.descripcion"></p>
                                    
                                    <!-- Fecha de completado -->
                                    <div x-show="paso.estado === 'completado'" class="flex items-center gap-1 text-[11px] text-gray-400 font-medium">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        Firmado el: <span x-text="paso.fecha"></span>
                                    </div>
                                </div>

                            </div>
                        </template>
                    </div>

                    <!-- Mensaje Final de Éxito -->
                    <div x-show="pasoActual === 4" x-transition.duration.500ms class="mt-8 bg-green-50 border border-green-200 rounded-xl p-5 text-center">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m14-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-green-800 font-bold mb-1">¡Proceso de Firmas Concluido!</h3>
                        <p class="text-green-700 text-sm mb-4">Tu F1 ha recolectado todas las firmas exitosamente y está validado.</p>
                        <a href="{{ route('dashboard') }}" class="inline-block bg-green-600 text-white px-6 py-2 rounded-lg text-sm font-bold hover:bg-green-700 transition">Regresar al Menú Principal</a>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- ================= MODAL: AVISO CREACIÓN F1 ================= -->
        <!-- Mantenemos el modal intacto como solicitaste -->
        <div x-show="modalF1Visible" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div x-show="modalF1Visible" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-80"></div>
                
                <div x-show="modalF1Visible" x-transition class="relative bg-white shadow-2xl max-w-4xl w-full rounded-2xl overflow-hidden p-8 border border-gray-200">
                    
                    <button @click="modalF1Visible = false" class="absolute top-4 right-4 bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-800 p-2 rounded-full transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>

                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Se ha creado tu F1, pero requiere firmas para su validez</h2>
                    
                    <div class="relative w-full max-w-2xl mx-auto border border-gray-300 shadow-sm opacity-60 pointer-events-none p-4">
                        <div class="flex justify-between mb-4"><div class="w-12 h-16 border"></div><div class="text-center text-[8px] font-bold"><p>FORMA 1</p><p>FACULTAD DE PSICOLOGÍA</p></div><div class="w-12 h-12 border"></div></div>
                        <div class="border p-2 mb-2"><div class="h-2 bg-gray-300 w-1/2 mb-1"></div><div class="h-2 bg-gray-300 w-3/4"></div></div>
                        <div class="border p-2 mb-2 h-12"></div>
                        <div class="border p-2 mb-2 h-20"></div>
                        <div class="border p-2 mb-10 h-20"></div>
                    </div>

                    <div class="flex justify-end mt-[-3rem] relative z-10 mr-12">
                        <button @click="modalF1Visible = false" class="bg-[#18113a] text-white px-8 py-3 rounded-lg text-lg font-bold italic shadow-lg hover:bg-indigo-900 transition">
                            Ir a envío de firmas
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-layouts.app>