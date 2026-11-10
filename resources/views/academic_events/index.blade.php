<x-layouts.app>
    <div class="p-6">
        <!-- Encabezado de la sección -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-white">Eventos Académicos</h1>
                <p class="text-sm text-zinc-400">Gestión y consulta de eventos registrados en la plataforma</p>
            </div>
            <a href="{{ route('academic-events.create') }}" 
               class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm rounded-lg transition shadow-sm">
                + Crear Nuevo Evento
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 text-sm text-emerald-400 bg-emerald-950/50 border border-emerald-800 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        <!-- Grid de Tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @forelse($events as$event)
                <div class="bg-zinc-900 border border-zinc-800 rounded-xl p-5 flex flex-col justify-between shadow-sm hover:border-zinc-700 transition">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <span class="px-2.5 py-1 text-xs font-medium rounded-full 
                                {{ $event->modality === 'Presencial' ? 'bg-blue-950 text-blue-400 border border-blue-800' : ($event->modality === 'Virtual' ? 'bg-emerald-950 text-emerald-400 border border-emerald-800' : 'bg-purple-950 text-purple-400 border border-purple-800') }}">
                                {{ $event->modality }}
                            </span>
                            <span class="text-xs font-mono text-zinc-500">ID: #{{ $event->id }}</span>
                        </div>
                        
                        <h3 class="text-lg font-bold text-white mb-2 leading-snug">{{ $event->title }}</h3>
                        <p class="text-sm text-zinc-400 mb-4 line-clamp-3">
                            {{ $event->description ?? 'Sin descripción registrada.' }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-zinc-800 text-xs text-zinc-400 flex flex-col gap-1">
                        <div><strong class="text-zinc-300">Inicio:</strong> {{ \Carbon\Carbon::parse($event->start_date)->format('d/m/Y H:i') }}</div>
                        @if($event->end_date)
                            <div><strong class="text-zinc-300">Fin:</strong> {{ \Carbon\Carbon::parse($event->end_date)->format('d/m/Y H:i') }}</div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-zinc-900/60 border border-dashed border-zinc-800 rounded-xl p-12 text-center">
                    <p class="text-zinc-400 text-base mb-2">No hay eventos registrados actualmente.</p>
                    <a href="{{ route('academic-events.create') }}" class="text-sm text-indigo-400 hover:text-indigo-300 underline">
                        Haga clic aquí para registrar el primer evento
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</x-layouts.app>