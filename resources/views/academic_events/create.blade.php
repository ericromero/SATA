<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-4xl mx-auto">
            
            <!-- Encabezado con Botón de Información -->
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    <h1 class="text-2xl font-bold text-gray-900">Formulario de Registro</h1>
                    
                    <!-- Botón desplegable de información -->
                    <button type="button" id="btn-info-toggle" 
                            class="w-7 h-7 rounded-full bg-indigo-100 hover:bg-indigo-200 text-indigo-700 flex items-center justify-center font-bold text-sm transition"
                            title="Ver información sobre el tiempo de respuesta">
                        ?
                    </button>
                </div>
                
               <a href="{{ route('academic-events.manage') }}" 
                    class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Gestión de Eventos
                </a>
            </div>

            <!-- Banner Informativo del Tiempo de Respuesta (Oculto por defecto) -->
            <div id="info-banner" class="hidden mb-6 p-5 bg-indigo-50 border border-indigo-200 rounded-xl text-sm text-indigo-950 shadow-sm">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-indigo-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <h4 class="font-bold text-indigo-900 mb-1">Tiempo de respuesta a solicitud</h4>
                        <p class="leading-relaxed">
                            Una vez completado el registro del evento académico, el sistema requiere un plazo de validación adicional. La solicitud será enviada a la bandeja correspondiente, donde el <strong>Gestor de Área</strong> será el responsable de evaluar los datos ingresados y emitir la autorización oficial para su posterior publicación.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Errores de Validación -->
            @if ($errors->any())
                <div class="mb-6 p-4 text-sm text-red-700 bg-red-50 border border-red-200 rounded-xl">
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario Principal -->
            <form action="{{ route('academic-events.store') }}" method="POST" id="event-form" class="space-y-6">
                @csrf
                <input type="hidden" name="action" id="form-action" value="submit">

                <!-- 1. INFORMACIÓN GENERAL -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Información General
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Nombre del evento *</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                   placeholder="Ejemplo: Psicología Aplicada I"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <div>
                            <label for="event_type" class="block text-sm font-medium text-gray-700 mb-1">Tipo de evento</label>
                            <select id="event_type" name="event_type" 
                                    class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                                <option value="Seleccionar opción">Seleccionar opción</option>
                                <option value="Ponencia">Ponencia</option>
                                <option value="Conferencia">Conferencia</option>
                                <option value="Taller">Taller</option>
                                <option value="Curso">Curso</option>
                                <option value="Simposio">Simposio</option>
                            </select>
                        </div>

                        <div>
                            <label for="academic_area" class="block text-sm font-medium text-gray-700 mb-1">Área académica</label>
                            <input type="text" id="academic_area" name="academic_area" value="{{ old('academic_area') }}"
                                   placeholder="Ej. División de Estudios Profesionales"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="target_audience" class="block text-sm font-medium text-gray-700 mb-1">Población objetivo</label>
                            <input type="text" id="target_audience" name="target_audience" value="{{ old('target_audience') }}"
                                   placeholder="Ej. Estudiantes de licenciatura"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="max_capacity" class="block text-sm font-medium text-gray-700 mb-1">Cupo máximo</label>
                            <input type="number" id="max_capacity" name="max_capacity" value="{{ old('max_capacity', 40) }}" min="1"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción del evento</label>
                            <textarea id="description" name="description" rows="3"
                                      placeholder="Describa los objetivos y temática del evento..."
                                      class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- 2. MODALIDAD -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 100-6 3 3 0 000 6z"></path>
                        </svg>
                        Modalidad
                    </h2>

                    <div class="flex items-center gap-6 mb-4">
                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="modality" value="Presencial" checked class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-gray-800">Presencial</span>
                        </label>

                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="modality" value="Virtual" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-gray-800">Virtual</span>
                        </label>

                        <label class="inline-flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="modality" value="Híbrida" class="text-indigo-600 focus:ring-indigo-500">
                            <span class="text-sm font-medium text-gray-800">Híbrida</span>
                        </label>
                    </div>

                    <!-- Campos de Modalidad Presencial -->
                    <div id="section-presencial" class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 pt-4 border-t border-gray-100">
                        <div>
                            <label for="building" class="block text-sm font-medium text-gray-700 mb-1">Edificio</label>
                            <input type="text" id="building" name="building" placeholder="Ej. Edificio A"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label for="auditorium" class="block text-sm font-medium text-gray-700 mb-1">Auditorio / Salón</label>
                            <input type="text" id="auditorium" name="auditorium" placeholder="Ej. Auditorio Sor Juana"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>

                    <!-- Campos de Modalidad Virtual -->
                    <div id="section-virtual" class="hidden grid-cols-1 gap-4 mt-4 pt-4 border-t border-gray-100">
                        <div>
                            <label for="digital_platform" class="block text-sm font-medium text-gray-700 mb-1">Plataforma digital</label>
                            <select id="digital_platform" name="digital_platform"
                                    class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                                <option value="Zoom">Zoom</option>
                                <option value="Google Meet">Google Meet</option>
                                <option value="Microsoft Teams">Microsoft Teams</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- 3. PROGRAMACIÓN -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Programación
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Fecha de inicio *</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" required
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Fecha de término</label>
                            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Horario de inicio</label>
                            <input type="time" id="start_time" name="start_time" value="{{ old('start_time', '10:00') }}"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">Horario de término</label>
                            <input type="time" id="end_time" name="end_time" value="{{ old('end_time', '12:00') }}"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>
                </div>

                <!-- 4. RESPONSABLE DEL EVENTO -->
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-100 flex items-center gap-2">
                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Responsable del Evento
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label for="responsible_name" class="block text-sm font-medium text-gray-700 mb-1">Docente responsable</label>
                            <input type="text" id="responsible_name" name="responsible_name" 
                                   value="{{ old('responsible_name', auth()->user()->name ?? '') }}"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="responsible_email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                            <input type="email" id="responsible_email" name="responsible_email" 
                                   value="{{ old('responsible_email', auth()->user()->email ?? '') }}"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>

                        <div>
                            <label for="responsible_phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono de contacto</label>
                            <input type="text" id="responsible_phone" name="responsible_phone" value="{{ old('responsible_phone') }}" placeholder="Ej. 5512345678"
                                   class="w-full bg-white border border-gray-300 rounded-lg px-3.5 py-2 text-gray-900 text-sm focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>
                </div>

                <!-- BOTONES DE ACCIÓN (Guardar Borrador / Terminar Registro) -->
                <div class="flex items-center justify-end gap-3 pt-4">
                    <button type="button" id="btn-draft" 
                            class="px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Guardar Borrador
                    </button>

                    <button type="button" id="btn-submit" 
                            class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                        Terminar Registro
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script Interactivo del Prototipo -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Toggle Banner de Información
            const btnInfo = document.getElementById('btn-info-toggle');
            const infoBanner = document.getElementById('info-banner');
            btnInfo.addEventListener('click', () => {
                infoBanner.classList.toggle('hidden');
            });

            // 2. Cambio Dinámico de Modalidad
            const radiosModality = document.querySelectorAll('input[name="modality"]');
            const secPresencial = document.getElementById('section-presencial');
            const secVirtual = document.getElementById('section-virtual');

            function updateModalityView() {
                const selected = document.querySelector('input[name="modality"]:checked').value;
                if (selected === 'Presencial') {
                    secPresencial.classList.remove('hidden');
                    secVirtual.classList.add('hidden');
                } else if (selected === 'Virtual') {
                    secPresencial.classList.add('hidden');
                    secVirtual.classList.remove('hidden');
                    secVirtual.classList.add('grid');
                } else if (selected === 'Híbrida') {
                    secPresencial.classList.remove('hidden');
                    secVirtual.classList.remove('hidden');
                    secVirtual.classList.add('grid');
                }
            }

            radiosModality.forEach(r => r.addEventListener('change', updateModalityView));
            updateModalityView();

            // 3. Validación de Horarios y Envío
            const form = document.getElementById('event-form');
            const actionInput = document.getElementById('form-action');

            document.getElementById('btn-draft').addEventListener('click', function() {
                actionInput.value = 'draft';
                // Remover 'required' temporalmente para permitir borrador parcial
                document.getElementById('title').removeAttribute('required');
                document.getElementById('start_date').removeAttribute('required');
                form.submit();
            });

            document.getElementById('btn-submit').addEventListener('click', function() {
                actionInput.value = 'submit';
                const startTime = document.getElementById('start_time').value;
                const endTime = document.getElementById('end_time').value;

                if (startTime && endTime && endTime <= startTime) {
                    alert('No se ha podido registrar el evento. La hora de término debe ser posterior a la de inicio.');
                    return;
                }

                form.submit();
            });
        });
    </script>
</x-layouts.app>