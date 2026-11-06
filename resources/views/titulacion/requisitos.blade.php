<x-layouts.app>
    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-10 flex justify-center border-b border-gray-100">
                    <svg class="w-32 h-32 text-indigo-500" viewBox="0 0 100 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 20C10 14.4772 14.4772 10 20 10H35L42 18H80C85.5228 18 90 22.4772 90 28V60C90 65.5228 85.5228 70 80 70H20C14.4772 70 10 65.5228 10 60V20Z" fill="currentColor" opacity="0.8"/>
                        <path d="M15 30H85L80 65H20L15 30Z" fill="currentColor" opacity="0.6"/>
                    </svg>
                </div>

                <div class="p-8 flex flex-col gap-4 bg-gray-50">
                    <a href="{{ route('titulacion.editar_documentacion') }}" class="w-full bg-indigo-600 text-white py-3 rounded-md text-sm font-medium hover:bg-indigo-700 transition text-center shadow-sm">
                        Editar Documentación
                    </a>
                    <button class="w-full bg-white border border-gray-300 text-gray-700 py-3 rounded-md text-sm font-medium hover:bg-gray-50 transition shadow-sm">
                        Consultar Requisitos
                    </button>
                    <a href="{{ route('dashboard') }}" class="w-full bg-white border border-red-200 text-red-600 py-3 rounded-md text-sm font-medium hover:bg-red-50 transition text-center shadow-sm">
                        Cancelar
                    </a>
                </div>
                
            </div>
        </div>
    </div>
  </x-layouts.app>