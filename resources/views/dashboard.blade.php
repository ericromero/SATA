<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú del Sistema de Titulación</title>
    <!-- Tailwind CSS por CDN para garantizar que los colores exactos carguen sin depender de Vite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js para la interactividad del modal -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        /* Scrollbar personalizado para el menú lateral */
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background-color: rgba(255,255,255,0.2); border-radius: 4px; }
    </style>
</head>
<body class="bg-[#e9e9e9] h-screen overflow-hidden flex" x-data="{ activeModal: null }">

    <!-- ================= MENÚ LATERAL (SIDEBAR) ================= -->
    <aside class="w-64 bg-[#2b0e5a] text-white flex flex-col h-full flex-shrink-0 sidebar-scroll overflow-y-auto">
        <!-- Logo y Título -->
        <div class="p-6 flex items-center gap-3 mb-4">
            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 7.5l-10-5v10l10 5 10-5v-10l-10 5z"></path></svg>
            <div>
                <h2 class="font-bold leading-tight text-lg">Facultad de<br>Psicología</h2>
            </div>
        </div>

        <!-- Opciones de Navegación -->
        <nav class="flex-1 px-4 space-y-2 text-sm font-semibold">
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Inicio
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Usuarios
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                Buzón
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Roles
            </a>
            <a href="#" class="flex items-center justify-between px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <div class="flex items-center gap-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    Solicitudes
                </div>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>
                Derechos ARCO
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Eventos Académicos
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg bg-white/10 transition-colors border-l-4 border-[#c2a033]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Titulación
            </a>
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Plantilla Docente
            </a>
        </nav>

        <div class="p-4 mt-auto">
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors text-sm font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Configuración
            </a>
        </div>
    </aside>

    <!-- ================= CONTENIDO PRINCIPAL ================= -->
    <main class="flex-1 overflow-y-auto p-8">
        <div class="max-w-7xl mx-auto">
            
            <!-- Título Principal -->
            <h1 class="text-3xl font-extrabold text-[#c2a033] mb-6">
                Bienvenido al Menu del Sistema de Titulacion
            </h1>

            <!-- Panel Superior (Dashboard resumen) -->
            <div class="bg-white rounded-xl p-6 mb-8 flex flex-col xl:flex-row items-center justify-between gap-8 shadow-sm">
                
                <!-- Sección: Consultar Estatus -->
                <div class="flex-1 flex flex-col items-start border-b xl:border-b-0 xl:border-r border-gray-200 pb-6 xl:pb-0 pr-0 xl:pr-6 w-full">
                    <h2 class="text-2xl font-extrabold italic text-black mb-1">Consultar Estatus</h2>
                    <p class="text-sm text-gray-500 mb-4">Revisa tu estatus</p>
                    <button class="bg-[#201850] text-white px-12 py-2.5 rounded-full font-bold hover:bg-indigo-900 transition-colors w-full sm:w-auto">
                        Entrar
                    </button>
                </div>

                <!-- Gráfico circular (Simulado 40%) -->
                <div class="flex-1 flex justify-center py-4 w-full">
                    <div class="relative w-36 h-36">
                        <svg class="w-full h-full transform -rotate-90" viewBox="0 0 100 100">
                            <circle cx="50" cy="50" r="40" stroke="#e5e7eb" stroke-width="12" fill="none" />
                            <circle cx="50" cy="50" r="40" stroke="#e3f015" stroke-width="12" fill="none" stroke-dasharray="251.2" stroke-dashoffset="150.7" />
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="text-3xl font-extrabold text-gray-800">40%</span>
                        </div>
                    </div>
                </div>

                <!-- Sección: Botones laterales derechos -->
                <div class="flex-1 flex flex-col gap-6 pl-0 xl:pl-6 w-full">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="font-extrabold text-black text-sm leading-tight">- Bandeja de Pendientes<br>(habilitado para docentes)</h3>
                            <p class="text-[11px] text-gray-500 mt-1">Revisa los pendientes para evaluacion</p>
                        </div>
                        <button class="bg-[#201850] text-white p-3 rounded-lg hover:bg-indigo-900 transition-colors flex-shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <h3 class="font-extrabold text-black text-sm">- Gestion De Proyecto</h3>
                            <p class="text-[11px] text-gray-500 mt-1">Modifica o Elimina tu proyecto</p>
                        </div>
                        <button class="bg-[#201850] text-white p-3 rounded-lg hover:bg-indigo-900 transition-colors flex-shrink-0">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Grid de Tarjetas de Etapas -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- Tarjeta 1 (Azul) -->
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-[#e0f2fe] p-2 rounded-lg text-[#39b4f2]">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                            </div>
                            <div class="bg-[#201850] rounded-full p-1 text-white">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                        </div>
                        <h3 class="font-extrabold text-black text-center text-[15px] mb-2">1. Requisitos previos</h3>
                        <p class="text-[11px] text-gray-500 text-center leading-snug mb-4">
                            Los requisitos no son obligatorios al inicio, de cualquier manera tienes un lapso para cumplir con ellos, y puedes continuar con el proceso.
                        </p>
                    </div>
                    <div class="flex gap-2 mt-auto">
                        <button @click="activeModal = 'etapa1'" class="flex-1 bg-[#39b4f2] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-sky-500">Ver instrucciones</button>
                        <a href="{{ route('titulacion.requisitos') }}" class="flex-1 bg-[#39b4f2] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-sky-500 block">Ir a esa etapa</a>
                    </div>
                </div>

                <!-- Tarjeta 2 (Verde) -->
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-[#dcfce7] p-2 rounded-lg text-[#1d7c2a]">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.932v-3.8l3.606 1.545a1 1 0 00.788 0L15 11.133v3.8a9.026 9.026 0 00-2.3 1.64 1 1 0 01-1.4 0z"></path></svg>
                            </div>
                        </div>
                        <h3 class="font-extrabold text-black text-center text-[15px] mb-2">2. Selección con Modalidad</h3>
                        <p class="text-[11px] text-gray-500 text-center leading-snug mb-4">
                            Selecciona la modalidad a trabajar en tu proyecto. Y si es colaborativo o individual.
                        </p>
                    </div>
                    <div class="flex gap-2 mt-auto">
                        <button @click="activeModal = 'etapa2'" class="flex-1 bg-[#1d7c2a] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-green-800">Ver instrucciones</button>
                        <button class="flex-1 bg-[#1d7c2a] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-green-800">Ir a esa etapa</button>
                    </div>
                </div>

                <!-- Tarjeta 3 (Naranja) -->
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-[#ffedd5] p-2 rounded-lg text-[#e99131]">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                        <h3 class="font-extrabold text-black text-center text-[15px] mb-2">3. Registro de Solicitud (F1)</h3>
                        <p class="text-[11px] text-gray-500 text-center leading-snug mb-4">
                            Registra tu F1 para la aprobación de tu proyecto
                        </p>
                    </div>
                    <div class="flex gap-2 mt-auto">
                        <button @click="activeModal = 'etapa3'" class="flex-1 bg-[#e99131] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-orange-600">Ver instrucciones</button>
                        <button class="flex-1 bg-[#e99131] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-orange-600">Ir a esa etapa</button>
                    </div>
                </div>

                <!-- Tarjeta 4 (Morada) -->
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-[#f3e8ff] p-2 rounded-lg text-[#8610af]">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                        <h3 class="font-extrabold text-black text-center text-[15px] mb-2">4. Carga de Formato (F2)</h3>
                        <p class="text-[11px] text-gray-500 text-center leading-snug mb-4">
                            Carga tu F2 y valida la aprobación para continuar con tu F3
                        </p>
                    </div>
                    <div class="flex gap-2 mt-auto">
                        <button @click="activeModal = 'etapa4'" class="flex-1 bg-[#8610af] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-purple-900">Ver instrucciones</button>
                        <button class="flex-1 bg-[#8610af] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-purple-900">Ir a esa etapa</button>
                    </div>
                </div>

                <!-- Tarjeta 5 (Teal/Turquesa) -->
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-[#ccfbf1] p-2 rounded-lg text-[#009495]">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                        <h3 class="font-extrabold text-black text-center text-[15px] mb-2">5. Instrucciones Fase 3</h3>
                        <p class="text-[11px] text-gray-500 text-center leading-snug mb-4">
                            Qué sigue para tu titulacion?
                        </p>
                    </div>
                    <div class="flex gap-2 mt-auto">
                        <button @click="activeModal = 'etapa5'" class="flex-1 bg-[#009495] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-teal-800">Ver instrucciones</button>
                        <button class="flex-1 bg-[#009495] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-teal-800">Ir a esa etapa</button>
                    </div>
                </div>

                <!-- Tarjeta 6 (Rosa) -->
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col justify-between min-h-[220px]">
                    <div>
                        <div class="flex justify-between items-start mb-4">
                            <div class="bg-[#fce7f3] p-2 rounded-lg text-[#c7127e]">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                        <h3 class="font-extrabold text-black text-center text-[15px] mb-2">6. Proceso Concluido</h3>
                        <p class="text-[11px] text-gray-500 text-center leading-snug mb-4">
                            Felicidades
                        </p>
                    </div>
                    <div class="flex gap-2 mt-auto">
                       <button @click="activeModal = 'etapa6'" class="flex-1 bg-[#c7127e] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-pink-800">Ver instrucciones</button>
                        <button class="flex-1 bg-[#c7127e] text-white text-[11px] font-extrabold py-2 px-1 rounded-xl italic text-center hover:bg-pink-800">Ir a esa etapa</button>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Modal para Etapa 1 -->
    <x-modal-instrucciones name="etapa1" title="Instrucciones: Requisitos Previos">
        <p class="mb-4">Antes de iniciar el proceso, asegúrate de cumplir con los siguientes requisitos:</p>
        <ul class="space-y-1 mb-4">
            <li>&bull; Contar con identificación oficial escolar vigente.</li>
            <li>&bull; Se verificará el avance del 70% de créditos (pendiente).</li>
            <li>&bull; Entrega de carta de liberación de servicio social 100%.</li>
            <li>&bull; Acreditación de idioma.</li>
        </ul>
        <p>Se deberá de contar con los documentos digitalizados en formato PDF. Una vez cumplidos con todos los requisitos se te marcará elegible para titulación.</p>
    </x-modal-instrucciones>

    <!-- Modal para Etapa 2 -->
    <x-modal-instrucciones name="etapa2" title="Instrucciones: Selección de Modalidad">
        <p class="mb-2">Revisa el catálogo institucional antes de postular tu opción:</p>
        <ul class="space-y-1">
            <li>&bull; Tesis / Tesina (individual o colaborativa hasta 3 integrantes).</li>
            <li>&bull; Examen General de Conocimientos.</li>
            <li>&bull; Totalidad de créditos y alto rendimiento académico.</li>
        </ul>
    </x-modal-instrucciones>

    <!-- Modal para Etapa 3 -->
    <x-modal-instrucciones name="etapa3" title="Instrucciones: Registro de Formato F1">
        <p>Descarga la plantilla oficial del formato F1, completa los datos de tu proyecto, adjunta las firmas de tu asesor y remítelo para la validación del comité académico.</p>
    </x-modal-instrucciones>

    <!-- Modal para Etapa 4 -->
    <x-modal-instrucciones name="etapa4" title="Instrucciones: Carga de Formato F2">
        <p>Una vez aprobado tu proyecto, deberás cargar el Formato F2 digitalizado. Este documento avala la continuidad de tu trabajo y es requisito obligatorio para pasar a la fase final.</p>
    </x-modal-instrucciones>

    <!-- Modal para Etapa 5 -->
    <x-modal-instrucciones name="etapa5" title="Instrucciones: Fase 3">
        <p>En esta etapa se programan las revisiones finales. Asegúrate de estar atento a tu bandeja de pendientes por si los docentes solicitan alguna corrección en tu trabajo escrito.</p>
    </x-modal-instrucciones>

    <!-- Modal para Etapa 6 -->
    <x-modal-instrucciones name="etapa6" title="Instrucciones: Proceso Concluido">
        <p>¡Felicidades! Si llegaste a esta etapa significa que tu proceso de titulación ha sido aprobado satisfactoriamente por todas las áreas correspondientes. Mantente atento a las notificaciones para la fecha de tu ceremonia o toma de protesta.</p>
    </x-modal-instrucciones>
</body>
</html>