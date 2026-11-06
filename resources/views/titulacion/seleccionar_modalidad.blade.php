<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="{{ route('titulacion.menu_f1') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Volver al Menú F1
                </a>
                <h2 class="text-2xl font-extrabold text-gray-900">Selecciona una opción...</h2>
                <p class="text-gray-500 mt-1">Elige la modalidad por la cual deseas titularte.</p>
            </div>

            <!-- Lista de Modalidades -->
            <div class="flex flex-col gap-4 mb-8">
                
                <label class="relative block bg-white border border-gray-200 rounded-xl p-6 cursor-pointer hover:border-indigo-600 hover:shadow-md transition group">
                    <input type="radio" name="modalidad" class="absolute right-6 top-1/2 -translate-y-1/2 w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                    <div class="pr-12">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-700 transition">Tesis</h3>
                    </div>
                </label>

                <label class="relative block bg-white border border-gray-200 rounded-xl p-6 cursor-pointer hover:border-indigo-600 hover:shadow-md transition group">
                    <input type="radio" name="modalidad" class="absolute right-6 top-1/2 -translate-y-1/2 w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                    <div class="pr-12">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-700 transition">Tesina</h3>
                    </div>
                </label>

                <label class="relative block bg-white border border-gray-200 rounded-xl p-6 cursor-pointer hover:border-indigo-600 hover:shadow-md transition group">
                    <input type="radio" name="modalidad" class="absolute right-6 top-1/2 -translate-y-1/2 w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                    <div class="pr-12">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-700 transition">Informe profesional de servicio social</h3>
                    </div>
                </label>

                <label class="relative block bg-white border border-gray-200 rounded-xl p-6 cursor-pointer hover:border-indigo-600 hover:shadow-md transition group">
                    <input type="radio" name="modalidad" class="absolute right-6 top-1/2 -translate-y-1/2 w-5 h-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                    <div class="pr-12">
                        <h3 class="text-lg font-bold text-gray-900 group-hover:text-indigo-700 transition">Informe de prácticas</h3>
                    </div>
                </label>

            </div>

            <!-- Botón de Continuar -->
            <div class="flex justify-center">
                <!-- Por ahora, navegará a la vista de Registro -->
                <a href="{{ route('titulacion.registrar_f1') }}" class="bg-[#a3b139] text-white px-10 py-3 rounded-lg font-bold text-lg hover:bg-[#8f9b31] transition shadow-sm">
                    Registrar Modalidad
                </a>
            </div>

        </div>
    </div>
</x-layouts.app>