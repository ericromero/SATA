<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen" x-data="buscadorDocentes()">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 flex justify-between items-start">
                <div>
                    <a href="{{ route('titulacion.menu_f1') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 mb-4">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        Volver al Menú F1
                    </a>
                    <h2 class="text-2xl font-extrabold text-gray-900 italic tracking-tight">Sistema Buscador de Director de Proyecto</h2>
                    <h1 class="text-4xl font-extrabold text-[#11052b] italic tracking-tight mt-1">Elige a tu director de proyecto</h1>
                </div>
                <!-- Avatar del Alumno -->
                <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-indigo-200">
                    <img src="https://i.pravatar.cc/150?img=11" alt="Perfil Alumno" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Panel de Controles -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4 flex-1">
                    <div class="w-12 h-12 bg-[#11052b] text-white rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 text-lg">Instrucciones</h3>
                        <p class="text-xs text-gray-500 truncate w-48 md:w-auto">Si no encuentra un Director de Proyecto se...</p>
                    </div>
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <button @click="modalActivo = 'instrucciones'" class="flex-1 md:flex-none bg-[#11052b] text-white px-6 py-2.5 rounded-lg text-sm font-bold italic hover:bg-indigo-900 transition">Abrir instrucciones</button>
                    <!-- Botón Ver Resumen (Se habilita solo si hay un docente seleccionado) -->
                    <button @click="abrirResumen()" :disabled="!docenteSeleccionado" :class="{'bg-[#10b981] hover:bg-[#059669] cursor-pointer': docenteSeleccionado, 'bg-gray-300 text-gray-500 cursor-not-allowed': !docenteSeleccionado}" class="flex-1 md:flex-none text-white px-6 py-2.5 rounded-lg text-sm font-bold italic transition">Ver resumen de docente</button>
                </div>
            </div>

            <!-- Contenedor Principal: Filtros y Resultados -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                
                <!-- Columna Izquierda: Filtros -->
                <div class="lg:col-span-4 bg-white rounded-xl shadow-sm border border-gray-200 p-6 h-fit">
                    <h3 class="font-bold text-gray-900 mb-4 border-b pb-2">Filtros de Búsqueda</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Nombre del Docente</label>
                            <input type="text" x-model="filtroNombre" placeholder="Buscar por nombre..." class="w-full rounded-md border-gray-300 text-gray-900 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Área Académica</label>
                            <select x-model="filtroArea" class="w-full rounded-md border-gray-300 text-gray-900 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Todas las áreas</option>
                                <option value="Clínica">Clínica</option>
                                <option value="Educativa">Educativa</option>
                                <option value="Organizacional">Organizacional</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Especialidad / Tema</label>
                            <input type="text" x-model="filtroEspecialidad" placeholder="Ej. Terapia Cognitiva..." class="w-full rounded-md border-gray-300 text-gray-900 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <button @click="limpiarFiltros" class="w-full mt-2 bg-gray-100 text-gray-600 px-4 py-2 rounded-md text-sm font-semibold hover:bg-gray-200 transition">Limpiar Filtros</button>
                    </div>
                </div>

                <!-- Columna Derecha: Opciones y Resultados -->
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
                        <div class="mb-6">
                            <h2 class="text-xl font-bold text-gray-900">Opciones recomendadas / Resultados</h2>
                            <p class="text-sm text-gray-500">Los docentes mostrados son sugerencias del sistema o resultados de tu búsqueda.</p>
                        </div>

                        <!-- Lista de Docentes -->
                        <div class="border border-gray-200 rounded-lg overflow-hidden divide-y divide-gray-100 mb-6">
                            <template x-for="docente in docentesFiltrados" :key="docente.id">
                                <!-- Cada fila es clickeable para seleccionar al docente -->
                                <div @click="seleccionarDocente(docente)" :class="{'bg-indigo-50 border-l-4 border-indigo-600': docenteSeleccionado && docenteSeleccionado.id === docente.id, 'hover:bg-gray-50 border-l-4 border-transparent': !docenteSeleccionado || docenteSeleccionado.id !== docente.id}" class="p-4 flex items-center justify-between cursor-pointer transition-colors">
                                    <div class="flex items-center gap-4">
                                        <img :src="docente.avatar" class="w-10 h-10 rounded-full object-cover">
                                        <div>
                                            <h4 class="font-bold text-gray-900 text-sm" x-text="docente.nombre"></h4>
                                            <p class="text-xs text-indigo-600" x-text="docente.correo"></p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <!-- Badge de Estado Activo/Pendiente -->
                                        <span x-show="docente.activo" class="bg-[#11052b] text-white text-[10px] font-bold px-2.5 py-1 rounded-full">Activo</span>
                                        <span x-show="!docente.activo" class="bg-gray-200 text-gray-600 text-[10px] font-bold px-2.5 py-1 rounded-full">Pendiente</span>
                                        
                                        <!-- Indicador visual de selección -->
                                        <div class="w-5 h-5 rounded-full border-2 flex items-center justify-center" :class="{'border-indigo-600 bg-indigo-600': docenteSeleccionado && docenteSeleccionado.id === docente.id, 'border-gray-300': !docenteSeleccionado || docenteSeleccionado.id !== docente.id}">
                                            <svg x-show="docenteSeleccionado && docenteSeleccionado.id === docente.id" class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </template>
                            
                            <div x-show="docentesFiltrados.length === 0" class="p-8 text-center text-gray-500 text-sm italic">
                                No se encontraron docentes con esos criterios.
                            </div>
                        </div>

                        <!-- Link del Proyecto -->
                        <div class="mb-6">
                            <label class="block text-xs font-semibold text-gray-500 mb-1 italic">Puedes agregar el link de tu proyecto (Opcional)</label>
                            <div class="flex gap-2">
                                <input type="url" placeholder="https://docs.google.com/..." class="flex-1 rounded-md border-gray-300 text-gray-900 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-gray-50">
                                <button class="bg-indigo-100 text-indigo-700 p-2 rounded-md hover:bg-indigo-200 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                                </button>
                            </div>
                        </div>

                        <!-- Botones Finales -->
                        <div class="flex justify-between items-center">
                            <button class="bg-[#d33a36] text-white px-6 py-2.5 rounded-lg text-sm font-bold hover:bg-red-700 transition shadow-sm">Cancelar</button>
                            <button @click="prepararEnvio()" :disabled="!docenteSeleccionado" :class="{'bg-[#11052b] hover:bg-indigo-950 cursor-pointer': docenteSeleccionado, 'bg-gray-300 text-gray-500 cursor-not-allowed': !docenteSeleccionado}" class="text-white px-8 py-2.5 rounded-lg text-sm font-bold italic transition shadow-sm">
                                Mandar invitacion
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= MODALES ================= -->
        <!-- Incluimos los modales en un archivo parcial para no saturar esta vista principal -->
        @include('titulacion.partials.modales_buscador')

    </div>

    <!-- Script de Alpine.js para la lógica de búsqueda y modales -->
    <script>
        function buscadorDocentes() {
            return {
                modalActivo: null,
                filtroNombre: '',
                filtroArea: '',
                filtroEspecialidad: '',
                docenteSeleccionado: null,
                
                // Base de datos simulada de docentes
                docentesBD: [
                    { id: 1, nombre: 'Manola Hernandez Hernandez', correo: 'manola@comunidad.unam.mx', area: 'Clínica', especialidad: 'Terapia Cognitiva', activo: true, avatar: 'https://i.pravatar.cc/150?img=5', descripcion: 'Soy un profesor con una trayectoria de 10 años en el campo clínico, graduado en la Facultad de Psicología. Experiencia en ansiedad y depresión, dispuesto a apoyar alumnos como su director de proyecto.' },
                    { id: 2, nombre: 'Jorge Luis Nequis', correo: 'jorge.nequis@comunidad.unam.mx', area: 'Educativa', especialidad: 'Desarrollo Infantil', activo: true, avatar: 'https://i.pravatar.cc/150?img=12', descripcion: 'Docente titular especializado en desarrollo cognitivo infantil y metodologías de aprendizaje.' },
                    { id: 3, nombre: 'Armando Adair', correo: 'armando.adair@comunidad.unam.mx', area: 'Organizacional', especialidad: 'Recursos Humanos', activo: true, avatar: 'https://i.pravatar.cc/150?img=13', descripcion: 'Consultor organizacional e investigador en dinámicas de liderazgo en empresas transnacionales.' },
                    { id: 4, nombre: 'Pablo Picapiedra', correo: 'pablo.p@comunidad.unam.mx', area: 'Clínica', especialidad: 'Psicoanálisis', activo: false, avatar: 'https://i.pravatar.cc/150?img=14', descripcion: 'Investigador asociado en estudios de teoría psicoanalítica.' }
                ],
                
                get docentesFiltrados() {
                    return this.docentesBD.filter(d => {
                        const matchNombre = d.nombre.toLowerCase().includes(this.filtroNombre.toLowerCase());
                        const matchArea = this.filtroArea === '' || d.area === this.filtroArea;
                        const matchEspecialidad = d.especialidad.toLowerCase().includes(this.filtroEspecialidad.toLowerCase());
                        return matchNombre && matchArea && matchEspecialidad;
                    });
                },
                
                limpiarFiltros() {
                    this.filtroNombre = '';
                    this.filtroArea = '';
                    this.filtroEspecialidad = '';
                },

                seleccionarDocente(docente) {
                    // Si haces clic en el mismo, lo deseleccionas
                    if (this.docenteSeleccionado && this.docenteSeleccionado.id === docente.id) {
                        this.docenteSeleccionado = null;
                    } else {
                        this.docenteSeleccionado = docente;
                    }
                },

                abrirResumen() {
                    if (this.docenteSeleccionado) {
                        this.modalActivo = 'resumen';
                    }
                },

                prepararEnvio() {
                    if (this.docenteSeleccionado) {
                        this.modalActivo = 'enviando';
                    }
                },
                
                confirmarEnvio() {
                    this.modalActivo = null;
                    this.docenteSeleccionado = null;
                    // Aquí iría la lógica real de envío al backend
                }
            }
        }
    </script>
</x-layouts.app>