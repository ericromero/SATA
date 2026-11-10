<?php

namespace App\Http\Controllers;

use App\Models\AcademicEvent;
use Illuminate\Http\Request;

class AcademicEventController extends Controller
{
    // Listar todos los eventos
    public function index()
    {
        $events = AcademicEvent::orderBy('start_date', 'asc')->get();
        return view('academic_events.index', compact('events'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('academic_events.create');
    }

    // Guardar un nuevo evento en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'modality' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        AcademicEvent::create($validated);

        return redirect()->route('academic-events.index')
                         ->with('success', 'Evento académico creado con éxito.');
    }
}