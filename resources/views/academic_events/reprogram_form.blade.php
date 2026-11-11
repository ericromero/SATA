<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-4xl mx-auto bg-white border border-gray-200 rounded-2xl p-6 md:p-8 shadow-sm">
            
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
                <h1 class="text-2xl font-bold text-gray-900">Solicitud de reprogramación del evento</h1>
                <a href="{{ route('academic-events.reprogram') }}" class="text-sm text-gray-500 hover:text-gray-800 transition">
                    ← Volver
                </a>
            </div>

            <form id="reprogramForm" onsubmit="handleFormSubmit(event)" class="space-y-8">
                @csrf

                <!-- SECCIÓN 1: Motivo -->
                <div>
                    <label class="block text-base font-bold text-gray-900 mb-1">Motivo de la reprogramación</label>
                    <p class="text-xs text-gray-500 mb-3">
                        Indique el motivo por el cual desea reprogramar este evento. Esta información será registrada en el sistema y notificada a los usuarios involucrados.
                    </p>
                    <textarea name="reason" rows="3" required placeholder="por cuestiones de salud..."
                              class="w-full bg-white border border-gray-300 rounded-lg p-3 text-sm text-gray-900 focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>

                <!-- SECCIÓN 2: Modalidad -->
                <div>
                    <label class="block text-base font-bold text-gray-900 mb-2">Modalidad</label>
                    <div class="flex items-center gap-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="modality" value="Presencial" checked class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-gray-700">Presencial</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="modality" value="Virtual" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-gray-700">Virtual</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="modality" value="Híbrido" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-gray-700">Híbrido</span>
                        </label>
                    </div>
                </div>

                <!-- SECCIÓN 3: Reprogramación (Nueva Fecha y Horarios) -->
                <div class="space-y-4 pt-2">
                    <h3 class="text-base font-bold text-gray-900">Reprogramación</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Fecha del evento*</label>
                            <input type="date" id="event_date" name="event_date" required
                                   class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Espacio / Lugar*</label>
                            <select name="location" class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-indigo-500">
                                <option value="Auditorio Dr. Luis Lara">Auditorio Dr. Luis Lara</option>
                                <option value="Aula 101 - Edificio A">Aula 101 - Edificio A</option>
                                <option value="Plataforma digital">Plataforma digital</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Horario de inicio*</label>
                            <input type="time" id="start_time" name="start_time" required value="09:00"
                                   class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-1">Horario de término*</label>
                            <input type="time" id="end_time" name="end_time" required value="11:00"
                                   class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>
                </div>

                <!-- BANNER INFORMATIVO (IMPORTANTE) -->
                <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl text-amber-900 space-y-2">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span class="font-bold text-xs uppercase tracking-wide">IMPORTANTE</span>
                    </div>
                    <p class="text-xs leading-relaxed">
                        La solicitud de reprogramación será enviada al Gestor de Área para su revisión. El cambio únicamente podrá autorizarse si existe disponibilidad de fecha, hora y lugar para la realización del evento.
                    </p>
                    <p class="text-xs leading-relaxed">
                        Para el caso de los eventos publicados que cuentan con participantes inscritos, antes de autorizar el cambio, se consultará a los participantes sobre su disponibilidad para asistir en la nueva fecha y horario propuestos.
                    </p>
                </div>

                <!-- BOTONES -->
                <div class="flex items-center justify-end gap-3 pt-4">
                    <a href="{{ route('academic-events.reprogram') }}" 
                       class="px-6 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium text-sm rounded-lg transition">
                        Cancelar
                    </a>
                    <button type="submit" 
                            class="px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Enviar solicitud
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- MODAL DE ÉXITO -->
    <div id="modal-success" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white border border-gray-200 rounded-2xl max-w-md w-full p-6 shadow-xl text-center">
            <h3 class="text-lg font-bold text-gray-900 mb-2">Solicitud de reprogramación enviada con éxito</h3>
            <p class="text-xs text-gray-600 mb-6">
                El sistema ha realizado exitosamente la petición para reprogramar el evento. La solicitud pasa a estar en estado de revisión.
            </p>
            <a href="{{ route('academic-events.reprogram') }}" 
               class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition inline-block">
                Ok
            </a>
        </div>
    </div>

    <script>
        function handleFormSubmit(e) {
            e.preventDefault();
            // Mostrar modal de confirmación exitosa
            document.getElementById('modal-success').classList.remove('hidden');
            document.getElementById('modal-success').classList.add('flex');
        }
    </script>
</x-layouts.app>