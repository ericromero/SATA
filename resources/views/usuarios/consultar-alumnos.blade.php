<x-layouts.app>
    <x-slot name="header">
        <h2>Consultar Alumnos</h2>
    </x-slot>

    <div style="padding: 20px;">
        
        <!-- Mensaje de éxito al actualizar o eliminar -->
        @if(session('success'))
            <div style="background-color: #dcfce7; border: 1px solid #86efac; color: #166534; padding: 10px; margin-bottom: 15px; font-size: 14px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Barra Superior: Botón Alta, Buscador, Filtros y Solicitar Alta -->
        <div style="margin-bottom: 20px;">
            <a href="/usuarios/alta-alumnos" style="text-decoration: none; color: black; border: 1px solid #ccc; padding: 5px 10px; background-color: #f9f9f9; font-size: 14px; margin-right: 5px;">
                Alta Alumnos
            </a>

            <input type="text" placeholder="Ingrese algún dato" style="border: 1px solid #ccc; padding: 5px; width: 250px; font-size: 14px; margin-right: 5px;">

            <button style="border: 1px solid #ccc; padding: 5px 10px; background-color: #f9f9f9; font-size: 14px; margin-right: 5px; cursor: pointer;">
                Filtros
            </button>

            <button style="border: 1px solid #ccc; padding: 5px 10px; background-color: #f9f9f9; font-size: 14px; cursor: pointer;">
                Solicitar Alta
            </button>
        </div>

        <!-- Tabla Clásica de Alumnos -->
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #ccc; background-color: white;">
            <thead style="background-color: #f3f4f6;">
                <tr>
                    <th style="padding: 10px; border: 1px solid #ccc; text-align: left; font-size: 14px;">Apellidos / Nombre(s)</th>
                    <th style="padding: 10px; border: 1px solid #ccc; text-align: left; font-size: 14px;">Número de Cuenta</th>
                    <th style="padding: 10px; border: 1px solid #ccc; text-align: left; font-size: 14px;">Correo Electrónico</th>
                    <th style="padding: 10px; border: 1px solid #ccc; text-align: center; font-size: 14px; width: 160px;">Modificar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alumnos as $alumno)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ccc; font-size: 14px;">
                            {{ $alumno->user->name ?? 'N/A' }}
                        </td>
                        <td style="padding: 10px; border: 1px solid #ccc; font-size: 14px;">
                            {{ $alumno->account_number }}
                        </td>
                        <td style="padding: 10px; border: 1px solid #ccc; font-size: 14px;">
                            {{ $alumno->user->email ?? 'N/A' }}
                        </td>
                        <td style="padding: 10px; border: 1px solid #ccc; text-align: center;">
                            <a href="/usuarios/alumnos/{{ $alumno->user_id }}/editar" style="text-decoration: none; color: black; border: 1px solid #ccc; background-color: #e5e5e5; padding: 3px 8px; font-size: 12px; margin-right: 5px;">
                                Editar
                            </a>

                            <form action="/usuarios/alumnos/{{ $alumno->user_id }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de eliminar a este alumno?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: 1px solid #ccc; background-color: #e5e5e5; padding: 3px 8px; cursor: pointer; font-size: 12px;">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="padding: 15px; border: 1px solid #ccc; text-align: center; color: #6b7280; font-size: 14px;">
                            Aún no hay alumnos registrados en el sistema.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-layouts.app>