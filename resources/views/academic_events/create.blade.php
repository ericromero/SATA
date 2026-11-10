<x-layouts.app>
    <div class="p-6 max-w-3xl mx-auto">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-white">Registrar Nuevo Evento Académico</h1>
            <p class="text-sm text-zinc-400">Complete el formulario para dar de alta un nuevo evento</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 text-sm text-red-400 bg-red-950/50 border border-red-800 rounded-xl">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('academic-events.store') }}" method="POST" class="bg-zinc-900 border border-zinc-800 rounded-xl p-6 space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-zinc-300 mb-2">Título del Evento</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                       class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white placeholder-zinc-500 focus:outline-none focus:border-indigo-500 text-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-zinc-300 mb-2">Descripción</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white placeholder-zinc-500 focus:outline-none focus:border-indigo-500 text-sm">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="modality" class="block text-sm font-medium text-zinc-300 mb-2">Modalidad</label>
                    <select id="modality" name="modality" required
                            class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-indigo-500 text-sm">
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                        <option value="Híbrida">Híbrida</option>
                    </select>
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium text-zinc-300 mb-2">Fecha y Hora de Inicio</label>
                    <input type="datetime-local" id="start_date" name="start_date" value="{{ old('start_date') }}" required
                           class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-indigo-500 text-sm">
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-zinc-300 mb-2">Fecha y Hora de Fin</label>
                    <input type="datetime-local" id="end_date" name="end_date" value="{{ old('end_date') }}"
                           class="w-full bg-zinc-950 border border-zinc-800 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-indigo-500 text-sm">
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-zinc-800">
                <a href="{{ route('academic-events.index') }}" 
                   class="px-4 py-2 text-sm font-medium text-zinc-400 hover:text-white transition">
                    Cancelar
                </a>
                <button type="submit" 
                        class="px-4 py-2 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-medium rounded-lg transition shadow-sm">
                    Guardar Evento
                </button>
            </div>
        </form>
    </div>
</x-layouts.app>