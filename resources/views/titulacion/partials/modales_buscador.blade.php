<!-- MODAL: Instrucciones -->
<div x-show="modalActivo === 'instrucciones'" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div x-show="modalActivo === 'instrucciones'" x-transition.opacity class="fixed inset-0 bg-gray-500 bg-opacity-75" @click="modalActivo = null"></div>
        <div x-show="modalActivo === 'instrucciones'" x-transition class="relative bg-white rounded-2xl shadow-xl max-w-sm w-full p-6 text-left">
            <h3 class="text-xl font-bold text-gray-900 mb-3 italic">Instrucciones</h3>
            <p class="text-sm text-gray-600 mb-6 italic leading-relaxed">
                Selecciona a tu director de proyecto, una vez seleccionado podrás mandarle solicitud si concuerda con el perfil que buscas. Todas las recomendaciones son sugerencias acorde a tu tema de proyecto.
            </p>
            <div class="flex justify-end">
                <button @click="modalActivo = null" class="bg-[#11052b] text-white px-6 py-2 rounded-xl text-sm font-bold hover:bg-indigo-900 transition">Continuar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL: Resumen del Docente -->
<div x-show="modalActivo === 'resumen'" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div x-show="modalActivo === 'resumen'" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-80" @click="modalActivo = null"></div>
        <div x-show="modalActivo === 'resumen'" x-transition class="relative bg-white rounded-xl shadow-2xl max-w-md w-full p-6">
            <button @click="modalActivo = null" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            
            <template x-if="docenteSeleccionado">
                <div>
                    <div class="flex items-center gap-4 mb-6 border-b pb-4">
                        <img :src="docenteSeleccionado.avatar" class="w-16 h-16 rounded-md object-cover border border-indigo-100 shadow-sm">
                        <div>
                            <h3 class="text-lg font-bold text-gray-900 leading-tight" x-text="docenteSeleccionado.nombre"></h3>
                            <p class="text-sm text-gray-500 italic">Docente - <span x-text="docenteSeleccionado.area"></span></p>
                        </div>
                    </div>
                    
                    <h4 class="font-bold text-gray-900 italic mb-2 text-lg">Descripcion</h4>
                    <p class="text-sm text-gray-600 italic leading-relaxed mb-6" x-text="docenteSeleccionado.descripcion"></p>
                    
                    <div class="flex justify-end mt-4">
                        <button @click="modalActivo = null" class="bg-[#11052b] text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-indigo-900 transition">Continuar</button>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>

<!-- MODAL: Confirmación de Envío -->
<div x-show="modalActivo === 'enviando'" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div x-show="modalActivo === 'enviando'" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-80" @click="modalActivo = null"></div>
        <div x-show="modalActivo === 'enviando'" x-transition class="relative bg-white rounded-xl shadow-2xl max-w-sm w-full pt-8 pb-6 px-6 text-center">
            
            <h3 class="text-xl font-extrabold text-gray-900 mb-1">Tu solicitud ha sido enviada</h3>
            <p class="text-sm text-indigo-500 italic mb-8">Se le notificará al receptor</p>
            
            <div class="flex items-center justify-center gap-4 mb-10 relative">
                <!-- Alumno (Tú) -->
                <div class="flex flex-col items-center relative z-10 bg-white px-2">
                    <div class="w-14 h-14 rounded-full border-2 border-indigo-500 overflow-hidden mb-2 shadow-md p-0.5">
                        <img src="https://i.pravatar.cc/150?img=11" class="w-full h-full rounded-full object-cover">
                    </div>
                    <!-- Nombre tuyo dummy (Armando Núñez) -->
                    <span class="text-[10px] text-gray-500 leading-tight">Armando Adair Nunez</span>
                    <span class="text-xs font-bold text-gray-900">320191963</span>
                </div>

                <!-- Flecha central -->
                <div class="w-8 h-8 rounded-full bg-slate-500 flex items-center justify-center text-white relative z-10 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </div>
                
                <!-- Línea conectora gris de fondo -->
                <div class="absolute top-7 left-1/4 right-1/4 h-0.5 bg-gray-200 z-0"></div>

                <!-- Docente Seleccionado -->
                <template x-if="docenteSeleccionado">
                    <div class="flex flex-col items-center relative z-10 bg-white px-2">
                        <div class="w-14 h-14 rounded-full border-2 border-indigo-500 overflow-hidden mb-2 shadow-md p-0.5">
                            <img :src="docenteSeleccionado.avatar" class="w-full h-full rounded-full object-cover">
                        </div>
                        <span class="text-[10px] text-gray-500 leading-tight truncate w-24" x-text="docenteSeleccionado.nombre"></span>
                        <span class="text-xs font-bold text-gray-900">[SINODO]</span>
                    </div>
                </template>
            </div>
            
            <div class="flex justify-center gap-4">
                <button @click="modalActivo = null" class="bg-[#d35454] text-white px-6 py-2 rounded-lg text-sm font-bold shadow-sm hover:bg-red-700 transition">Cancel</button>
                <button @click="confirmarEnvio()" class="bg-[#78c93a] text-white px-6 py-2 rounded-lg text-sm font-bold shadow-sm hover:bg-green-600 transition">Continuar</button>
            </div>
        </div>
    </div>
</div>