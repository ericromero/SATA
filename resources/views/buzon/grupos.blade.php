@php $grupos = $grupos ?? collect(); @endphp
<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Directorio por Grupos</h1>
            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-purple-600 transition">&larr; Volver al Dashboard</a>
        </div>
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 sm:p-8">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Selecciona un Grupo</h2>
            
            @if(count($grupos) > 0)
                <select onchange="if(this.value) window.location.href='/buzon/grupos/' + this.value + '/alumnos'" class="w-full border-gray-300 rounded-lg shadow-sm cursor-pointer">
                    <option value="">-- Despliega y selecciona un grupo --</option>
                    @foreach($grupos as $grupo)
                        <option value="{{ data_get($grupo, 'id') }}">{{ data_get($grupo, 'display_name') }} ({{ data_get($grupo, 'alumnos_count', 0) }} alumnos)</option>
                    @endforeach
                </select>
            @else
                <!-- Alerta con ícono de tamaño forzado -->
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded mt-4 flex items-center">
                    <svg width="24" height="24" class="h-6 w-6 text-yellow-500 mr-3 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <p class="text-sm text-yellow-700 font-medium m-0">No hay grupos registrados en la base de datos en este momento.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>