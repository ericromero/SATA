<x-layouts.app>
    <!-- Alpine.js x-data inicializa todas nuestras variables y bases de datos simuladas -->
    <div class="py-12 bg-gray-50 min-h-screen" x-data="{
        titulo: '',
        integrantesMaximos: 1,
        
        /* Bases de datos simuladas */
        alumnosBD: [
            { nombre: 'BONILLA VAZQUEZ ALEJANDRA', cuenta: '307233530', telefono: '5573013815', correo: 'psico_ale@outlook.com' },
            { nombre: 'HERNANDEZ GARCIA LIZETH KARINA', cuenta: '308180963', telefono: '5514267732', correo: 'psico.liz.h@gmail.com' },
            { nombre: 'NUÑEZ BADILLO ARMANDO ADAIR', cuenta: '320191963', telefono: '5512345678', correo: 'armando@comunidad.unam.mx' }
        ],
        docentesBD: [
            { id: 1, nombre: 'DRA. CÁRDENAS LÓPEZ MARÍA GEORGINA', adscripcion: 'PSICOLOGÍA Y SALUD, FAC. DE PSICOLOGÍA, UNAM', correo: 'georgina@unam.mx' },
            { id: 2, nombre: 'DRA. ROJAS FERNÁNDEZ GILDA TERESA', adscripcion: 'PSICOLOGÍA EDUCATIVA', correo: 'gilda@unam.mx' },
            { id: 3, nombre: 'DR. JUAN VELÁZQUEZ', adscripcion: 'NEUROCIENCIAS', correo: 'juan.v@unam.mx' }
        ],

        /* Variables de búsqueda */
        busquedaAlumno: '',
        busquedaDirector: '',
        busquedaRevisor: '',
        
        /* Selecciones activas */
        integrantes: [],
        directorSeleccionado: null,
        revisorSeleccionado: null,
        
        archivoNombre: '',
        vistaPreviaVisible: false,
        
        /* Filtros computados en tiempo real */
        get alumnosSugeridos() {
            if (this.busquedaAlumno.trim() === '') return [];
            return this.alumnosBD.filter(a => 
                a.nombre.toLowerCase().includes(this.busquedaAlumno.toLowerCase()) || 
                a.cuenta.includes(this.busquedaAlumno)
            );
        },
        get directoresSugeridos() {
            if (this.busquedaDirector.trim() === '') return [];
            return this.docentesBD.filter(d => d.nombre.toLowerCase().includes(this.busquedaDirector.toLowerCase()));
        },
        get revisoresSugeridos() {
            if (this.busquedaRevisor.trim() === '') return [];
            return this.docentesBD.filter(d => d.nombre.toLowerCase().includes(this.busquedaRevisor.toLowerCase()));
        },

        /* Métodos de acción */
        agregarAlumno(alumno) {
            if (this.integrantes.length >= this.integrantesMaximos) {
                alert('Has alcanzado el límite máximo de integrantes (' + this.integrantesMaximos + ').');
                return;
            }
            // Evitar duplicados
            if (this.integrantes.find(i => i.cuenta === alumno.cuenta)) {
                alert('Este alumno ya fue agregado.');
                return;
            }
            this.integrantes.push(alumno);
            this.busquedaAlumno = '';
        },
        removerIntegrante(index) {
            this.integrantes.splice(index, 1);
        },
        limpiarFormulario() {
            this.titulo = '';
            this.integrantes = [];
            this.busquedaAlumno = '';
            this.busquedaDirector = '';
            this.busquedaRevisor = '';
            this.directorSeleccionado = null;
            this.revisorSeleccionado = null;
            this.archivoNombre = '';
            this.$refs.archivoPdf.value = '';
        }
    }">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8">
                <a href="{{ route('titulacion.seleccionar_modalidad') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-semibold flex items-center gap-1 mb-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    Cambiar Modalidad
                </a>
                <h2 class="text-2xl font-extrabold text-gray-900">Registro de Solicitud F1</h2>
                <p class="text-gray-500 mt-1">Modalidad seleccionada: <span class="font-bold text-indigo-700">Tesis (Ejemplo)</span></p>
            </div>

            <!-- FORMULARIO -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <form class="divide-y divide-gray-200" @submit.prevent>
                    
                    <!-- SECCIÓN: Título del Trabajo -->
                    <div class="p-8">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Título del Trabajo</h3>
                        <textarea x-model="titulo" rows="3" class="block w-full rounded-md border-gray-300 bg-white text-gray-900 placeholder-gray-400 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Escribe el título oficial de tu proyecto..."></textarea>
                        <div class="mt-2 flex justify-between items-center text-xs text-gray-500">
                            <span x-text="titulo.length + ' / 350 caracteres'"></span>
                            <span>Máximo 350 Caracteres.</span>
                        </div>
                    </div>

                    <!-- SECCIÓN: Participantes (Buscador Automático) -->
                    <div class="p-8 bg-gray-50">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-bold text-gray-900">Datos de los Integrantes</h3>
                            <select x-model.number="integrantesMaximos" class="rounded-md border-gray-300 bg-white text-gray-900 px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="1">1 Integrante</option>
                                <option value="2">2 Integrantes</option>
                                <option value="3">3 Integrantes</option>
                            </select>
                        </div>
                        
                        <div class="relative w-full mb-6">
                            <label class="block text-xs font-semibold text-gray-700 mb-1">Buscar y agregar alumno</label>
                            <div class="relative">
                                <input type="text" x-model="busquedaAlumno" placeholder="Escribe el nombre o número de cuenta del alumno..." class="block w-full rounded-md border-gray-300 bg-white text-gray-900 placeholder-gray-400 px-10 py-2.5 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                </div>
                            </div>
                            
                            <!-- Dropdown de resultados Alumnos -->
                            <div x-show="alumnosSugeridos.length > 0" class="absolute z-20 mt-1 w-full bg-white shadow-lg max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto sm:text-sm" style="display: none;">
                                <template x-for="alumno in alumnosSugeridos">
                                    <div @click="agregarAlumno(alumno)" class="cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-indigo-50 transition">
                                        <div class="flex items-center">
                                            <span class="font-medium block truncate text-gray-900" x-text="alumno.nombre"></span>
                                            <span class="ml-2 text-gray-500 text-xs" x-text="'#' + alumno.cuenta"></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Tabla de Integrantes Seleccionados -->
                        <div class="overflow-x-auto border border-gray-200 rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 bg-white">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Nombre</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider"># Cuenta</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Teléfono</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Correo</th>
                                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <template x-for="(integrante, index) in integrantes" :key="index">
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900" x-text="integrante.nombre"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600" x-text="integrante.cuenta"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600" x-text="integrante.telefono"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600" x-text="integrante.correo"></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold">
                                                <button type="button" @click="removerIntegrante(index)" class="text-red-600 hover:text-red-800">Remover</button>
                                            </td>
                                        </tr>
                                    </template>
                                    <tr x-show="integrantes.length === 0">
                                        <td colspan="5" class="px-6 py-8 text-center text-sm text-gray-400 italic">No hay integrantes agregados. Usa el buscador de arriba para añadir uno.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- SECCIÓN: Director y Revisor (Buscador Automático) -->
                    <div class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            
                            <!-- Buscador Director -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-md font-bold text-indigo-900 mb-4 border-b border-gray-200 pb-2">Designación del Director(a)</h3>
                                
                                <!-- Si no hay director seleccionado, muestra el buscador -->
                                <div x-show="!directorSeleccionado" class="relative">
                                    <label class="block text-xs font-semibold text-gray-700 mb-1">Buscar Docente:</label>
                                    <div class="relative">
                                        <input type="text" x-model="busquedaDirector" placeholder="Nombre del docente..." class="block w-full rounded-md border-gray-300 bg-white text-gray-900 placeholder-gray-400 px-8 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                        </div>
                                    </div>
                                    
                                    <!-- Dropdown Director -->
                                    <div x-show="directoresSugeridos.length > 0" class="absolute z-20 mt-1 w-full bg-white shadow-lg max-h-40 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto sm:text-sm" style="display: none;">
                                        <template x-for="docente in directoresSugeridos">
                                            <div @click="directorSeleccionado = docente; busquedaDirector = ''" class="cursor-pointer select-none relative py-2 pl-3 pr-3 hover:bg-indigo-50 transition">
                                                <span class="font-bold block truncate text-gray-900 text-xs" x-text="docente.nombre"></span>
                                                <span class="block truncate text-gray-500 text-[10px]" x-text="docente.adscripcion"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Tarjeta de Director Seleccionado -->
                                <div x-show="directorSeleccionado" style="display: none;" class="bg-white border border-indigo-200 rounded-md p-3 relative shadow-sm">
                                    <button @click="directorSeleccionado = null" type="button" class="absolute top-2 right-2 text-gray-400 hover:text-red-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                    <p class="text-xs font-bold text-gray-500 mb-1">Director asignado:</p>
                                    <p class="text-sm font-bold text-gray-900 leading-tight" x-text="directorSeleccionado ? directorSeleccionado.nombre : ''"></p>
                                    <p class="text-xs text-gray-600 mt-1 truncate" x-text="directorSeleccionado ? directorSeleccionado.adscripcion : ''"></p>
                                </div>
                            </div>

                            <!-- Buscador Revisor -->
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                                <h3 class="text-md font-bold text-indigo-900 mb-4 border-b border-gray-200 pb-2">Designación del Revisor(a)</h3>
                                
                                <div x-show="!revisorSeleccionado" class="relative">
                                    <label class="block text-xs font-semibold text-gray-700 mb-1">Buscar Docente:</label>
                                    <div class="relative">
                                        <input type="text" x-model="busquedaRevisor" placeholder="Nombre del docente..." class="block w-full rounded-md border-gray-300 bg-white text-gray-900 placeholder-gray-400 px-8 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                        </div>
                                    </div>
                                    
                                    <!-- Dropdown Revisor -->
                                    <div x-show="revisoresSugeridos.length > 0" class="absolute z-20 mt-1 w-full bg-white shadow-lg max-h-40 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto sm:text-sm" style="display: none;">
                                        <template x-for="docente in revisoresSugeridos">
                                            <div @click="revisorSeleccionado = docente; busquedaRevisor = ''" class="cursor-pointer select-none relative py-2 pl-3 pr-3 hover:bg-indigo-50 transition">
                                                <span class="font-bold block truncate text-gray-900 text-xs" x-text="docente.nombre"></span>
                                                <span class="block truncate text-gray-500 text-[10px]" x-text="docente.adscripcion"></span>
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- Tarjeta de Revisor Seleccionado -->
                                <div x-show="revisorSeleccionado" style="display: none;" class="bg-white border border-indigo-200 rounded-md p-3 relative shadow-sm">
                                    <button @click="revisorSeleccionado = null" type="button" class="absolute top-2 right-2 text-gray-400 hover:text-red-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                    <p class="text-xs font-bold text-gray-500 mb-1">Revisor asignado:</p>
                                    <p class="text-sm font-bold text-gray-900 leading-tight" x-text="revisorSeleccionado ? revisorSeleccionado.nombre : ''"></p>
                                    <p class="text-xs text-gray-600 mt-1 truncate" x-text="revisorSeleccionado ? revisorSeleccionado.adscripcion : ''"></p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- SECCIÓN: Subida de Anteproyecto Interactiva -->
                    <div class="p-8 bg-gray-50">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Subir Anteproyecto / Protocolo</h3>
                        
                        <input type="file" x-ref="archivoPdf" accept=".pdf" class="hidden" @change="archivoNombre = $event.target.files[0] ? $event.target.files[0].name : ''">
                        
                        <div @click="$refs.archivoPdf.click()" class="w-full bg-white border-2 border-dashed border-gray-300 rounded-lg py-12 flex flex-col items-center justify-center cursor-pointer hover:border-indigo-500 hover:bg-indigo-50 transition-colors shadow-sm">
                            <svg x-show="!archivoNombre" class="w-10 h-10 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <span x-show="!archivoNombre" class="text-gray-600 text-sm font-medium">Haz clic o arrastra tu archivo PDF aquí (Max 5MB)</span>
                            
                            <svg x-show="archivoNombre" style="display: none;" class="w-12 h-12 text-green-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span x-show="archivoNombre" style="display: none;" class="text-indigo-700 text-sm font-bold" x-text="'Documento adjunto: ' + archivoNombre"></span>
                            <span x-show="archivoNombre" style="display: none;" class="text-gray-500 text-xs mt-1 underline">Haz clic para cambiar de archivo</span>
                        </div>
                    </div>

                    <!-- Botones de Acción -->
                    <div class="p-6 bg-white flex items-center justify-end gap-4">
                        <button type="button" @click="limpiarFormulario" class="bg-white border border-gray-300 text-gray-700 px-6 py-2 rounded-md text-sm font-semibold hover:bg-gray-50 transition">
                            Limpiar
                        </button>
                        <!-- Botón que activa el modal de Vista Previa -->
                        <button type="button" @click="vistaPreviaVisible = true" class="bg-indigo-600 text-white px-8 py-2 rounded-md text-sm font-semibold hover:bg-indigo-700 transition shadow-sm">
                            Guardar y Continuar
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <!-- ================= MODAL VISTA PREVIA F1 ================= -->
        <div x-show="vistaPreviaVisible" style="display: none;" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div x-show="vistaPreviaVisible" x-transition.opacity class="fixed inset-0 bg-gray-900 bg-opacity-80" @click="vistaPreviaVisible = false"></div>
                
                <div x-show="vistaPreviaVisible" x-transition class="relative bg-white shadow-2xl max-w-4xl w-full p-8 md:p-12 text-gray-900 font-sans border-t-8 border-[#11052b]">
                    
                    <!-- Encabezado Institucional -->
                    <div class="flex justify-between items-center mb-6">
                        <div class="w-32 flex flex-col items-center">
                            <div class="w-20 h-24 border-2 border-gray-300 flex items-center justify-center mb-1">
                                <span class="text-xs text-gray-400 font-bold">ESCUDO UNAM</span>
                            </div>
                            <p class="text-[8px] text-center uppercase font-semibold leading-tight">UNIVERSIDAD NACIONAL AUTONOMA DE MEXICO</p>
                        </div>
                        <div class="text-center flex-1">
                            <h2 class="text-xs font-semibold mb-2">FORMA 1</h2>
                            <h1 class="text-base font-bold uppercase mt-1 leading-tight">FACULTAD DE PSICOLOGÍA</h1>
                            <h3 class="text-sm font-semibold uppercase leading-tight">DIVISIÓN DE ESTUDIOS PROFESIONALES</h3>
                            <h4 class="text-xs font-bold uppercase mt-3">FORMA DE REGISTRO DE PROYECTO</h4>
                        </div>
                        <div class="w-32 flex flex-col items-center">
                            <div class="w-20 h-20 border-2 border-gray-300 flex items-center justify-center mb-1">
                                <span class="text-xs text-gray-400 font-bold">LOGO PSI</span>
                            </div>
                            <p class="text-[10px] font-bold">Facultad<br>de Psicología</p>
                        </div>
                    </div>

                    <!-- Fecha de Recepción -->
                    <div class="flex justify-end mb-2">
                        <p class="text-xs font-bold">FECHA DE RECEPCIÓN: <span class="font-normal border-b border-black inline-block w-24 text-center">2026</span></p>
                    </div>

                    <!-- Opción y Título -->
                    <div class="border border-black p-2 mb-2 min-h-[4rem]">
                        <p class="text-xs"><span class="font-bold">OPCIÓN ELEGIDA:</span> TESIS</p>
                        <p class="text-xs mt-1"><span class="font-bold">TÍTULO:</span> <span class="uppercase font-normal" x-text="titulo || ''"></span></p>
                    </div>

                    <!-- Datos del Pasante -->
                    <div class="border border-black mb-2">
                        <table class="w-full text-xs text-center border-collapse">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-left font-normal p-1 border-b border-black">DATOS DE LA O EL PASANTE</th>
                                </tr>
                                <tr class="border-b border-black">
                                    <th class="p-2 font-normal w-[40%]">NOMBRE</th>
                                    <th class="p-2 font-normal">NO. DE CUENTA</th>
                                    <th class="p-2 font-normal">TELÉFONO</th>
                                    <th class="p-2 font-normal">CORREO ELECTRÓNICO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="integrante in integrantes">
                                    <tr>
                                        <td class="p-2 text-left uppercase border-b border-gray-400" x-text="integrante.nombre"></td>
                                        <td class="p-2 border-b border-gray-400" x-text="integrante.cuenta"></td>
                                        <td class="p-2 border-b border-gray-400" x-text="integrante.telefono"></td>
                                        <td class="p-2 border-b border-gray-400" x-text="integrante.correo"></td>
                                    </tr>
                                </template>
                                <!-- Filas vacías de relleno si hay menos de 3 integrantes -->
                                <template x-for="i in Math.max(0, 3 - integrantes.length)">
                                    <tr>
                                        <td class="p-3 border-b border-gray-400"></td>
                                        <td class="p-3 border-b border-gray-400"></td>
                                        <td class="p-3 border-b border-gray-400"></td>
                                        <td class="p-3 border-b border-gray-400"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <!-- Director del Proyecto -->
                    <div class="border border-black p-2 mb-2 h-32 relative">
                        <p class="text-xs mb-3">DESIGNACIÓN DEL DIRECTOR O DIRECTORA DEL PROYECTO</p>
                        <p class="text-xs mb-1"><span class="font-bold">NOMBRE:</span> <span class="uppercase font-normal" x-text="directorSeleccionado ? directorSeleccionado.nombre : ''"></span></p>
                        <p class="text-xs mb-1"><span class="font-bold">ADSCRIPCIÓN:</span> <span class="uppercase font-normal" x-text="directorSeleccionado ? directorSeleccionado.adscripcion : ''"></span></p>
                        
                        <div class="absolute bottom-2 left-6 right-6 flex justify-between items-end">
                            <div class="w-64">
                                <div class="border-b border-black h-4 mb-1"></div>
                                <p class="text-[10px] text-center">FIRMA DE APROBACIÓN DEL PROYECTO</p>
                            </div>
                            <div class="w-32">
                                <div class="border-b border-black h-4 mb-1"></div>
                                <p class="text-[10px] text-center">FECHA:</p>
                            </div>
                        </div>
                    </div>

                    <!-- Revisor del Proyecto -->
                    <div class="border border-black p-2 mb-8 h-32 relative">
                        <p class="text-xs mb-3">DESIGNACIÓN DEL REVISOR O REVISORA DEL PROYECTO</p>
                        <p class="text-xs mb-1"><span class="font-bold">NOMBRE:</span> <span class="uppercase font-normal" x-text="revisorSeleccionado ? revisorSeleccionado.nombre : ''"></span></p>
                        <p class="text-xs mb-1"><span class="font-bold">ADSCRIPCIÓN:</span> <span class="uppercase font-normal" x-text="revisorSeleccionado ? revisorSeleccionado.adscripcion : ''"></span></p>
                        
                        <div class="absolute bottom-2 left-6 right-6 flex justify-between items-end">
                            <div class="w-64">
                                <div class="border-b border-black h-4 mb-1"></div>
                                <p class="text-[10px] text-center">FIRMA DE APROBACIÓN DEL PROYECTO</p>
                            </div>
                            <div class="w-32">
                                <div class="border-b border-black h-4 mb-1"></div>
                                <p class="text-[10px] text-center">FECHA:</p>
                            </div>
                        </div>
                    </div>

                    <!-- Firmas Institucionales (Pie) -->
                    <div class="flex justify-between mt-12 mb-16">
                        <div class="w-1/2 text-center px-4">
                            <p class="text-[10px] uppercase">COORDINADORA DEL AREA DE PSICOLOGIA CLINICA Y DE LA SALUD</p>
                        </div>
                        <div class="w-1/2 text-center px-4">
                            <p class="text-[10px] uppercase">JEFE DE LA DIVISIÓN DE ESTUDIOS PROFESIONALES</p>
                        </div>
                    </div>

                    <!-- Pie de página (Dirección y Código de Barras) -->
                    <div class="text-center mt-auto border-t border-gray-300 pt-4">
                        <p class="text-[9px] text-gray-700 mb-2">Av. Universidad 3004, Col. Copilco - Universidad, C.P. 04510, Del. Coyoacán, México, Cd. Mx.</p>
                        <div class="flex justify-center h-8 opacity-60">
                            <svg class="w-48 h-full" preserveAspectRatio="none" viewBox="0 0 100 20" fill="currentColor"><path d="M0 0h2v20H0zM4 0h1v20H4zM7 0h3v20H7zM12 0h1v20h-1zM15 0h4v20h-4zM21 0h2v20h-2zM25 0h1v20h-1zM28 0h3v20h-3zM33 0h1v20h-1zM36 0h4v20h-4zM42 0h2v20h-2zM46 0h1v20h-1zM49 0h3v20h-3zM54 0h1v20h-1zM57 0h4v20h-4zM63 0h2v20h-2zM67 0h1v20h-1zM70 0h3v20h-3zM75 0h1v20h-1zM78 0h4v20h-4zM84 0h2v20h-2zM88 0h1v20h-1zM91 0h3v20h-3zM96 0h1v20h-1zM99 0h1v20h-1z"/></svg>
                        </div>
                    </div>
                    
                    <!-- Botones del Modal -->
                    <div class="flex justify-end gap-4 mt-8 print:hidden border-t pt-4">
                        <button @click="vistaPreviaVisible = false" class="bg-gray-200 text-gray-800 px-6 py-2 rounded-md text-sm font-bold hover:bg-gray-300 transition">Cerrar Vista Previa</button>
                        <button @click="alert('¡Solicitud enviada al Comité!'); vistaPreviaVisible = false; limpiarFormulario();" class="bg-[#11052b] text-white px-8 py-2 rounded-md text-sm font-bold hover:bg-indigo-900 transition">Confirmar y Enviar Solicitud</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layouts.app>