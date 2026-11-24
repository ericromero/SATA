<x-layouts.app>
    <div class="py-12" x-data="{
        fechaInicio: '',
        horaInicio: '',
        fechaCierre: '',
        horaCierre: '',
        aplicacionInicio: '',
        aplicacionFin: '',
        error: '',
        guardado: false,
        validar() {
            this.error = '';
            this.guardado = false;

            if (!this.fechaInicio || !this.horaInicio || !this.fechaCierre || !this.horaCierre || !this.aplicacionInicio || !this.aplicacionFin) {
                this.error = 'Por favor completa todas las fechas y horarios de ambas secciones.';
                return;
            }

            const inicioSistema = new Date(`${this.fechaInicio}T${this.horaInicio}`);
            const cierreSistema = new Date(`${this.fechaCierre}T${this.horaCierre}`);

            if (cierreSistema <= inicioSistema) {
                this.error = 'La fecha y hora de cierre del sistema deben ser posteriores a las de inicio.';
                return;
            }

            if (this.aplicacionFin < this.aplicacionInicio) {
                this.error = 'La fecha de fin de aplicación de exámenes no puede ser anterior a la fecha de inicio.';
                return;
            }

            this.guardado = true;
        },
        habilitarEdicion() {
            this.guardado = false;
            this.error = '';
        }
    }">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-xl p-8 border border-neutral-200 dark:border-neutral-700">
                
                <!-- Encabezado -->
                <div class="mb-8 border-b border-gray-200 dark:border-neutral-700 pb-4 flex justify-between items-center">
                    <div>
                        <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Periodos Extraordinarios</span>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mt-1">Configurar fechas y horarios</h2>
                    </div>
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition">
                        &larr; Volver al menú
                    </a>
                </div>

                <!-- Alerta de Error -->
                <div x-show="error" style="display: none;" class="mb-6 p-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 flex items-center gap-3 text-red-800 dark:text-red-300">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-sm font-medium" x-text="error"></span>
                </div>

                <!-- Alerta de Éxito -->
                <div x-show="guardado" style="display: none;" class="mb-6 p-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 flex items-center gap-3 text-green-800 dark:text-green-300">
                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <span class="text-sm font-medium">El periodo extraordinario y los días de aplicación se han confirmado correctamente.</span>
                </div>

                <!-- Formulario -->
                <form action="#" method="POST" class="space-y-8">
                    @csrf

                    <!-- SECCIÓN 1: HABILITACIÓN DEL SISTEMA -->
                    <div>
                        <div class="mb-4">
                            <h3 class="text-base font-semibold text-gray-900 dark:text-white">1. Habilitación del sistema</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Define cuándo estará abierto el sistema para registrar propuestas de extraordinarios.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                            <!-- Fecha Inicio -->
                            <div>
                                <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Fecha Inicio
                                </label>
                                <input type="date" id="fecha_inicio" name="fecha_inicio" x-model="fechaInicio" :disabled="guardado"
                                       class="block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition">
                            </div>

                            <!-- Hora Inicio -->
                            <div>
                                <label for="hora_inicio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Hora Inicio
                                </label>
                                <input type="time" id="hora_inicio" name="hora_inicio" step="1" x-model="horaInicio" :disabled="guardado"
                                       class="block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition">
                            </div>

                            <!-- Fecha Cierre -->
                            <div>
                                <label for="fecha_cierre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Fecha Cierre
                                </label>
                                <input type="date" id="fecha_cierre" name="fecha_cierre" x-model="fechaCierre" :min="fechaInicio" :disabled="guardado"
                                       class="block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition">
                            </div>

                            <!-- Hora Cierre -->
                            <div>
                                <label for="hora_cierre" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Hora Cierre
                                </label>
                                <input type="time" id="hora_cierre" name="hora_cierre" step="1" x-model="horaCierre" :disabled="guardado"
                                       class="block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition">
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200 dark:border-neutral-700">

                    <!-- SECCIÓN 2: DÍAS DE APLICACIÓN DE EXÁMENES -->
                    <div>
                        <div class="mb-4">
                            <h3 class="text-base font-semibold text-gray-900 dark:text-white">2. Días de aplicación de exámenes extraordinarios</h3>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Indica el periodo de días en los que los docentes podrán aplicar los exámenes.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-6">
                            <!-- Inicio de Aplicación -->
                            <div>
                                <label for="aplicacion_inicio" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Fecha Inicio de Aplicación
                                </label>
                                <input type="date" id="aplicacion_inicio" name="aplicacion_inicio" x-model="aplicacionInicio" :disabled="guardado"
                                       class="block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition">
                            </div>

                            <!-- Fin de Aplicación -->
                            <div>
                                <label for="aplicacion_fin" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Fecha Fin de Aplicación
                                </label>
                                <input type="date" id="aplicacion_fin" name="aplicacion_fin" x-model="aplicacionFin" :min="aplicacionInicio" :disabled="guardado"
                                       class="block w-full rounded-md border-gray-300 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-50 disabled:cursor-not-allowed transition">
                            </div>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="flex justify-end gap-3 pt-6 border-t border-gray-200 dark:border-neutral-700">
                        
                        <!-- Botón Confirmar -->
                        <button x-show="!guardado" @click="validar()" type="button"
                                class="inline-flex items-center px-6 py-2.5 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 shadow-sm transition">
                            Confirmar
                        </button>

                        <!-- Botón Modificar -->
                        <button x-show="guardado" style="display: none;" @click="habilitarEdicion()" type="button"
                                class="inline-flex items-center gap-2 px-6 py-2.5 bg-neutral-200 dark:bg-neutral-700 border border-transparent rounded-md font-semibold text-sm text-gray-800 dark:text-white hover:bg-neutral-300 dark:hover:bg-neutral-600 transition shadow-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Modificar fechas
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</x-layouts.app>