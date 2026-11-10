@php
    $alumnos = $alumnos ?? collect();
    $alumnoSeleccionado = $alumnoSeleccionado ?? '';
@endphp
<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Crear Nuevo Mensaje</h1>
            <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-500 hover:text-purple-600 transition">
                &larr; Volver al Dashboard
            </a>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 sm:p-8">
                <form action="{{ route('buzon.guardar-mensaje') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">Seleccionar Alumno Destinatario</label>
                        @if(count($alumnos) > 0)
                            <select id="user_id" name="user_id" required class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-lg shadow-sm">
                                <option value="">-- Elige un alumno --</option>
                                @foreach($alumnos as $alumno)
                                    <option value="{{ data_get($alumno, 'id') }}" {{ $alumnoSeleccionado == data_get($alumno, 'id') ? 'selected' : '' }}>
                                        {{ data_get($alumno, 'name') }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <div class="p-3 bg-red-50 text-red-600 rounded border border-red-200 text-sm">
                                No hay alumnos registrados en el sistema.
                            </div>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label for="asunto" class="block text-sm font-medium text-gray-700 mb-2">Asunto del Mensaje</label>
                        <input type="text" id="asunto" name="asunto" value="{{ old('asunto') }}" required placeholder="Ej. Calificaciones del primer parcial" class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-lg shadow-sm">
                    </div>

                    <div class="mb-8">
                        <label for="contenido" class="block text-sm font-medium text-gray-700 mb-2">Contenido del Mensaje</label>
                        <textarea id="contenido" name="contenido" rows="6" required placeholder="Escribe aquí tu mensaje privado..." class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-lg shadow-sm">{{ old('contenido') }}</textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-3 bg-purple-600 text-white text-sm font-bold rounded-lg hover:bg-purple-700 transition shadow" {{ count($alumnos) == 0 ? 'disabled' : '' }}>
                            Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>