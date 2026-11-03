<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de eventos académicos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Título principal -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Gestión de eventos académicos</h1>
            </div>

            <!-- Grid de Tarjetas (3 columnas) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- 1. Tarjeta: Crear Nuevo Evento -->
                <a href="{{ route('events.create') }}" class="flex flex-col items-center justify-center p-8 bg-white rounded-lg border-2 border-dashed border-gray-300 hover:border-purple-600 hover:shadow-md transition cursor-pointer min-h-[220px] group">
                    <div class="text-6xl text-gray-300 group-hover:text-purple-600 transition mb-2">+</div>
                    <span class="font-bold text-gray-700 group-hover:text-purple-600 transition">Nuevo evento</span>
                </a>

                <!-- 2. Tarjeta: Borrador 1 -->
                <div class="flex flex-col justify-between p-6 bg-white rounded-lg shadow-sm border border-gray-200 min-h-[220px]">
                    <div class="text-center my-auto">
                        <h3 class="font-bold text-gray-800 text-lg">Curso Psicología aplicada 1</h3>
                    </div>
                    <div class="space-y-2 mt-4">
                        <a href="{{ route('events.edit', 1) }}" class="block w-full text-center px-4 py-2.5 bg-indigo-600 text-white font-semibold text-sm rounded-md hover:bg-indigo-700 transition">
                            Actualizar borrador
                        </a>
                        <button type="button" class="block w-full text-center px-4 py-2.5 bg-purple-900 text-white font-semibold text-sm rounded-md hover:bg-purple-950 transition">
                            Eliminar borrador
                        </button>
                    </div>
                </div>

                <!-- 3. Tarjeta: Borrador 2 -->
                <div class="flex flex-col justify-between p-6 bg-white rounded-lg shadow-sm border border-gray-200 min-h-[220px]">
                    <div class="text-center my-auto">
                        <h3 class="font-bold text-gray-800 text-lg">Curso Psicología aplicada 2</h3>
                    </div>
                    <div class="space-y-2 mt-4">
                        <a href="{{ route('events.edit', 2) }}" class="block w-full text-center px-4 py-2.5 bg-indigo-600 text-white font-semibold text-sm rounded-md hover:bg-indigo-700 transition">
                            Actualizar borrador
                        </a>
                        <button type="button" class="block w-full text-center px-4 py-2.5 bg-purple-900 text-white font-semibold text-sm rounded-md hover:bg-purple-950 transition">
                            Eliminar borrador
                        </button>
                    </div>
                </div>

                <!-- 4. Tarjeta: Borrador 3 -->
                <div class="flex flex-col justify-between p-6 bg-white rounded-lg shadow-sm border border-gray-200 min-h-[220px]">
                    <div class="text-center my-auto">
                        <h3 class="font-bold text-gray-800 text-lg">Derechos 4000</h3>
                    </div>
                    <div class="space-y-2 mt-4">
                        <a href="{{ route('events.edit', 3) }}" class="block w-full text-center px-4 py-2.5 bg-indigo-600 text-white font-semibold text-sm rounded-md hover:bg-indigo-700 transition">
                            Actualizar borrador
                        </a>
                        <button type="button" class="block w-full text-center px-4 py-2.5 bg-purple-900 text-white font-semibold text-sm rounded-md hover:bg-purple-950 transition">
                            Eliminar borrador
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>