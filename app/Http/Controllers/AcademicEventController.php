<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicEventController extends Controller
{
    // Menú principal con las 6 tarjetas
    public function index()
    {
        return view('academic_events.index');
    }

    // 1. Gestión de eventos académicos
    public function management()
    {
        return view('academic_events.register.management');
    }

    // 2. Formulario de registro (Vista)
    public function create()
    {
        return view('academic_events.register.create');
    }

    // Guardar nuevo registro o borrador
    public function store(Request $request)
    {
        // Al terminar el registro redirige al resumen (Ficha Técnica)
        return redirect()->route('events.show', 1)->with('success', 'Evento registrado correctamente');
    }

    // 3. Registro en borrador (Vista Editar)
    public function edit($id)
    {
        return view('academic_events.register.edit', compact('id'));
    }

    // Actualizar borrador
    public function update(Request $request, $id)
    {
        // Al actualizar redirige a la vista de gestión o al resumen
        return redirect()->route('events.show', $id)->with('success', 'Borrador actualizado correctamente');
    }

    // 4. Ver Resumen / Ficha Técnica
    public function show($id)
    {
        return view('academic_events.register.show', [
            'event' => (object)[
                'id' => $id,
                'event_name' => 'Curso Psicología aplicada 1',
                'academic_area' => 'Psicología Educativa',
                'modality' => 'presencial',
                'location' => 'Edificio A - Facultad de Psicología',
                'room' => 'Auditorio Luis Lara Tapia',
                'event_date' => '2026-12-02',
                'start_time' => '13:00',
                'end_time' => '15:00',
            ]
        ]);
    }
}