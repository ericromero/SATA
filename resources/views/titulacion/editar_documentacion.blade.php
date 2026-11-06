<x-layouts.app>
    <div class="py-12" x-data="{ activeModal: null }">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="h-40 bg-indigo-100 flex items-center justify-center border-b border-gray-200">
                    <span class="text-indigo-800 font-medium">Área de Documentos Institucionales</span>
                </div>

                <div class="p-8 flex flex-col gap-4 bg-gray-50">
                    <button @click="activeModal = 'upload'" class="w-full bg-indigo-600 text-white py-3 rounded-md text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
                        Subir Estatus de Servicio Social
                    </button>
                    <button @click="activeModal = 'upload'" class="w-full bg-indigo-600 text-white py-3 rounded-md text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
                        Subir Acreditación De Idioma
                    </button>
                    <a href="{{ route('titulacion.requisitos') }}" class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-md text-sm font-medium hover:bg-gray-50 transition text-center shadow-sm">
                        Cancelar
                    </a>
                </div>
            </div>
        </div>

        <!-- Modal Simulador de Subida (Estilo Starter Kit) -->
        <div x-show="activeModal === 'upload'" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="activeModal === 'upload'" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="activeModal = null"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
                
                <div x-show="activeModal === 'upload'" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white px-6 pt-8 pb-6">
                        <input type="file" id="fileInput" accept=".pdf" class="hidden">
                        
                        <div onclick="document.getElementById('fileInput').click()" class="w-full bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg py-12 flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100 transition-colors">
                            <svg class="w-10 h-10 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <span class="text-gray-500 text-sm font-medium">Arrastra tu archivo PDF aquí (Max 5MB)</span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="activeModal = null" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 sm:ml-3 sm:w-auto sm:text-sm">
                            Enviar Archivo
                        </button>
                        <button @click="activeModal = null" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>