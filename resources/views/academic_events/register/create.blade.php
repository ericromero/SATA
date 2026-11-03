<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario de Registro') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen" x-data="{ 
        showHelp: false, 
        modalidad: 'presencial',
        horarioInicio: '',
        horarioTermino: '',
        showErrorModal: false,
        showSuccessModal: false,

        validarEnvio() {
            if (this.horarioInicio && this.horarioTermino && this.horarioTermino <= this.horarioInicio) {
                this.showErrorModal = true;
            } else {
                this.showSuccessModal = true;
            }
        }
    }">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Encabezado con Botón de Ayuda (?) -->
            <div class="flex items-center gap-3">
                <button @click="showHelp = !showHelp" type="button" class="w-8 h-8 rounded-full bg-purple-700 text-white font-bold text-base flex items-center justify-center hover:bg-purple-800 transition shadow-sm">
                    ?
                </button>
                <h1 class="text-2xl font-bold text-gray-900">Formulario de Registro</h1>
            </div>

            <!-- Banner de Ayuda Desplegable -->
            <div x-show="showHelp" x-transition class="p-4 bg-purple-50 border-l-4 border-purple-700 text-purple-900 rounded shadow-sm">
                <h3 class="font-bold text-sm">Tiempo de respuesta a la solicitud</h3>
                <p class="text-xs mt-1">Tras completar el registro del evento académico, el flujo del sistema requiere un paso de validación adicional. La solicitud se enviará a la bandeja correspondiente, desde donde el Gestor de Área será el responsable de evaluar los datos ingresados y emitir la autorización oficial para la conformidad del registro.</p>
            </div>

            <form @submit.prevent="validarEnvio()" class="space-y-6">
                @csrf

                <!-- BLOQUE 1: Información General -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span>ℹ️</span> Información general
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Nombre del evento *</label>
                            <input type="text" placeholder="Ejemplo: Psicología aplicada 1" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tipo de evento *</label>
                            <select class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                                <option value="">Selecciona una opción</option>
                                <option value="ponencia">Ponencia</option>
                                <option value="conferencia">Conferencia</option>
                                <option value="taller">Taller</option>
                                <option value="curso">Curso</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Área académica *</label>
                            <select class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                                <option value="">Selecciona una opción</option>
                                <option value="1">Sistemas Cognitivos y del Comportamiento</option>
                                <option value="2">Psicología de la Educación</option>
                                <option value="3">Psicología Social</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Población objetivo *</label>
                            <select class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                                <option value="">Selecciona una opción</option>
                                <option value="publico">Público en general</option>
                                <option value="licenciatura">Estudiantes de licenciatura</option>
                                <option value="posgrado">Estudiantes de posgrado</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Cupo máximo *</label>
                            <input type="number" placeholder="Ejemplo: 40" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Descripción *</label>
                        <textarea rows="3" placeholder="Descripción breve del evento..." class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required></textarea>
                    </div>
                </div>

                <!-- BLOQUE 2: Modalidad Dinámica -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span>📍</span> Modalidad
                    </h2>

                    <div class="flex gap-6 mb-4">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="modalidad_radio" value="presencial" x-model="modalidad" class="text-purple-600 focus:ring-purple-500">
                            <span class="ml-2 text-sm text-gray-700 font-medium">Presencial</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="modalidad_radio" value="virtual" x-model="modalidad" class="text-purple-600 focus:ring-purple-500">
                            <span class="ml-2 text-sm text-gray-700 font-medium">Virtual</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="modalidad_radio" value="hibrido" x-model="modalidad" class="text-purple-600 focus:ring-purple-500">
                            <span class="ml-2 text-sm text-gray-700 font-medium">Híbrido</span>
                        </label>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <template x-if="modalidad === 'presencial' || modalidad === 'hibrido'">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Edificio *</label>
                                <input type="text" placeholder="Ejemplo: Edificio A" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm">
                            </div>
                        </template>
                        <template x-if="modalidad === 'presencial' || modalidad === 'hibrido'">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Auditorio / Salón *</label>
                                <input type="text" placeholder="Ejemplo: Auditorio Dr. Luis Lara" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm">
                            </div>
                        </template>

                        <template x-if="modalidad === 'virtual' || modalidad === 'hibrido'">
                            <div class="col-span-2">
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Plataforma digital *</label>
                                <select class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm">
                                    <option value="">Seleccione una opción</option>
                                    <option value="zoom">Zoom</option>
                                    <option value="meet">Google Meet</option>
                                    <option value="teams">Microsoft Teams</option>
                                </select>
                            </div>
                        </template>
                    </div>
                </div>

                <!-- BLOQUE 3: Programación y Calendarios (Presencial/Virtual vs Híbrido) -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span>📅</span> Programación
                    </h2>

                    <!-- Layout Normal (1 columna para Presencial o Virtual) -->
                    <template x-if="modalidad !== 'hibrido'">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Fecha del evento *</label>
                                <input type="date" class="w-full md:w-1/2 border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Horario de inicio *</label>
                                    <input type="time" x-model="horarioInicio" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Horario de término *</label>
                                    <input type="time" x-model="horarioTermino" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                                </div>
                            </div>
                        </div>
                    </template>

                    <!-- Layout Híbrido (2 columnas: Presenciales vs Virtuales) -->
                    <template x-if="modalidad === 'hibrido'">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Columna Días Presenciales -->
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <h3 class="font-bold text-sm text-purple-900 mb-3 uppercase">Programación (Días Presenciales)</h3>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Fecha presencial *</label>
                                        <input type="date" class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Horario de inicio *</label>
                                        <input type="time" x-model="horarioInicio" class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Horario de término *</label>
                                        <input type="time" x-model="horarioTermino" class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                    </div>
                                </div>
                            </div>

                            <!-- Columna Días Virtuales -->
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <h3 class="font-bold text-sm text-purple-900 mb-3 uppercase">Programación (Días Virtuales)</h3>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Fecha virtual *</label>
                                        <input type="date" class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Horario de inicio *</label>
                                        <input type="time" class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Horario de término *</label>
                                        <input type="time" class="w-full border-gray-300 rounded-md shadow-sm text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- BLOQUE 4: Responsable del Evento -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <span>👤</span> Responsable del evento
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Docente responsable *</label>
                            <input type="text" value="{{ Auth::user()?->name }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm bg-gray-50 text-gray-700 font-medium" readonly>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Correo electrónico *</label>
                            <input type="email" value="{{ Auth::user()?->email }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm bg-gray-50 text-gray-700 font-medium" readonly>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Teléfono de contacto *</label>
                            <input type="text" placeholder="Ejemplo: 5512345678" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500 text-sm" required>
                        </div>
                    </div>
                </div>

                <!-- Botones Inferiores -->
                <div class="flex justify-center items-center gap-4 pt-4 pb-12">
                    <a href="{{ route('events.management') }}" class="px-6 py-2.5 bg-red-600 text-white font-bold text-sm rounded-md shadow hover:bg-red-700 transition">
                        Guardar Borrador
                    </a>
                    <button type="submit" class="px-6 py-2.5 bg-indigo-900 text-white font-bold text-sm rounded-md shadow hover:bg-indigo-950 transition">
                        Terminar registro
                    </button>
                </div>

            </form>

            <!-- MODAL DE ERROR DE HORARIO (Como en el Video Parte 2) -->
            <div x-show="showErrorModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
                <div class="bg-white rounded-lg p-6 max-w-md w-full text-center space-y-4 shadow-xl">
                    <div class="text-red-500 text-4xl">⚠️</div>
                    <h3 class="text-lg font-bold text-gray-900">No se ha podido registrar el evento</h3>
                    <p class="text-sm text-gray-600">La hora de término debe ser posterior a la de inicio.</p>
                    <button @click="showErrorModal = false" class="px-5 py-2 bg-purple-700 text-white font-semibold text-sm rounded hover:bg-purple-800 transition">
                        OK
                    </button>
                </div>
            </div>

            <!-- MODAL DE EXITO (Como en el Video Parte 2) -->
            <div x-show="showSuccessModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
                <div class="bg-white rounded-lg p-6 max-w-md w-full text-center space-y-4 shadow-xl">
                    <div class="text-green-500 text-4xl">✅</div>
                    <h3 class="text-lg font-bold text-gray-900">Registro exitoso</h3>
                    <p class="text-sm text-gray-600">El evento académico fue registrado correctamente.</p>
                    <div class="flex justify-center gap-3 pt-2">
                        <button @click="location.reload()" class="px-4 py-2 bg-purple-700 text-white text-xs font-semibold rounded hover:bg-purple-800 transition">
                            Registrar otro evento
                        </button>
                        <a href="{{ route('events.management') }}" class="px-4 py-2 bg-gray-600 text-white text-xs font-semibold rounded hover:bg-gray-700 transition">
                            Terminar y salir
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>