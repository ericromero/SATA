@php 
    $grupos = $grupos ?? collect(); 
@endphp
<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Publicar Nuevo Aviso</h1>
            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-purple-600 transition">
                &larr; Volver al Dashboard
            </a>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 sm:p-8">
                <form action="{{ route('buzon.guardar-aviso') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título del Aviso</label>
                        <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required placeholder="Ej. Cambio de fecha para entrega de proyecto" class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Selecciona los Grupos Destino</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                            @forelse($grupos as $grupo)
                                <label class="inline-flex items-center p-2 hover:bg-gray-100 rounded transition cursor-pointer">
                                    <input type="checkbox" name="grupos_destino[]" value="{{ data_get($grupo, 'id') }}" class="rounded border-gray-300 text-purple-600 shadow-sm focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50">
                                    <span class="ml-3 text-sm text-gray-700 font-medium">
                                        {{ data_get($grupo, 'display_name') }} <span class="text-xs text-gray-500 ml-1">({{ data_get($grupo, 'alumnos_count', 0) }} alumnos)</span>
                                    </span>
                                </label>
                            @empty
                                <div class="col-span-2 text-sm text-red-500 font-medium py-2">
                                    No hay grupos creados. No puedes enviar un aviso sin grupos.
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-2">Contenido del Aviso</label>
                        <textarea id="mensaje" name="mensaje" rows="6" required placeholder="Escribe aquí los detalles del aviso general..." class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-lg shadow-sm">{{ old('mensaje') }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-purple-600 text-white text-sm font-bold rounded-lg hover:bg-purple-700 transition shadow" {{ count($grupos) == 0 ? 'disabled' : '' }}>
                            Publicar Aviso
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>