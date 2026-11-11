<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Encabezado -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Reprogramar evento</h1>
                    <p class="text-sm text-gray-500">Gestión de solicitudes de reprogramación de eventos</p>
                </div>
                <a href="{{ route('academic-events.index') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Eventos Académicos
                </a>
            </div>

            <!-- BANNER 1: Advertencia Estándar (Límite 2 Reprogramaciones) -->
            <div id="banner-limit-warning" class="mb-8 p-5 bg-amber-50 border border-amber-200 rounded-xl text-amber-900 shadow-sm">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold text-amber-950 uppercase text-xs tracking-wider mb-1">LÍMITE DE REPROGRAMACIONES</h4>
                        <p class="text-sm leading-relaxed">
                            Recuerda que de acuerdo con las políticas del sistema, no se pueden realizar más de <strong>2 reprogramaciones</strong> en el periodo correspondiente <strong>(SEMESTRE ACTUAL)</strong>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Grid de Tarjetas de Eventos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- TARJETA 1: Evento Autorizado (Redirige a formulario) -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Curso Psicología educativa 1</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-700 border border-blue-200">
                                Evento autorizado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 20/05/2026</p>
                            <p><strong>LUGAR:</strong> Aula 101 - Edificio A</p>
                            <p><strong>CUPOS:</strong> 30 personas</p>
                        </div>
                    </div>
                    <a href="{{ route('academic-events.reprogram-form', 1) }}" 
                       class="w-full text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Reprogramar evento
                    </a>
                </div>

                <!-- TARJETA 2: Evento Próximo (Restricción < 3 días hábiles) -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Taller de Neuropsicología</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Evento publicado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 12/05/2026 (Mañana)</p>
                            <p><strong>LUGAR:</strong> Auditorio Dr. Luis Lara</p>
                            <p><strong>CUPOS:</strong> 50 personas</p>
                        </div>
                    </div>
                    <button type="button" onclick="openRestrictedModal()"
                            class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Reprogramar evento
                    </button>
                </div>

                <!-- TARJETA 3: Evento con Solicitud Pendiente -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Conferencia de Inclusión</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-amber-50 text-amber-700 border border-amber-200">
                                Pendiente de reprogramación
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA ORIGINAL:</strong> 25/05/2026</p>
                            <p><strong>SOLICITADA EL:</strong> 08/05/2026</p>
                            <p><strong>ESTADO:</strong> En revisión por Gestor</p>
                        </div>
                    </div>
                    <button type="button" disabled
                            class="w-full py-2.5 bg-gray-200 text-gray-400 font-medium text-sm rounded-lg cursor-not-allowed">
                        Solicitud en proceso
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- MODAL DE RESTRICCIÓN (< 3 días hábiles) -->
    <div id="modal-restricted-reprogram" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-lg w-full p-6 shadow-xl text-center">
            <div class="flex justify-center text-rose-600 mb-4">
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                </svg>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-3">Reprogramación no permitida</h3>

            <p class="text-sm text-gray-700 leading-relaxed mb-4">
                No es posible reprogramar este evento porque faltan menos de <strong>dos días hábiles</strong> para su realización. De acuerdo con las políticas establecidas, las reprogramaciones deben efectuarse con al menos <strong>TRES días hábiles de anticipación</strong>.
            </p>

            <p class="text-xs text-gray-500 leading-relaxed mb-6">
                <strong>Si requiere más información o aclarar alguna duda, comuníquese con la coordinación correspondiente.</strong>
            </p>

            <button type="button" onclick="closeRestrictedModal()"
                    class="px-8 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                Volver
            </button>
        </div>
    </div>

    <script>
        function openRestrictedModal() {
            document.getElementById('modal-restricted-reprogram').classList.remove('hidden');
            document.getElementById('modal-restricted-reprogram').classList.add('flex');
        }

        function closeRestrictedModal() {
            document.getElementById('modal-restricted-reprogram').classList.add('hidden');
            document.getElementById('modal-restricted-reprogram').classList.remove('flex');
        }
    </script>
</x-layouts.app>