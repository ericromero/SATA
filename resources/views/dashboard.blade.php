<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-6 p-6">
        <!-- Título Principal -->
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200">
            Programación de Asignaturas
        </h2>

        <!-- Grid Layout para las tarjetas -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            
            <!-- Tarjeta: Registro de Propuestas (Coordinador) -->
            <a href="{{ route('proposals.create') }}" class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-6 hover:bg-gray-50 dark:hover:bg-neutral-700 transition border border-neutral-200 dark:border-neutral-700 flex flex-col items-center text-center">
                <div class="text-indigo-600 dark:text-indigo-400 mb-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Registro de propuestas</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Registra las propuestas iniciales de materias para el siguiente semestre.</p>
            </a>

            <!-- Tarjeta: Aprobación y Revisión (Coordinador) -->
            <a href="{{ route('proposals.review') }}" class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-6 hover:bg-gray-50 dark:hover:bg-neutral-700 transition border border-neutral-200 dark:border-neutral-700 flex flex-col items-center text-center">
                <div class="text-indigo-600 dark:text-indigo-400 mb-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Revisión de Propuestas</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Revisa y aprueba las modificaciones o cancelaciones de los docentes.</p>
            </a>

            <!-- Tarjeta: Mis Propuestas Asignadas (Docente) -->
            <a href="{{ route('proposals.my_proposals') }}" class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-6 hover:bg-gray-50 dark:hover:bg-neutral-700 transition border border-neutral-200 dark:border-neutral-700 flex flex-col items-center text-center">
                <div class="text-indigo-600 dark:text-indigo-400 mb-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Mis Propuestas</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Acepta, modifica o cancela tu carga horaria asignada.</p>
            </a>

            <!-- Tarjeta: Gestión de Periodos -->
            <a href="{{ route('periods.index') }}" class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-6 hover:bg-gray-50 dark:hover:bg-neutral-700 transition border border-neutral-200 dark:border-neutral-700 flex flex-col items-center text-center opacity-75">
                <div class="text-indigo-600 dark:text-indigo-400 mb-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Gestionar periodos</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Apertura y cierre de periodos en curso.</p>
            </a>

            <!-- Tarjeta: Gestión de Plantilla -->
            <a href="{{ route('academics.index') }}" class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-6 hover:bg-gray-50 dark:hover:bg-neutral-700 transition border border-neutral-200 dark:border-neutral-700 flex flex-col items-center text-center opacity-75">
                <div class="text-indigo-600 dark:text-indigo-400 mb-3">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Gestionar plantilla</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Maneja a los docentes activos</p>
            </a>

        </div>
    </div>
</x-layouts.app>