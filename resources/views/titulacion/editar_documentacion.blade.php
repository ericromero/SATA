<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Documentación</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background-color: rgba(255,255,255,0.2); border-radius: 4px; }
    </style>
</head>
<!-- Se inicializa activeModal = null para controlar la ventana de subida de archivos -->
<body class="bg-[#f4f4f5] h-screen overflow-hidden flex" x-data="{ activeModal: null }">

    <!-- ================= MENÚ LATERAL (IDÉNTICO AL DASHBOARD) ================= -->
    <aside class="w-64 bg-[#2b0e5a] text-white flex flex-col h-full flex-shrink-0 sidebar-scroll overflow-y-auto">
        <div class="p-6 flex items-center gap-3 mb-4">
            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 7.5l-10-5v10l10 5 10-5v-10l-10 5z"></path></svg>
            <div>
                <h2 class="font-bold leading-tight text-lg">Facultad de<br>Psicología</h2>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-2 text-sm font-semibold">
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Inicio
            </a>
            <!-- (Pega aquí los demás enlaces de tu menú lateral para mantenerlo completo) -->
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg bg-white/10 transition-colors border-l-4 border-[#c2a033]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Titulación
            </a>
        </nav>
    </aside>

    <!-- ================= CONTENIDO PRINCIPAL ================= -->
    <main class="flex-1 overflow-y-auto flex items-start justify-center pt-20">
        
        <div class="w-full max-w-2xl bg-white rounded-t-3xl rounded-b-lg shadow-sm border border-gray-100 flex flex-col items-center">
            
            <!-- Área de la Imagen Superior (Simulada con un gradiente/patrón hasta tener tu imagen real) -->
            <div class="w-full h-48 bg-gradient-to-r from-gray-800 to-gray-600 rounded-t-3xl overflow-hidden relative">
                <!-- Aquí iría la ruta real de tu imagen (los estantes con folders) -->
                <!-- <img src="{{ asset('images/estantes.png') }}" class="w-full h-full object-cover"> -->
                <div class="absolute inset-0 opacity-20 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-gray-300 via-gray-700 to-black"></div>
            </div>

            <!-- Área de los Botones Oscuros -->
            <div class="w-full bg-white p-8 rounded-b-lg flex flex-col gap-4 border-t border-gray-100 shadow-[inset_0_4px_6px_-4px_rgba(0,0,0,0.1)]">
                
                <!-- Botón: Subir Estatus de Servicio Social -->
                <button @click="activeModal = 'upload'" class="w-full bg-[#1b0a3f] text-white text-sm font-extrabold py-3.5 rounded-md italic shadow-sm hover:bg-[#11052b] transition-colors">
                    Subir Estatus de Servicio Social
                </button>

                <!-- Botón: Subir Acreditación De Idioma -->
                <button @click="activeModal = 'upload'" class="w-full bg-[#1b0a3f] text-white text-sm font-extrabold py-3.5 rounded-md italic shadow-sm hover:bg-[#11052b] transition-colors">
                    Subir Acreditacion De Idioma
                </button>

                <!-- Botón: Cancelar (Regresa a la vista anterior) -->
                <a href="{{ route('titulacion.requisitos') }}" class="w-full bg-[#9b1f23] text-white text-sm font-extrabold py-3.5 rounded-md italic shadow-sm hover:bg-[#7e181c] transition-colors text-center block">
                    Cancelar
                </a>

            </div>
        </div>
    </main>

    <!-- ================= MODAL SIMULADOR DE SUBIDA (DROPZONE) ================= -->
    <div x-show="activeModal === 'upload'" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay oscuro -->
            <div x-show="activeModal === 'upload'" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="fixed inset-0 bg-gray-900 bg-opacity-80 transition-opacity" @click="activeModal = null"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            
            <!-- Contenedor del Modal -->
            <div x-show="activeModal === 'upload'" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-2xl transform transition-all sm:my-8 sm:align-middle sm:max-w-md w-full border-t-[12px] border-[#2b0e5a]">
                
                <div class="bg-white px-6 pt-8 pb-6 relative flex flex-col gap-4">
                    
                    <!-- Botón oculto real tipo 'file' -->
                    <input type="file" id="fileInput" accept=".pdf" class="hidden">
                    
                    <!-- Área gris de Dropzone (Al hacer click abre el selector nativo del navegador) -->
                    <div onclick="document.getElementById('fileInput').click()" class="w-full bg-[#f8f9fb] border-2 border-dashed border-gray-200 rounded-lg py-12 flex items-center justify-center cursor-pointer hover:bg-gray-50 transition-colors">
                        <span class="text-[#a0a5ba] text-sm italic font-semibold">Arrastra tu archivo en PDF (Max 5MB)</span>
                    </div>

                    <!-- Botón Enviar -->
                    <button @click="activeModal = null" class="w-full bg-[#3e3b56] text-white font-extrabold italic py-3 rounded-lg hover:bg-gray-700 transition-colors mt-2 text-center text-sm">
                        Enviar
                    </button>

                    <!-- Botón Cancelar -->
                    <button @click="activeModal = null" class="w-full bg-[#db3c3c] text-white font-extrabold italic py-3 rounded-lg hover:bg-red-700 transition-colors text-center text-sm">
                        Cancel
                    </button>

                </div>
            </div>
        </div>
    </div>

</body>
</html>