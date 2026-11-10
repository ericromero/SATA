<x-app-layout>
    <div class="max-w-6xl py-2">
        <h1 class="text-2xl font-bold text-gray-900 mb-8">Módulo de Buzón y Avisos - SATA</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Tarjeta 1: Crear Mensaje -->
            <a href="{{ route('buzon.crear-mensaje') }}" class="block p-8 bg-white border border-gray-200 rounded-xl text-center hover:border-purple-600 hover:shadow-md transition group">
                <div class="flex justify-center mb-4">
                    <svg class="w-8 h-8 text-purple-600 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <h2 class="text-base font-bold text-gray-900 mb-2">Crear Mensaje</h2>
                <p class="text-xs text-gray-500 leading-relaxed mb-4">Redacta y envía un nuevo mensaje directo y privado a un alumno.</p>
                <span class="inline-block px-4 py-2 bg-purple-600 text-white text-xs font-semibold rounded-lg group-hover:bg-purple-700 transition">ENTRAR</span>
            </a>

            <!-- Tarjeta 2: Crear Aviso -->
            <a href="{{ route('buzon.crear-aviso') }}" class="block p-8 bg-white border border-gray-200 rounded-xl text-center hover:border-purple-600 hover:shadow-md transition group">
                <div class="flex justify-center mb-4">
                    <svg class="w-8 h-8 text-purple-600 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h2 class="text-base font-bold text-gray-900 mb-2">Crear Aviso</h2>
                <p class="text-xs text-gray-500 leading-relaxed mb-4">Publica un anuncio general visible para todo un grupo.</p>
                <span class="inline-block px-4 py-2 bg-purple-600 text-white text-xs font-semibold rounded-lg group-hover:bg-purple-700 transition">ENTRAR</span>
            </a>

            <!-- Tarjeta 3: Grupos y Alumnos -->
            <a href="{{ route('buzon.grupos') }}" class="block p-8 bg-white border border-gray-200 rounded-xl text-center hover:border-purple-600 hover:shadow-md transition group">
                <div class="flex justify-center mb-4">
                    <svg class="w-8 h-8 text-purple-600 group-hover:scale-110 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h2 class="text-base font-bold text-gray-900 mb-2">Grupos y Alumnos</h2>
                <p class="text-xs text-gray-500 leading-relaxed mb-4">Gestiona tus grupos y accede al directorio de alumnos.</p>
                <span class="inline-block px-4 py-2 bg-purple-600 text-white text-xs font-semibold rounded-lg group-hover:bg-purple-700 transition">ENTRAR</span>
            </a>
        </div>
    </div>
</x-app-layout>