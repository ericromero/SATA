@props([
    'name', // Identificador único para enlazar con Alpine.js (ej. 'etapa1', 'etapa2')
    'title' => 'Instrucciones'
])

<div 
    x-show="activeModal === '{{ $name }}'" 
    style="display: none;" 
    class="fixed inset-0 z-50 overflow-y-auto" 
    aria-labelledby="modal-title-{{ $name }}" 
    role="dialog" 
    aria-modal="true"
>
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Fondo oscuro -->
        <div 
            x-show="activeModal === '{{ $name }}'" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            x-transition:leave="ease-in duration-200" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0" 
            class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
            @click="activeModal = null"
        ></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

        <!-- Ventana Modal -->
        <div 
            x-show="activeModal === '{{ $name }}'" 
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave="ease-in duration-200" 
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full"
        >
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 relative">
                <!-- Botón de Cerrar (X) -->
                <button @click="activeModal = null" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>

                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                        <h3 class="text-xl font-bold text-gray-900 mb-4" id="modal-title-{{ $name }}">
                            {{ $title }}
                        </h3>
                        <div class="mt-2 text-sm text-gray-600">
                            <!-- Aquí se inyecta el texto personalizado que tú pongas -->
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de Acción -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-3">
                <button type="button" @click="activeModal = null" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-6 py-2 bg-[#39b4f2] text-base font-medium text-white hover:bg-sky-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Continuar
                </button>
                <button type="button" @click="activeModal = null" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-6 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>