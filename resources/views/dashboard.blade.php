<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SATA - Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen w-full bg-gray-50 overflow-hidden font-sans antialiased m-0 p-0">
    <!-- MENÚ LATERAL PRINCIPAL (MORADO) -->
    <aside class="w-64 bg-[#2a1054] text-white flex flex-col flex-shrink-0 h-full shadow-2xl z-20">
        <div class="p-6 flex items-center gap-4 border-b border-[#3b1c70]">
            <div class="w-10 h-10 bg-white rounded flex items-center justify-center text-[#2a1054] font-bold text-xl">Ψ</div>
            <h1 class="text-sm font-bold leading-tight">Facultad de Psicología</h1>
        </div>
        <nav class="flex-1 py-4 space-y-1 overflow-y-auto">
            <!-- Botón Inicio Activo -->
            <a href="{{ route('dashboard') }}" class="flex items-center px-6 py-3 text-sm font-medium bg-[#3b1c70] border-l-4 border-red-500 gap-3">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Inicio
            </a>
            <!-- Botón Buzón Inactivo -->
            <a href="{{ route('buzon.crear-mensaje') }}" class="flex items-center px-6 py-3 text-sm font-medium hover:bg-[#3b1c70] transition gap-3">
                <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                Buzón
            </a>
        </nav>
    </aside>
    <!-- ÁREA EN BLANCO -->
    <main class="flex-1 flex flex-col h-full items-center justify-center">
        <h2 class="text-gray-400 text-xl font-medium">Bienvenido. Selecciona "Buzón" para comenzar.</h2>
    </main>
</body>
</html>