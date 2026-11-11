<x-layouts.app>
    <div class="min-h-screen bg-gray-50 p-6 md:p-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- Encabezado de Navegación -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Gestión de eventos académicos</h1>
                    <p class="text-sm text-gray-500">Cree un nuevo evento o gestione los borradores existentes</p>
                </div>
                <a href="{{ route('academic-events.index') }}" 
                   class="text-sm font-medium text-gray-500 hover:text-gray-800 transition">
                    ← Volver a Eventos Académicos
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Grid de Eventos y Borradores -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- TARJETA 1: NUEVO EVENTO (+) -->
                <a href="{{ route('academic-events.create') }}" 
                   class="group bg-white border border-gray-200 rounded-xl p-8 text-center flex flex-col items-center justify-center min-h-[220px] hover:border-indigo-500 hover:shadow-sm transition duration-150">
                    <div class="text-indigo-600 mb-3 group-hover:scale-110 transition-transform">
                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <span class="text-base font-bold text-gray-900 group-hover:text-indigo-600 transition">Nuevo evento</span>
                </a>

                <!-- BORRADORES EXISTENTES -->
                @forelse ($drafts as $draft)
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                        <div>
                            <h3 class="text-base font-bold text-gray-900 mb-1">{{ $draft->title }}</h3>
                            <p class="text-xs text-gray-500 mb-6">Evento en borrador</p>
                        </div>

                        <div class="space-y-2">
                            <a href="{{ route('academic-events.create', ['draft' => $draft->id]) }}" 
                               class="w-full inline-block text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                Actualizar borrador
                            </a>
                            <form action="{{ route('academic-events.destroy', $draft->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Está seguro de eliminar este borrador?')"
                                        class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                    Eliminar borrador
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <!-- Tarjetas estáticas de muestra si la BD aún no tiene borradores -->
                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                        <div>
                            <h3 class="text-base font-bold text-gray-900 mb-1">Curso Psicología aplicada 2</h3>
                            <p class="text-xs text-gray-500 mb-6">Evento en borrador</p>
                        </div>
                        <div class="space-y-2">
                            <a href="{{ route('academic-events.create') }}" 
                               class="w-full inline-block text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                Actualizar borrador
                            </a>
                            <button type="button" 
                                    class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                Eliminar borrador
                            </button>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm flex flex-col justify-between">
                        <div>
                            <h3 class="text-base font-bold text-gray-900 mb-1">Curso Psicología aplicada 3</h3>
                            <p class="text-xs text-gray-500 mb-6">Evento en borrador</p>
                        </div>
                        <div class="space-y-2">
                            <a href="{{ route('academic-events.create') }}" 
                               class="w-full inline-block text-center py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                Actualizar borrador
                            </a>
                            <button type="button" 
                                    class="w-full py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium text-sm rounded-lg transition shadow-sm">
                                Eliminar borrador
                            </button>
                        </div>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
</x-layouts.app>