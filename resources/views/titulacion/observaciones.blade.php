<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen" x-data="{
        archivoNombre: '',
        enviado: false,
        procesando: false,
        
        enviarCorreccion() {
            if (!this.archivoNombre) {
                alert('Por favor adjunta tu documento corregido antes de subirlo.');
                return;
            }
            this.procesando = true;
            // Simulamos el tiempo de carga al servidor
            setTimeout(() => {
                this.procesando = false;
                this.enviado = true;
            }, 1500);
        }
    }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Botón de regreso -->
            <div class="mb-6">
                <a href="{{ route('titulacion.menu_f1') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Volver al Menú F1
                </a>
            </div>

            <!-- Encabezado Personalizado -->
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 rounded-full border-2 border-indigo-200 overflow-hidden shadow-sm">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Perfil" class="w-full h-full object-cover">
                </div>
                <div>
                    <h1 class="text-2xl font-extrabold text-[#11052b] tracking-tight">Hola, Armando Núñez</h1>
                    <p class="text-gray-500 font-medium text-sm">No. Cuenta: 320191963</p>
                </div>
            </div>

            <div x-show="!enviado" x-transition>
                <!-- Banner de Alerta (Estado del Proyecto) -->
                <div class="bg-red-50 border-l-4 border-red-500 p-5 rounded-r-xl shadow-sm mb-8 flex items-start gap-4">
                    <div class="bg-red-100 text-red-600 p-2 rounded-full mt-1">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-red-800">Tu anteproyecto requiere modificaciones</h2>
                        <p class="text-red-700 text-sm mt-1">El comité ha revisado tu solicitud F1 y ha emitido observaciones que debes atender antes de poder continuar con la búsqueda de tu director de proyecto.</p>
                    </div>
                </div>

                <!-- Tarjeta de Retroalimentación -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-8 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="font-bold text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Detalle de Observaciones
                        </h3>
                        <span class="text-xs font-semibold text-gray-500 bg-gray-200 px-3 py-1 rounded-full">Hace 2 días</span>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#11052b] text-white flex items-center justify-center font-bold text-sm flex-shrink-0">
                                CA
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900 mb-1">Comité Académico de Titulación</p>
                                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-sm text-gray-700 leading-relaxed">
                                    <p class="mb-3">Estimado alumno, tras revisar su formato F1 hemos encontrado los siguientes detalles que deben ser corregidos:</p>
                                    <ul class="list-disc pl-5 space-y-1 mb-3 text-red-600 font-medium">
                                        <li>El título del proyecto excede el límite de palabras recomendado por el área clínica.</li>
                                        <li>Falta especificar el número telefónico del segundo integrante en el formato adjunto.</li>
                                    </ul>
                                    <p>Por favor, modifique su documento PDF original con las correcciones solicitadas y vuelva a subirlo en esta misma pantalla.</p>
                                </div>
                                
                                <!-- Documento Original con Error -->
                                <div class="mt-4 flex items-center gap-3 bg-white border border-gray-200 p-3 rounded-lg w-fit">
                                    <svg class="w-8 h-8 text-red-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
                                    <div>
                                        <p class="text-xs font-bold text-gray-900">anteproyecto_v1.pdf</p>
                                        <p class="text-[10px] text-red-500 font-semibold">Documento rechazado</p>
                                    </div>
                                    <button class="ml-4 text-indigo-600 hover:text-indigo-800 text-xs font-bold">Descargar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Zona de Subida de Corrección -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="p-6 md:p-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Subir Corrección</h3>
                        <p class="text-sm text-gray-500 mb-6">Adjunta la nueva versión de tu formato F1 con las observaciones ya atendidas.</p>
                        
                        <input type="file" x-ref="archivoCorreccion" accept=".pdf" class="hidden" @change="archivoNombre = $event.target.files[0] ? $event.target.files[0].name : ''">
                        
                        <!-- Drag & Drop Zone -->
                        <div @click="$refs.archivoCorreccion.click()" class="w-full bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl py-10 flex flex-col items-center justify-center cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition-colors shadow-sm mb-6">
                            
                            <!-- Estado inicial vacío -->
                            <svg x-show="!archivoNombre" class="w-10 h-10 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                            <span x-show="!archivoNombre" class="text-gray-600 text-sm font-medium">Haz clic para buscar tu PDF o arrástralo aquí</span>
                            <span x-show="!archivoNombre" class="text-gray-400 text-xs mt-1">(Máx. 5MB)</span>
                            
                            <!-- Estado con archivo seleccionado -->
                            <svg x-show="archivoNombre" style="display: none;" class="w-10 h-10 text-green-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span x-show="archivoNombre" style="display: none;" class="text-indigo-700 text-sm font-bold" x-text="'Listo para enviar: ' + archivoNombre"></span>
                            <span x-show="archivoNombre" style="display: none;" class="text-gray-500 text-xs mt-1 underline">Clic para cambiar archivo</span>
                        </div>
                        
                        <div class="flex justify-end">
                            <button @click="enviarCorreccion" :disabled="procesando" class="bg-[#10b981] text-white px-8 py-3 rounded-lg text-sm font-bold shadow-md hover:bg-[#059669] transition flex items-center gap-2" :class="{'opacity-75 cursor-not-allowed': procesando}">
                                
                                <!-- Spinner de carga -->
                                <svg x-show="procesando" style="display: none;" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                
                                <span x-text="procesando ? 'Subiendo...' : 'Subir nueva versión'"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pantalla de Éxito al subir -->
            <div x-show="enviado" style="display: none;" x-transition.duration.500ms class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center mt-10">
                <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-3">¡Corrección enviada exitosamente!</h2>
                <p class="text-gray-600 mb-8 max-w-md mx-auto">Tu documento actualizado ha sido turnado nuevamente al Comité Académico. Recibirás una notificación cuando sea aprobado para continuar con tus firmas.</p>
                <a href="{{ route('titulacion.menu_f1') }}" class="inline-block bg-[#11052b] text-white px-8 py-3 rounded-lg text-sm font-bold shadow-sm hover:bg-indigo-900 transition">Regresar al Menú F1</a>
            </div>

        </div>
    </div>
</x-layouts.app>