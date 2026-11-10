<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SATA - Facultad de Psicología</title>
    <!-- FontAwesome para los íconos (sin Vite) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body style="margin: 0; font-family: system-ui, -apple-system, sans-serif; background-color: #f9fafb; display: flex; height: 100vh; overflow: hidden;">

    <!-- Menú Lateral Estilo Clásico -->
    <aside style="width: 250px; background-color: white; border-right: 1px solid #e5e7eb; display: flex; flex-direction: column; height: 100%; flex-shrink: 0;">
        
        <!-- Logo -->
        <div style="padding: 20px; font-weight: bold; font-size: 16px; display: flex; align-items: center; gap: 10px; border-bottom: 1px solid #e5e7eb;">
            <div style="width: 24px; height: 24px; background-color: #1f2937; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: white;">
                <i class="fas fa-cube" style="font-size: 12px;"></i>
            </div>
            Laravel Starter Kit
        </div>

        <!-- Navegación Original (Tus botones) -->
        <nav style="flex-grow: 1; padding: 20px; overflow-y: auto;">
            <div style="color: #9ca3af; font-size: 12px; margin-bottom: 10px;">Menú Principal</div>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-home" style="width: 20px; text-align: center; margin-right: 8px;"></i> Inicio
            </a>
            
            <!-- Opción Activa (Usuarios) -->
            <a href="/usuarios" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #111827; background-color: #f3f4f6; border-radius: 6px; font-size: 14px; font-weight: 500;">
                <i class="fas fa-user" style="width: 20px; text-align: center; margin-right: 8px;"></i> Usuarios
            </a>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-comment-alt" style="width: 20px; text-align: center; margin-right: 8px;"></i> Buzón
            </a>
            
            <a href="/roles" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-briefcase" style="width: 20px; text-align: center; margin-right: 8px;"></i> Roles
            </a>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-clipboard-list" style="width: 20px; text-align: center; margin-right: 8px;"></i> Solicitudes
            </a>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-fingerprint" style="width: 20px; text-align: center; margin-right: 8px;"></i> Derechos ARCO
            </a>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-calendar-alt" style="width: 20px; text-align: center; margin-right: 8px;"></i> Eventos Académicos
            </a>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-bookmark" style="width: 20px; text-align: center; margin-right: 8px;"></i> Titulación
            </a>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-book-open" style="width: 20px; text-align: center; margin-right: 8px;"></i> Plantilla Docente
            </a>
            
            <a href="#" style="display: block; padding: 8px 12px; margin-bottom: 5px; text-decoration: none; color: #4b5563; border-radius: 6px; font-size: 14px;">
                <i class="fas fa-cog" style="width: 20px; text-align: center; margin-right: 8px;"></i> Configuración
            </a>
        </nav>
    </aside>

    <!-- Contenedor Principal (Index) -->
    <main style="flex-grow: 1; overflow-y: auto; padding: 40px;">
        {{ $slot }}
    </main>

</body>
</html>