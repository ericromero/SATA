<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facultad de Psicología</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-[#EAEAEA] font-sans flex h-screen overflow-hidden">

    <!-- Menú Lateral (Sidebar) -->
    <aside class="w-64 bg-[#2A0E5C] text-white flex flex-col shadow-xl h-full shrink-0">
        <!-- Logo -->
        <div class="p-6 flex items-center justify-center border-b border-purple-800/50">
            <img src="{{ asset('images/Logo Psico.png') }}" alt="Facultad de Psicología" class="h-12">
        </div>

        <!-- Navegación -->
        <nav class="flex-1 overflow-y-auto py-4 space-y-1">
            <a href="#" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors">
                <i class="fas fa-home w-6 mr-3"></i> Inicio
            </a>
            <a href="/usuarios" class="flex items-center px-6 py-3 text-sm bg-purple-800 border-l-4 border-white transition-colors">
                <i class="fas fa-user w-6 mr-3"></i> Usuarios
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors relative">
                <i class="fas fa-comment-alt w-6 mr-3"></i> Buzón
                <span class="absolute left-10 top-3 w-2.5 h-2.5 bg-red-600 rounded-full"></span>
            </a>
            <a href="/roles" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors">
                <i class="fas fa-briefcase w-6 mr-3"></i> Roles
            </a>
            
            <div class="px-6 py-3 text-sm hover:bg-purple-800 transition-colors cursor-pointer flex justify-between items-center">
                <div class="flex items-center">
                    <i class="fas fa-clipboard-list w-6 mr-3"></i> Solicitudes
                </div>
                <i class="fas fa-chevron-down text-xs"></i>
            </div>

            <a href="#" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors">
                <i class="fas fa-fingerprint w-6 mr-3"></i> Derechos ARCO
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors">
                <i class="fas fa-calendar-alt w-6 mr-3"></i> Eventos Académicos
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors">
                <i class="fas fa-bookmark w-6 mr-3"></i> Titulación
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors">
                <i class="fas fa-book-open w-6 mr-3"></i> Plantilla Docente
            </a>
            <a href="#" class="flex items-center px-6 py-3 text-sm hover:bg-purple-800 transition-colors">
                <i class="fas fa-cog w-6 mr-3"></i> Configuración
            </a>
        </nav>
    </aside>

    <!-- Contenedor Principal -->
    <main class="flex-1 overflow-y-auto p-8">
        {{ $slot }}
    </main>

</body>
</html>