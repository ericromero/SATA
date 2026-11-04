<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisitos Previos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .sidebar-scroll::-webkit-scrollbar { width: 4px; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background-color: rgba(255,255,255,0.2); border-radius: 4px; }
    </style>
</head>
<body class="bg-[#f4f4f5] h-screen overflow-hidden flex">

    <!-- ================= MENÚ LATERAL (IDÉNTICO AL DASHBOARD) ================= -->
    <aside class="w-64 bg-[#2b0e5a] text-white flex flex-col h-full flex-shrink-0 sidebar-scroll overflow-y-auto">
        <div class="p-6 flex items-center gap-3 mb-4">
            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zm0 7.5l-10-5v10l10 5 10-5v-10l-10 5z"></path></svg>
            <div>
                <h2 class="font-bold leading-tight text-lg">Facultad de<br>Psicología</h2>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-2 text-sm font-semibold">
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg hover:bg-white/10 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Inicio
            </a>
            <!-- (Se omiten los demás enlaces del menú por brevedad visual, copia y pega aquí exactamente los mismos enlaces del menú lateral de tu dashboard.blade.php para mantener consistencia) -->
            <a href="#" class="flex items-center gap-4 px-4 py-3 rounded-lg bg-white/10 transition-colors border-l-4 border-[#c2a033]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Titulación
            </a>
        </nav>
    </aside>

    <!-- ================= CONTENIDO PRINCIPAL ================= -->
    <main class="flex-1 overflow-y-auto flex items-start justify-center pt-20">
        
        <!-- Contenedor de la Tarjeta Central -->
        <div class="w-full max-w-2xl bg-white rounded-t-3xl rounded-b-lg shadow-sm border border-gray-100 flex flex-col items-center">
            
            <!-- Área de la Imagen (Carpeta) -->
            <div class="w-full bg-white flex justify-center py-10 rounded-t-3xl relative">
                <!-- NOTA: Aquí debes poner la ruta de tu imagen real de la carpeta exportada de FlutterFlow -->
                <!-- Ejemplo: <img src="{{ asset('images/carpeta.png') }}" alt="Carpeta" class="w-48 h-auto drop-shadow-md"> -->
                
                <!-- SVG Provisional simulando la carpeta amarilla por si aún no exportas la imagen -->
                <svg class="w-48 h-40 drop-shadow-md" viewBox="0 0 100 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 20C10 14.4772 14.4772 10 20 10H35L42 18H80C85.5228 18 90 22.4772 90 28V60C90 65.5228 85.5228 70 80 70H20C14.4772 70 10 65.5228 10 60V20Z" fill="#FDE047" stroke="#CA8A04" stroke-width="2"/>
                    <path d="M15 30H85L80 65H20L15 30Z" fill="#FEF08A" stroke="#CA8A04" stroke-width="2"/>
                </svg>
            </div>

            <!-- Área de los Botones -->
            <div class="w-full bg-white p-8 rounded-b-lg flex flex-col gap-4 border-t border-gray-100 shadow-[inset_0_4px_6px_-4px_rgba(0,0,0,0.1)]">
                
                <!-- Botón: Editar Documentacion -->
                <a href="{{ route('titulacion.editar_documentacion') }}" class="w-full bg-[#cbd54f] text-black text-sm font-extrabold py-3.5 rounded-md italic shadow-sm hover:bg-[#b5c040] transition-colors text-center block">
                    Editar Documentacion
                </a>

                <!-- Botón: Consultar Requisitos -->
                <button class="w-full bg-[#2b0e5a] text-white text-sm font-extrabold py-3.5 rounded-md italic shadow-sm hover:bg-[#1a083a] transition-colors">
                    Consultar Requisitos
                </button>

                <!-- Botón: Cancelar (Redirige de vuelta al dashboard) -->
                <a href="{{ route('dashboard') }}" class="w-full bg-[#da292e] text-white text-sm font-extrabold py-3.5 rounded-md italic shadow-sm hover:bg-[#b91e23] transition-colors text-center block">
                    Cancelar
                </a>

            </div>
        </div>

    </main>

</body>
</html>