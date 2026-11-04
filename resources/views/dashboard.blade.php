<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Módulo de Buzón y Avisos - SATA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Grid de 3 columnas para el menú -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Tarjeta 1: Crear Mensaje -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-t-4 border-blue-500 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center justify-center w-14 h-14 bg-blue-50 rounded-full mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Crear Mensaje</h3>
                    <p class="text-sm text-gray-500 mb-6 h-10">Redacta y envía un nuevo mensaje directo y privado.</p>
                    <button class="w-full inline-flex justify-center items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                        Entrar
                    </button>
                </div>

                <!-- Tarjeta 2: Crear Aviso -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-t-4 border-amber-500 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center justify-center w-14 h-14 bg-amber-50 rounded-full mb-4">
                        <svg class="w-8 h-8 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Crear Aviso</h3>
                    <p class="text-sm text-gray-500 mb-6 h-10">Publica un anuncio general visible para todo un grupo.</p>
                    <button class="w-full inline-flex justify-center items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-600 transition">
                        Entrar
                    </button>
                </div>

                <!-- Tarjeta 3: Lista de Grupos y Alumnos -->
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6 border-t-4 border-emerald-500 hover:shadow-2xl hover:-translate-y-1 transition duration-300">
                    <div class="flex items-center justify-center w-14 h-14 bg-emerald-50 rounded-full mb-4">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Grupos y Alumnos</h3>
                    <p class="text-sm text-gray-500 mb-6 h-10">Gestiona tus grupos y accede al directorio de alumnos.</p>
                    <button class="w-full inline-flex justify-center items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-700 transition">
                        Entrar
                    </button>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>