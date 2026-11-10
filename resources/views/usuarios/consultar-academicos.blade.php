<x-layouts.app>
    <x-slot name="header">
        <h2>Consultar Académicos</h2>
    </x-slot>

    <div style="padding: 20px;">
        
        <!-- Barra de herramientas (Botones Clásicos y Búsqueda) -->
        <div style="margin-bottom: 20px;">
            <a href="/usuarios/alta-docentes" style="text-decoration: none; color: black; border: 1px solid #ccc; padding: 5px 10px; background-color: #f9f9f9; font-size: 14px; margin-right: 5px;">
                Alta Docentes
            </a>
            
            <button style="border: 1px solid #ccc; padding: 5px 10px; background-color: #f9f9f9; font-size: 14px; margin-right: 5px; cursor: pointer;">
                Integrar usuario
            </button>
            
            <input type="text" placeholder="Ingrese algún dato" style="border: 1px solid #ccc; padding: 5px; width: 250px; font-size: 14px; margin-right: 5px;">
            
            <button style="border: 1px solid #ccc; padding: 5px 10px; background-color: #f9f9f9; font-size: 14px; margin-right: 5px; cursor: pointer;">
                Filtros
            </button>
            
            <button style="border: 1px solid #ccc; padding: 5px 10px; background-color: #f9f9f9; font-size: 14px; cursor: pointer;">
                Solicitar Alta
            </button>
        </div>

        <!-- Tabla Clásica Dinámica -->
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #ccc; background-color: white;">
            <thead style="background-color: #f3f4f6;">
                <tr>
                    <th style="padding: 10px; border: 1px solid #ccc; text-align: left; font-size: 14px;">Nombre Completo</th>
                    <th style="padding: 10px; border: 1px solid #ccc; text-align: left; font-size: 14px;">RFC</th>
                    <th style="padding: 10px; border: 1px solid #ccc; text-align: center; font-size: 14px; width: 150px;">Modificar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($academicos as $academico)
                    <tr>
                        <!-- Datos reales desde la base de datos -->
                        <td style="padding: 10px; border: 1px solid #ccc; font-size: 14px;">
                            {{ $academico->user->name }}
                        </td>
                        <td style="padding: 10px; border: 1px solid #ccc; font-size: 14px;">
                            {{ $academico->RFC }}
                        </td>
                        <td style="padding: 10px; border: 1px solid #ccc; text-align: center;">
                            <button style="border: 1px solid #ccc; background-color: #e5e5e5; padding: 3px 8px; cursor: pointer; font-size: 12px;">Editar</button>
                            <button style="border: 1px solid #ccc; background-color: #e5e5e5; padding: 3px 8px; cursor: pointer; font-size: 12px;">Eliminar</button>
                        </td>
                    </tr>
                @empty
                    <!-- Estado vacío cuando no hay registros -->
                    <tr>
                        <td colspan="3" style="padding: 15px; border: 1px solid #ccc; text-align: center; color: #6b7280; font-size: 14px;">
                            No hay docentes registrados en el sistema.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-layouts.app>