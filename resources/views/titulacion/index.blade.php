<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Sistema de Titulación</title>
    <!-- Incluimos Tailwind CSS vía CDN para esta prueba rápida -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Incluimos Alpine.js para la interactividad simple del modal -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans antialiased text-gray-800">

    <!-- Contenedor Principal (Simulando que el menú lateral está colapsado) -->
    <div class="p-8 lg:ml-20"> 

        <!-- Título Principal -->
        <h1 class="text-3xl font-bold text-[#b59e35] mb-8">
            Bienvenido al Menu del Sistema de Titulacion
        </h1>

        <!-- Panel Superior (Dashboard resumen) -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8 flex flex-col md:flex-row items-center justify-between gap-6 border border-gray-100">
            
            <!-- Sección: Consultar Estatus -->
            <div class="flex-1 flex flex-col items-center border-r border-gray-200 pr-6">
                <h2 class="text-xl font-bold italic text-gray-800 mb-1">Consultar Estatus</h2>
                <p class="text-sm text-gray-500 mb-4">Revisa tu estatus</p>
                <button class="bg-[#241a5a] text-white px-8 py-2 rounded-full font-semibold hover:bg-indigo-900 transition-colors w-full max-w-xs">
                    Entrar
                </button>
            </div>

            <!-- Gráfico circular (Simulado) -->
            <div class="flex-1 flex justify-center">
                <div class="relative w-32 h-32">
                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                        <!-- Círculo base (gris claro) -->
                        <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="12" fill="none" />
                        <!-- Círculo de progreso (amarillo) -->
                        <circle cx="50" cy="50" r="40" stroke="#eab308" stroke-width="12" fill="none" stroke-dasharray="251.2" stroke-dashoffset="150.7" /> <!-- ~40% -->
                    </svg>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-2xl font-semibold text-gray-700">40%</span>
                    </div>
                </div>
            </div>

            <!-- Sección: Botones laterales derechos -->
            <div class="flex-1 flex flex-col gap-4 pl-6">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h3 class="font-bold text-gray-800">- Bandeja de Pendientes<br>(habilitado para docentes)</h3>
                        <p class="text-xs text-gray-500">Revisa los pendientes para evaluacion</p>
                    </div>
                    <button class="bg-[#241a5a] text-white p-3 rounded-lg hover:bg-indigo-900 transition-colors flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    </button>
                </div>
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h3 class="font-bold text-gray-800">- Gestion De Proyecto</h3>
                        <p class="text-xs text-gray-500">Modifica o Elimina tu proyecto</p>
                    </div>
                    <button class="bg-[#241a5a] text-white p-3 rounded-lg hover:bg-indigo-900 transition-colors flex-shrink-0">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Grid de Tarjetas de Etapas (x-data=" { isModalOpen: false }" inicializa Alpine.js para controlar el modal) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" x-data="{ isModalOpen: false }">
            
            <!-- Tarjeta 1: Requisitos Previos -->
            <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col justify-between border border-gray-100 h-full min-h-[220px]">
                <div>
                    <div class="flex justify-between items-start mb-3">
                        <div class="bg-blue-100 p-2 rounded-lg text-blue-500">
                             <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        </div>
                        <div class="bg-[#1e1b4b] rounded-full p-1 text-white">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <h3 class="font-bold text-gray-800 text-center mb-2">1. Requisitos previos</h3>
                    <p class="text-xs text-gray-500 text-center leading-tight mb-4">
                        Los requisitos no son obligatorios al inicio, de cualquier manera tienes un lapso para cumplir con ellos, y puedes continuar con el proceso.
                    </p>
                </div>
                <!-- Botones al fondo de la tarjeta -->
                <div class="flex gap-2 mt-auto">
                    <!-- @click="isModalOpen = true" abre el modal -->
                    <button @click="isModalOpen = true" class="flex-1 bg-[#38bdf8] text-white text-xs font-bold py-2 px-1 rounded-lg hover:bg-sky-500 transition-colors italic">Ver instrucciones</button>
                    <button class="flex-1 bg-[#38bdf8] text-white text-xs font-bold py-2 px-1 rounded-lg hover:bg-sky-500 transition-colors italic">Ir a esa etapa</button>
                </div>
            </div>

            <!-- (Se omiten las tarjetas 2 a 6 por brevedad, sigue la misma estructura HTML adaptando colores y textos) -->
            <!-- Aquí irían las demás tarjetas simuladas -->

            <!-- ================= COMPONENTE MODAL DE INSTRUCCIONES ================= -->
            <!-- x-show="isModalOpen" muestra el modal cuando la variable es true -->
            <div x-show="isModalOpen" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                <!-- Fondo oscuro semitransparente -->
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    
                    <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" @click="isModalOpen = false"></div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    
                    <!-- Contenedor del Modal -->
                    <div x-show="isModalOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                        
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 relative">
                            <!-- Botón de Cerrar (X) arriba a la derecha -->
                            <button @click="isModalOpen = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                            
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                    <h3 class="text-xl leading-6 font-bold text-gray-900 mb-4" id="modal-title">
                                        Instrucciones
                                    </h3>
                                    <div class="mt-2">
                                        <p class="text-sm text-gray-600 mb-4">
                                            Antes de iniciar el proceso, asegúrate de cumplir con los siguientes requisitos:
                                        </p>
                                        <ul class="text-sm text-gray-600 mb-4 space-y-1 ml-1">
                                            <li>&bull; Contar con identificación oficial escolar vigente.</li>
                                            <li>&bull; Se verificara el avance del 70% de creditos(pendiente)</li>
                                            <li>&bull; Entrega de carta de liberacion de servicio social 100%</li>
                                            <li>&bull; Acreditacion de idioma</li>
                                        </ul>
                                        <p class="text-sm text-gray-600">
                                            Se debera de contar con los documentos digitalizados en formato PDF. Una vez cumplidos con todos los requisitos se te marcara elegible para titulacion
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Botones de Acción del Modal -->
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse gap-3">
                            <button type="button" @click="isModalOpen = false" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-6 py-2 bg-[#38bdf8] text-base font-medium text-white hover:bg-sky-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 sm:ml-3 sm:w-auto sm:text-sm">
                                Continuar
                            </button>
                            <button type="button" @click="isModalOpen = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-6 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ================= FIN COMPONENTE MODAL ================= -->

        </div>
    </div>
</body>
</html>