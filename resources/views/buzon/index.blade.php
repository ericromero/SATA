<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulo de Buzón') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Contenedor principal: Sidebar Izquierdo + Contenido Derecho -->
            <div class="flex flex-col md:flex-row gap-6">
                
                <!-- MENÚ LATERAL (Sidebar estilo prototipo) -->
                <div class="w-full md:w-1/4 bg-white shadow-sm sm:rounded-lg overflow-hidden h-fit">
                    <div class="p-4 border-b bg-gray-50">
                        <h3 class="text-lg font-bold text-gray-700">Navegación</h3>
                    </div>
                    <nav class="p-3 space-y-1">
                        <!-- Enlace Activo -->
                        <a href="{{ route('buzon.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-md bg-blue-50 text-blue-700 font-semibold transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            Bandeja de Entrada
                        </a>
                        <!-- Enlaces Inactivos -->
                        <a href="{{ route('buzon.message.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Crear Mensaje
                        </a>
                        <a href="{{ route('buzon.ad.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                            Crear Anuncio
                        </a>
                        <a href="{{ route('buzon.alumnos') }}" class="flex items-center gap-3 px-4 py-3 rounded-md text-gray-600 hover:bg-gray-100 hover:text-gray-900 transition-colors font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Directorio Alumnos
                        </a>
                    </nav>
                </div>

                <!-- CONTENIDO PRINCIPAL -->
                <div class="w-full md:w-3/4 flex flex-col gap-6">
                    
                    <!-- Barra superior con Botones de Acción (Estilo FlutterFlow) -->
                    <div class="bg-white shadow-sm sm:rounded-lg p-6 flex flex-wrap items-center justify-between gap-4">
                        <h3 class="text-xl font-bold text-gray-800">Mensajes Recibidos</h3>
                        
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('buzon.message.create') }}" class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold transition-colors shadow-sm text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                Crear Mensaje
                            </a>
                            <button class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md font-semibold transition-colors shadow-sm text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                Seleccionar Grupo
                            </button>
                            <button class="flex items-center gap-2 bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md font-semibold transition-colors shadow-sm text-sm">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Seleccionar Usuarios
                            </button>
                        </div>
                    </div>

                    <!-- Bandeja de Entrada (Lista de Mensajes de Ejemplo) -->
                    <div class="bg-white shadow-sm sm:rounded-lg overflow-hidden">
                        <ul class="divide-y divide-gray-200">
                            <!-- Ejemplo Mensaje 1 -->
                            <li class="p-5 hover:bg-gray-50 transition-colors cursor-pointer">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-lg">
                                            M
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-900">María López</p>
                                            <p class="text-sm text-gray-600">Duda sobre la tarea de desarrollo web</p>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-500 font-medium">
                                        Hace 2 horas
                                    </div>
                                </div>
                            </li>
                            
                            <!-- Ejemplo Mensaje 2 -->
                            <li class="p-5 hover:bg-gray-50 transition-colors cursor-pointer opacity-75">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold text-lg">
                                            G
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-900">Grupo 5B (Computación)</p>
                                            <p class="text-sm text-gray-600">Aviso: Cambio de horario para la entrega</p>
                                        </div>
                                    </div>
                                    <div class="text-xs text-gray-500 font-medium">
                                        Ayer
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>