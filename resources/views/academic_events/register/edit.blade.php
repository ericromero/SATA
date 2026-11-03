<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registro de Eventos Académicos') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Banner Encabezado de Edición -->
            <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                    3. Registro en Borrador (Editar)
                </h2>
                <p class="text-gray-600 text-sm">
                    Aquí se cargarán los datos guardados del borrador.
                </p>
            </div>

            <!-- Formulario de Edición -->
            <form action="{{ route('events.update', $event->id ?? 1) }}" method="POST" x-data="{ modality: '{{ $event->modality ?? 'presencial' }}' }">
                @csrf
                @method('PUT')

                <!-- SECCIÓN 1: DATOS GENERALES DEL EVENTO -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
                        📌 Datos Generales del Evento
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nombre del Evento -->
                        <div class="md:col-span-2">
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Nombre del Evento *</label>
                            <input type="text" name="event_name" value="{{ $event->event_name ?? 'Curso Psicología aplicada 1' }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>

                        <!-- Área Organizadora -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Área Organizadora *</label>
                            <select name="academic_area" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                <option value="Psicología Educativa" {{ ($event->academic_area ?? 'Psicología Educativa') == 'Psicología Educativa' ? 'selected' : '' }}>Psicología Educativa</option>
                                <option value="Psicología Clínica" {{ ($event->academic_area ?? '') == 'Psicología Clínica' ? 'selected' : '' }}>Psicología Clínica</option>
                                <option value="Neurociencias" {{ ($event->academic_area ?? '') == 'Neurociencias' ? 'selected' : '' }}>Neurociencias</option>
                                <option value="Coordinación Técnica" {{ ($event->academic_area ?? '') == 'Coordinación Técnica' ? 'selected' : '' }}>Coordinación Técnica</option>
                            </select>
                        </div>

                        <!-- Modalidad -->
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Modalidad *</label>
                            <select name="modality" x-model="modality" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                                <option value="presencial">Presencial</option>
                                <option value="virtual">Virtual</option>
                                <option value="hibrida">Híbrida</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- SECCIÓN 2: UBICACIÓN Y LOGÍSTICA -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
                        📍 Ubicación y Logística
                    </h3>

                    <!-- Campos Presencial / Híbrida -->
                    <div x-show="modality === 'presencial' || modality === 'hibrida'" class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Sede / Edificio *</label>
                            <input type="text" name="location" value="{{ $event->location ?? 'Edificio A - Facultad de Psicología' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Aula / Auditorio *</label>
                            <input type="text" name="room" value="{{ $event->room ?? 'Auditorio Luis Lara Tapia' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                    </div>

                    <!-- Campos Virtual / Híbrida -->
                    <div x-show="modality === 'virtual' || modality === 'hibrida'" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Plataforma Virtual *</label>
                            <input type="text" name="platform" value="{{ $event->platform ?? 'Zoom' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Enlace de Transmisión / Acceso</label>
                            <input type="url" name="meeting_link" value="{{ $event->meeting_link ?? 'https://zoom.us/j/123456789' }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                    </div>
                </div>

                <!-- SECCIÓN 3: PROGRAMACIÓN -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2 flex items-center gap-2">
                        📅 Programación
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Fecha del Evento *</label>
                            <input type="date" name="event_date" value="{{ $event->event_date ?? '2026-12-02' }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Horario de Inicio *</label>
                            <input type="time" name="start_time" value="{{ $event->start_time ?? '13:00' }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-700 mb-1">Horario de Término *</label>
                            <input type="time" name="end_time" value="{{ $event->end_time ?? '15:00' }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        </div>
                    </div>
                </div>

                <!-- BOTONES DE ACCIÓN -->
                <div class="flex items-center justify-end gap-3 bg-white p-4 rounded-lg shadow-sm border border-gray-200">
                    <a href="{{ route('events.management') }}" class="px-4 py-2 border border-gray-300 text-gray-700 hover:bg-gray-50 rounded-md text-sm font-semibold transition">
                        Cancelar
                    </a>
                    <button type="submit" name="action" value="draft" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md text-sm font-semibold shadow-sm transition">
                        Actualizar Borrador
                    </button>
                    <button type="submit" name="action" value="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm font-semibold shadow-sm transition">
                        Terminar Registro
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>