<x-layouts.app>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Alta de Docentes y Funcionarios</h1>
    </div>

    <form action="/usuarios/alta-docentes" method="POST" class="relative pb-20">
        @csrf
        
        <!-- Tarjeta 1: Datos Personales y de Identificación -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-sm text-gray-900">Datos Personales y de Identificación</h3>
            </div>

            <!-- Fila 1: Etiquetas -->
            <div class="flex flex-row justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/30">
                <div class="font-semibold text-xs text-gray-500 w-1/3 text-left">Nombre Completo</div>
                <div class="font-semibold text-xs text-gray-500 w-1/3 text-center">Correo Electrónico</div>
                <div class="font-semibold text-xs text-gray-500 w-1/3 text-right">Contraseña</div>
            </div>
            
            <!-- Fila 1: Inputs -->
            <div class="flex flex-row justify-between px-6 py-4 border-b border-gray-100">
                <div class="w-1/3 pr-4">
                    <input type="text" name="name" required placeholder="Nombre completo" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 outline-none">
                </div>
                <div class="w-1/3 px-2">
                    <input type="email" name="email" required placeholder="docente@psicologia.unam.mx" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 outline-none text-center">
                </div>
                <div class="w-1/3 pl-4">
                    <input type="password" name="password" required placeholder="Contraseña de acceso" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 text-right outline-none">
                </div>
            </div>

            <!-- Fila 2: Etiquetas -->
            <div class="flex flex-row justify-between px-6 py-4 border-b border-gray-100 bg-gray-50/30">
                <div class="font-semibold text-xs text-gray-500 w-1/3 text-left">Fecha de Nacimiento</div>
                <div class="font-semibold text-xs text-gray-500 w-1/3 text-center">CURP</div>
                <div class="font-semibold text-xs text-gray-500 w-1/3 text-right">Número de Empleado</div>
            </div>
            
            <!-- Fila 2: Inputs -->
            <div class="flex flex-row justify-between px-6 py-4">
                <div class="w-1/3 pr-4">
                    <input type="date" name="birthday" required class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 bg-transparent p-0 outline-none text-left text-gray-400 focus:text-gray-600">
                </div>
                <div class="w-1/3 px-2">
                    <input type="text" name="CURP" maxlength="18" required placeholder="18 caracteres" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 outline-none text-center uppercase">
                </div>
                <div class="w-1/3 pl-4">
                    <input type="text" name="employe_number" maxlength="10" required placeholder="Ej. 0045892" class="w-full border-none shadow-none focus:ring-0 text-sm text-gray-600 placeholder-gray-400 bg-transparent p-0 text-right outline-none">
                </div>
            </div>
        </div>

        <!-- Tarjeta 2: Dos Columnas con las Divisiones (Estilo Prototipo) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            
            <!-- División SUA -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-bold text-center text-gray-900 mb-6 pb-2 border-b border-gray-100">División SUA</h3>
                
                <div class="space-y-4">
                    @php
                        $areasSua = [
                            ['id' => 7, 'name' => 'Educativa'],
                            ['id' => 8, 'name' => 'Clínica'],
                            ['id' => 9, 'name' => 'Cognitivo Conductual'],
                            ['id' => 10, 'name' => 'Organizacional'],
                            ['id' => 11, 'name' => 'Social'],
                            ['id' => 12, 'name' => 'Neuro'],
                        ];
                    @endphp

                    @foreach($areasSua as $area)
                    <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-none">
                        <label class="flex items-center gap-3 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox" name="areas[]" value="{{ $area['id'] }}" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500 h-4 w-4">
                            <span>{{ $area['name'] }}</span>
                        </label>
                        <select name="roles_area[{{ $area['id'] }}]" class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">Select...</option>
                            <option value="1">Docente / Profesor</option>
                            <option value="2">Tutor Académico</option>
                            <option value="3">Funcionario</option>
                        </select>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- División Escolarizado -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-bold text-center text-gray-900 mb-6 pb-2 border-b border-gray-100">División Escolarizado</h3>
                
                <div class="space-y-4">
                    @php
                        $areasEscolarizado = [
                            ['id' => 1, 'name' => 'Educativa'],
                            ['id' => 2, 'name' => 'Clínica'],
                            ['id' => 3, 'name' => 'Cognitivo Conductual'],
                            ['id' => 4, 'name' => 'Organizacional'],
                            ['id' => 5, 'name' => 'Social'],
                            ['id' => 6, 'name' => 'Neuro'],
                        ];
                    @endphp

                    @foreach($areasEscolarizado as $area)
                    <div class="flex items-center justify-between py-2 border-b border-gray-50 last:border-none">
                        <label class="flex items-center gap-3 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox" name="areas[]" value="{{ $area['id'] }}" class="rounded border-gray-300 text-purple-600 focus:ring-purple-500 h-4 w-4">
                            <span>{{ $area['name'] }}</span>
                        </label>
                        <select name="roles_area[{{ $area['id'] }}]" class="bg-gray-50 border border-gray-200 rounded-lg px-3 py-1.5 text-xs text-gray-600 focus:outline-none focus:ring-2 focus:ring-purple-500">
                            <option value="">Select...</option>
                            <option value="1">Docente / Profesor</option>
                            <option value="2">Tutor Académico</option>
                            <option value="3">Funcionario</option>
                        </select>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Botón Aceptar -->
        <div class="absolute bottom-0 right-0">
            <button type="submit" class="bg-[#3b2d59] hover:bg-[#2A0E5C] text-white font-medium py-2 px-8 rounded-lg shadow transition-colors">
                Aceptar
            </button>
        </div>
    </form>
</x-layouts.app>