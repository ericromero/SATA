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
                <a href="{{ route('buzon.crear-mensaje') }}" class="flex items-center gap-3 px-6 py-4 border-l-4 border-teal-500 text-[#2a1054] font-bold bg-gray-50">Chats</a>
                <a href="{{ route('buzon.grupos') }}" class="flex items-center gap-3 px-6 py-4 text-gray-600 font-medium hover:bg-gray-50 border-b border-gray-100">Mis Grupos</a>
                <a href="{{ route('buzon.crear-aviso') }}" class="flex items-center gap-3 px-6 py-4 text-gray-600 font-medium hover:bg-gray-50">Avisos</a>
            </div>
            <div class="flex-1 overflow-y-auto bg-[#eef0f3]">
                <div class="px-6 py-3 text-xs font-bold text-gray-400 uppercase tracking-wider">Chats Activos</div>
                @forelse($alumnos ?? [] as $alumno)
                    @php $esActivo = ($alumnoSeleccionado == data_get($alumno, 'id')); @endphp
                    <a href="?user_id={{ data_get($alumno, 'id') }}" class="flex items-center justify-between px-6 py-4 border-b border-gray-200 transition {{ $esActivo ? 'bg-white shadow-sm border-l-4 border-[#5b4cff]' : 'hover:bg-gray-200' }}">
                        <span class="font-bold text-sm truncate {{ $esActivo ? 'text-[#5b4cff]' : 'text-gray-700' }}">{{ data_get($alumno, 'name', data_get($alumno, 'nombre')) }}</span>
                        <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                @empty
                    <div class="px-6 py-4 text-sm text-gray-500 italic">No hay alumnos.</div>
                @endforelse
            </div>
        </aside>

        <!-- ÁREA DE CHAT (DERECHA) -->
        <main class="flex-1 bg-white flex flex-col h-full relative">
            @if($alumnoSeleccionado)
                <div class="p-6 border-b border-gray-200 bg-white shadow-sm flex items-center justify-between z-10">
                    <h3 class="font-bold text-lg text-gray-800">Mensaje para: {{ $alumnoActual->name ?? $alumnoActual->nombre ?? 'Alumno' }}</h3>
                </div>
                <!-- Historial -->
                <div class="flex-1 overflow-y-auto p-8 space-y-4 bg-gray-50">
                    @forelse($mensajesChat ?? [] as $msg)
                        <div class="flex justify-start">
                            <div class="bg-white border border-gray-200 text-gray-700 px-6 py-4 rounded-lg shadow-sm w-3/4">
                                <span class="text-xs font-bold text-[#5b4cff] mb-2 block border-b pb-2">Asunto: {{ data_get($msg, 'subject', data_get($msg, 'title', 'Sin asunto')) }}</span>
                                <span class="text-sm block whitespace-pre-line">{{ data_get($msg, 'body', data_get($msg, 'content', 'Mensaje vacío')) }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="flex h-full items-center justify-center text-gray-400 text-sm">No hay historial. Escribe el primer mensaje.</div>
                    @endforelse
                </div>
                <!-- Formulario -->
                <div class="bg-white p-6 w-full border-t border-gray-200">
                    <form action="{{ route('buzon.guardar-mensaje') }}" method="POST" class="flex flex-col gap-3">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $alumnoSeleccionado }}">
                        <input type="text" name="asunto" placeholder="Escribe el asunto del mensaje..." required class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#5b4cff] outline-none">
                        <textarea name="contenido" placeholder="Escribe el cuerpo del mensaje aquí..." required rows="3" class="w-full bg-gray-50 border border-gray-300 rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-[#5b4cff] outline-none resize-none"></textarea>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-[#5b4cff] hover:bg-indigo-700 text-white font-bold rounded-lg px-6 py-2 transition shadow">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="flex-1 flex flex-col items-center justify-center bg-gray-50">
                    <svg class="w-24 h-24 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <h3 class="text-xl font-bold text-gray-500">Tus Mensajes</h3>
                    <p class="text-gray-400 mt-2 text-sm">Selecciona un alumno del menú a la izquierda para escribirle.</p>
                </div>
            @endif
        </main>
    </div>
</x-app-layout>