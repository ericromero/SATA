<x-layouts.app>
    <div class="py-12 bg-gray-50 min-h-screen" x-data="{ activeModal: null }">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8 px-4 sm:px-0 tracking-tight">
                Menú del Sistema de Titulación
            </h2>

            <!-- Panel de Estatus Minimalista -->
            <div class="bg-white shadow-sm sm:rounded-xl border border-gray-200 mb-12 p-8 flex flex-col md:flex-row items-center justify-between gap-6">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Consultar Estatus</h3>
                    <p class="text-gray-500 mt-1">Revisa tu progreso de titulación (40%)</p>
                </div>
                <button class="w-full md:w-auto bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition shadow-sm">
                    Entrar a Estatus
                </button>
            </div>

            <!-- ================= DIAGRAMA DE FLUJO SECUENCIAL (5 PASOS) ================= -->
            <div class="relative py-4">
                
                <!-- LÍNEAS CONECTORAS (Solo visibles en Desktop) -->
                <!-- Línea horizontal superior (conecta 1, 2, 3) -->
                <div class="hidden md:block absolute top-[120px] left-[16.6%] right-[16.6%] h-1 border-t-[3px] border-indigo-200 z-0"></div>
                <!-- Línea vertical derecha (conecta el 3 hacia abajo con el 4) -->
                <div class="hidden md:block absolute top-[120px] bottom-[120px] right-[16.6%] w-1 border-r-[3px] border-indigo-200 z-0"></div>
                <!-- Línea horizontal inferior (conecta el 4 con el 5 en el centro) -->
                <div class="hidden md:block absolute bottom-[120px] left-[50%] right-[16.6%] h-1 border-b-[3px] border-indigo-200 z-0"></div>

                <!-- FILA 1 (Pasos 1, 2, 3 -> De Izquierda a Derecha) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10 mb-8 md:mb-16">
                    
                    <!-- Tarjeta 1: Requisitos Previos -->
                    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm flex flex-col items-center text-center relative transition hover:shadow-md">
                        <div class="bg-indigo-100 text-indigo-700 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mb-4 border-4 border-white shadow-sm">1</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Requisitos previos</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-1">Cumple con tu servicio social, créditos y acreditación de idioma.</p>
                        <div class="w-full flex flex-col gap-2 mt-auto">
                            <button @click="activeModal = 'etapa1'" class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition">Ver instrucciones</button>
                            <a href="{{ route('titulacion.requisitos') }}" class="w-full bg-indigo-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition">Ir a esa etapa</a>
                        </div>
                    </div>

                    <!-- Tarjeta 2: FUSIÓN Modalidad y F1 -->
                    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm flex flex-col items-center text-center relative transition hover:shadow-md">
                        <div class="bg-indigo-100 text-indigo-700 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mb-4 border-4 border-white shadow-sm">2</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight">Modalidad y Registro de F1</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-1">Selecciona cómo trabajarás tu proyecto y registra tu F1 para su aprobación.</p>
                        <div class="w-full flex flex-col gap-2 mt-auto">
                            <button @click="activeModal = 'etapa2'" class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition">Ver instrucciones</button>
                            <a href="{{ route('titulacion.menu_f1') }}" class="w-full bg-indigo-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition text-center block">Ir a esa etapa</a>
                        </div>
                    </div>

                    <!-- Tarjeta 3: Formato (F2) -->
                    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm flex flex-col items-center text-center relative transition hover:shadow-md">
                        <div class="bg-indigo-100 text-indigo-700 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mb-4 border-4 border-white shadow-sm">3</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Formato (F2)</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-1">Carga tu F2 para validar la continuidad oficial de tu proyecto.</p>
                        <div class="w-full flex flex-col gap-2 mt-auto">
                            <button @click="activeModal = 'etapa3'" class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition">Ver instrucciones</button>
                            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition opacity-50 cursor-not-allowed">Ir a esa etapa</button>
                        </div>
                    </div>
                </div>

                <!-- FILA 2 (Pasos 4 y 5 -> Visualmente invertidos en Desktop para mantener el flujo de la serpiente) -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
                    
                    <!-- Espacio vacío (Columna 1 en Desktop). Solo visible en computadora -->
                    <div class="hidden md:block md:order-1"></div>

                    <!-- Tarjeta 5: Concluido (Columna 2 en Desktop, pero al final en Celular) -->
                    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm flex flex-col items-center text-center relative transition hover:shadow-md order-2 md:order-2">
                        <div class="bg-indigo-100 text-indigo-700 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mb-4 border-4 border-white shadow-sm">5</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Concluido</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-1">Emisión de título y acto protocolario. ¡Felicidades!</p>
                        <div class="w-full flex flex-col gap-2 mt-auto">
                            <button @click="activeModal = 'etapa5'" class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition">Ver instrucciones</button>
                            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition opacity-50 cursor-not-allowed">Ir a esa etapa</button>
                        </div>
                    </div>

                    <!-- Tarjeta 4: Fase 3 (Columna 3 en Desktop, pero antes que Concluido en Celular) -->
                    <div class="bg-white border border-gray-200 p-6 rounded-xl shadow-sm flex flex-col items-center text-center relative transition hover:shadow-md order-1 md:order-3">
                        <div class="bg-indigo-100 text-indigo-700 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl mb-4 border-4 border-white shadow-sm">4</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Fase 3</h3>
                        <p class="text-sm text-gray-500 mb-6 flex-1">Revisión final y correcciones con tus docentes asignados.</p>
                        <div class="w-full flex flex-col gap-2 mt-auto">
                            <button @click="activeModal = 'etapa4'" class="w-full bg-white border border-gray-300 text-gray-700 py-2 rounded-lg text-sm font-semibold hover:bg-gray-50 transition">Ver instrucciones</button>
                            <button class="w-full bg-indigo-600 text-white py-2 rounded-lg text-sm font-semibold hover:bg-indigo-700 transition opacity-50 cursor-not-allowed">Ir a esa etapa</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ================= MODALES DE INSTRUCCIONES ACTUALIZADOS ================= -->
            <x-modal-instrucciones name="etapa1" title="Instrucciones: Requisitos Previos">
                <p class="mb-4">Antes de iniciar el proceso, asegúrate de cumplir con los siguientes requisitos:</p>
                <ul class="space-y-1 mb-4 text-gray-600 list-disc pl-5">
                    <li>Contar con identificación oficial escolar vigente.</li>
                    <li>Se verificará el avance del 70% de créditos (pendiente).</li>
                    <li>Entrega de carta de liberación de servicio social 100%.</li>
                    <li>Acreditación de idioma.</li>
                </ul>
                <p>Se deberá de contar con los documentos digitalizados en formato PDF. Una vez cumplidos con todos los requisitos se te marcará elegible para titulación.</p>
            </x-modal-instrucciones>

            <x-modal-instrucciones name="etapa2" title="Instrucciones: Modalidad y Registro de F1">
                <p class="mb-2">Esta etapa consta de dos pasos indispensables:</p>
                <ul class="space-y-1 text-gray-600 list-disc pl-5">
                    <li>Selecciona la modalidad de tu proyecto en el sistema (ej. Tesis, Examen).</li>
                    <li>Descarga la plantilla del F1, complétala, recaba las firmas de tu asesor y súbela para la validación del comité académico.</li>
                </ul>
            </x-modal-instrucciones>

            <x-modal-instrucciones name="etapa3" title="Instrucciones: Carga de Formato F2">
                <p>Una vez aprobado tu proyecto (F1), deberás cargar el Formato F2 digitalizado. Este documento avala la continuidad de tu trabajo y es requisito obligatorio para pasar a la fase de revisión final.</p>
            </x-modal-instrucciones>

            <x-modal-instrucciones name="etapa4" title="Instrucciones: Fase 3">
                <p>En esta etapa se programan las revisiones finales. Asegúrate de estar atento a tu bandeja de pendientes por si los docentes solicitan alguna corrección en tu trabajo escrito.</p>
            </x-modal-instrucciones>

            <x-modal-instrucciones name="etapa5" title="Instrucciones: Proceso Concluido">
                <p>¡Felicidades! Si llegaste a esta etapa significa que tu proceso de titulación ha sido aprobado satisfactoriamente por todas las áreas correspondientes. Mantente atento a las notificaciones para la fecha de tu ceremonia.</p>
            </x-modal-instrucciones>

        </div>
    </div>
</x-layouts.app>