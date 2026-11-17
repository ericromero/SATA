<x-app-layout>
    <div class="flex w-full overflow-hidden bg-white" style="height: calc(100vh - 65px);">
        <!-- MENÚ LATERAL PRINCIPAL (MORADO) -->
        <aside class="w-64 bg-[#2a1054] text-white flex flex-col flex-shrink-0 h-full shadow-2xl z-20">
            <div class="p-6 flex items-center gap-4 border-b border-[#3b1c70]">
                <div class="w-10 h-10 bg-white rounded flex items-center justify-center text-[#2a1054] font-bold text-xl">Ψ</div>
                <h1 class="text-sm font-bold leading-tight">Facultad de Psicología</h1>
            </div>
            <nav class="flex-1 py-4 space-y-1 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-sm font-medium hover:bg-[#3b1c70] transition gap-3"><svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg> Inicio</a>
                <a href="{{ route('buzon.index') }}" class="flex items-center px-6 py-3 text-sm font-medium bg-[#3b1c70] border-l-4 border-red-500 gap-3"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg> Buzón</a>
            </nav>
        </aside>

        <!-- MENÚ SECUNDARIO (GRIS) -->
        <aside class="w-80 bg-[#eef0f3] border-r border-gray-200 flex flex-col flex-shrink-0 h-full z-10">
            <div class="p-6 flex items-center border-b-2 border-gray-300 bg-white shadow-sm">
                <h2 class="text-xl font-bold text-gray-800">Buzón</h2>
            </div>
            <div class="bg-white border-b border-gray-200">
                <a href="{{ route('buzon.crear-mensaje') }}" class="flex items-center gap-3 px-6 py-4 text-gray-600 font-medium hover:bg-gray-50 border-b border-gray-100">Chats</a>
                <a href="{{ route('buzon.grupos') }}" class="flex items-center gap-3 px-6 py-4 text-gray-600 font-medium hover:bg-gray-50 border-b border-gray-100">Mis Grupos</a>
                <a href="{{ route('buzon.crear-aviso') }}" class="flex items-center gap-3 px-6 py-4 text-gray-600 font-medium hover:bg-gray-50">Avisos</a>
            </div>
            <div class="flex-1 bg-[#eef0f3]"></div>
        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="flex-1 bg-gray-50 flex flex-col h-full overflow-y-auto p-10 items-center justify-center relative">
            <div class="text-center z-10">
                <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-white mb-6 shadow-sm border border-gray-200">
                    <svg class="w-12 h-12 text-[#5b4cff]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Módulo de Buzón y Avisos</h1>
                <p class="text-gray-500 max-w-md mx-auto mb-8 text-sm leading-relaxed">
                    Selecciona una opción del menú lateral gris para gestionar tus chats directos con alumnos, ver el directorio de tus grupos asignados o publicar avisos generales.
                </p>
            </div>
        </main>
    </div>
</x-app-layout>