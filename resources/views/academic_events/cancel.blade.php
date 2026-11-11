<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Encabezado de Navegación -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Cancelar evento</h1>
                    <p class="text-sm text-gray-500">Gestión de anulación y solicitudes de cancelación de eventos</p>
                </div>
                <a href="{{ route('academic-events.index') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Eventos Académicos
                </a>
            </div>

            <!-- Banner Informativo de Políticas de Cancelación -->
            <div id="cancellation-policy-banner" class="mb-8 p-5 bg-amber-50 border border-amber-200 rounded-xl text-amber-900 shadow-sm">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold text-amber-950 uppercase text-xs tracking-wider mb-1" id="banner-title">LÍMITE DE CANCELACIONES</h4>
                        <p class="text-sm leading-relaxed" id="banner-text">
                            Recuerda que de acuerdo con las políticas del sistema, no se pueden realizar más de <strong>2 cancelaciones</strong> en el periodo correspondiente <strong>(SEMESTRE ACTUAL)</strong>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Mensaje de Notificación de Éxito -->
            @if (session('success'))
                <div class="mb-6 p-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Grid de Tarjetas de Eventos -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- TARJETA 1: Evento Autorizado (Cancelación Directa) -->
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
                    <button type="button" onclick="openCancelModal('direct', 'Curso Psicología educativa 1')"
                            class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Cancelar evento
                    </button>
                </div>

                <!-- TARJETA 2: Evento Publicado (Requiere Solicitud a Gestor) -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Conferencia de Inclusión</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Evento publicado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 25/05/2026</p>
                            <p><strong>LUGAR:</strong> Auditorio Sor Juana</p>
                            <p><strong>CUPOS:</strong> 120 personas</p>
                        </div>
                    </div>
                    <button type="button" onclick="openCancelModal('request', 'Conferencia de Inclusión')"
                            class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Cancelar evento
                    </button>
                </div>

                <!-- TARJETA 3: Evento Próximo (Restricción por menos de 3 días) -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Taller de Estadística</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                                Evento publicado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 12/05/2026 (Mañana)</p>
                            <p><strong>LUGAR:</strong> Lab. Computación</p>
                            <p><strong>CUPOS:</strong> 25 personas</p>
                        </div>
                    </div>
                    <button type="button" onclick="openCancelModal('restricted', 'Taller de Estadística')"
                            class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Cancelar evento
                    </button>
                </div>

                <!-- TARJETA 4: Evento Ya Cancelado -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between opacity-75">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-base font-bold text-gray-900">Curso de Investigación</h3>
                            <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-rose-50 text-rose-700 border border-rose-200">
                                Evento cancelado
                            </span>
                        </div>
                        <div class="space-y-1 text-xs text-gray-500 mb-6">
                            <p><strong>FECHA:</strong> 15/05/2026</p>
                            <p><strong>LUGAR:</strong> Aula 204</p>
                            <p><strong>ESTADO:</strong> Cancelado el 02/05</p>
                        </div>
                    </div>
                    <button type="button" disabled
                            class="w-full py-2.5 bg-gray-200 text-gray-400 font-medium text-sm rounded-lg cursor-not-allowed">
                        Evento cancelado
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL 1: CANCELACIÓN DIRECTA -->
    <!-- ========================================== -->
    <div id="modal-direct-cancel" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-lg w-full p-6 shadow-xl">
            <div class="flex items-center gap-3 text-amber-600 mb-3">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
                <h3 class="text-xl font-bold text-gray-900">Cancelar evento</h3>
            </div>
            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Antes de continuar, indique el motivo de la cancelación. Esta información será registrada en el sistema y notificada a los usuarios involucrados.
            </p>

            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="direct-reason" class="block text-sm font-medium text-gray-700 mb-1">Motivo de cancelación:</label>
                    <textarea id="direct-reason" name="reason" rows="3" required
                              placeholder="Escriba el motivo de la cancelación..."
                              class="w-full bg-white border border-gray-300 rounded-lg p-3 text-sm text-gray-900 focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal('modal-direct-cancel')"
                            class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                        Volver
                    </button>
                    <button type="submit"
                            class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                        Cancelar evento
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL 2: SOLICITUD A GESTOR (EVENTO PUBLICADO) -->
    <!-- ========================================== -->
    <div id="modal-request-cancel" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-lg w-full p-6 shadow-xl">
            <h3 class="text-xl font-bold text-gray-900 mb-3">Solicitud de cancelación de evento</h3>
            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                La cancelación del evento no puede realizarse de manera inmediata. Debido a que el evento ya ha sido publicado, la solicitud será enviada al <strong>Gestor de Área</strong> para su revisión y autorización correspondiente, ya que su cancelación podría afectar a participantes, docentes u otros usuarios relacionados con el evento.
            </p>
            <p class="text-sm font-medium text-gray-800 mb-2">Por favor, indique el motivo de la cancelación.</p>

            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div>
                    <textarea name="reason" rows="3" required
                              placeholder="Escriba el motivo de cancelación para revisión del Gestor..."
                              class="w-full bg-white border border-gray-300 rounded-lg p-3 text-sm text-gray-900 focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>

                <div class="flex items-center justify-end gap-3 pt-2">
                    <button type="button" onclick="closeModal('modal-request-cancel')"
                            class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                        Volver
                    </button>
                    <button type="submit"
                            class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- MODAL 3: RESTRICCIÓN (MENOS DE 3 DÍAS HÁBILES) -->
    <!-- ========================================== -->
    <div id="modal-restricted-cancel" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-lg w-full p-6 shadow-xl">
            <div class="flex items-center gap-3 text-rose-600 mb-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                </svg>
                <h3 class="text-xl font-bold text-gray-900">Cancelación no permitida</h3>
            </div>

            <p class="text-sm text-gray-700 leading-relaxed mb-4">
                No es posible cancelar este evento porque faltan menos de <strong>TRES días hábiles</strong> para su realización. De acuerdo con las políticas establecidas, las cancelaciones deben efectuarse con al menos dos días hábiles de anticipación.
            </p>

            <p class="text-xs text-gray-500 leading-relaxed mb-6">
                <strong>Si requiere más información o aclarar alguna duda, comuníquese con la coordinación correspondiente.</strong>
            </p>

            <div class="flex items-center justify-center pt-2">
                <button type="button" onclick="closeModal('modal-restricted-cancel')"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition">
                    Volver
                </button>
            </div>
        </div>
    </div>

    <!-- Script de Control de Modales -->
    <script>
        function openCancelModal(type, eventTitle) {
            if (type === 'direct') {
                document.getElementById('modal-direct-cancel').classList.remove('hidden');
                document.getElementById('modal-direct-cancel').classList.add('flex');
            } else if (type === 'request') {
                document.getElementById('modal-request-cancel').classList.remove('hidden');
                document.getElementById('modal-request-cancel').classList.add('flex');
            } else if (type === 'restricted') {
                document.getElementById('modal-restricted-cancel').classList.remove('hidden');
                document.getElementById('modal-restricted-cancel').classList.add('flex');
            }
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.getElementById(modalId).classList.remove('flex');
        }
    </script>
</x-layouts.app>