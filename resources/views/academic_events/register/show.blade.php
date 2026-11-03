<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resumen del Evento Académico') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Banner de Estado del Evento -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-3">
                        <span class="px-3 py-1 bg-amber-100 text-amber-800 text-xs font-bold uppercase rounded-full">
                            Pendiente de Autorización
                        </span>
                        <span class="text-xs text-gray-500">ID Evento: #{{ $event->id ?? 1 }}</span>
                    </div>
                    <h1 class="text-2xl font-bold text-gray-800 mt-2">
                        {{ $event->event_name ?? 'Curso Psicología aplicada 1' }}
                    </h1>
                </div>

                <div class="flex items-center gap-2">
                    <a href="{{ route('events.edit', $event->id ?? 1) }}" class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-md text-sm font-semibold transition flex items-center gap-2">
                        ✏️ Editar Evento
                    </a>
                    <a href="{{ route('events.management') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md text-sm font-semibold transition">
                        Volver a Gestión
                    </a>
                </div>
            </div>

            <!-- Ficha Técnica / Detalle -->
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 space-y-6">
                
                <!-- Datos Generales -->
                <div>
                    <h3 class="text-md font-bold uppercase text-gray-500 tracking-wider mb-3 border-b pb-2 flex items-center gap-2">
                        📌 Datos Generales
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="font-bold text-gray-700 block">Área Organizadora:</span>
                            <p class="text-gray-600">{{ $event->academic_area ?? 'Psicología Educativa' }}</p>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 block">Modalidad:</span>
                            <p class="text-gray-600 capitalize">{{ $event->modality ?? 'Presencial' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Ubicación y Logística -->
                <div>
                    <h3 class="text-md font-bold uppercase text-gray-500 tracking-wider mb-3 border-b pb-2 flex items-center gap-2">
                        📍 Ubicación y Logística
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        @if(($event->modality ?? 'presencial') === 'presencial' || ($event->modality ?? 'presencial') === 'hibrida')
                            <div>
                                <span class="font-bold text-gray-700 block">Sede / Edificio:</span>
                                <p class="text-gray-600">{{ $event->location ?? 'Edificio A - Facultad de Psicología' }}</p>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 block">Aula / Auditorio:</span>
                                <p class="text-gray-600">{{ $event->room ?? 'Auditorio Luis Lara Tapia' }}</p>
                            </div>
                        @endif

                        @if(($event->modality ?? 'presencial') === 'virtual' || ($event->modality ?? 'presencial') === 'hibrida')
                            <div>
                                <span class="font-bold text-gray-700 block">Plataforma Virtual:</span>
                                <p class="text-gray-600">{{ $event->platform ?? 'Zoom' }}</p>
                            </div>
                            <div>
                                <span class="font-bold text-gray-700 block">Enlace de Transmisión:</span>
                                <a href="{{ $event->meeting_link ?? '#' }}" target="_blank" class="text-indigo-600 hover:underline">
                                    {{ $event->meeting_link ?? 'https://zoom.us/j/123456789' }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Programación -->
                <div>
                    <h3 class="text-md font-bold uppercase text-gray-500 tracking-wider mb-3 border-b pb-2 flex items-center gap-2">
                        📅 Programación del Evento
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm bg-gray-50 p-4 rounded-md border">
                        <div>
                            <span class="font-bold text-gray-700 block">Fecha del Evento:</span>
                            <p class="text-gray-600">{{ $event->event_date ?? '02/12/2026' }}</p>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 block">Horario de Inicio:</span>
                            <p class="text-gray-600">{{ $event->start_time ?? '01:00 p. m.' }}</p>
                        </div>
                        <div>
                            <span class="font-bold text-gray-700 block">Horario de Término:</span>
                            <p class="text-gray-600">{{ $event->end_time ?? '03:00 p. m.' }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>