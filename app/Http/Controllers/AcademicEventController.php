<?php

namespace App\Http\Controllers;

use App\Models\AcademicEvent;
use Illuminate\Http\Request;

class AcademicEventController extends Controller
{
    public function index()
    {
        $events = AcademicEvent::orderBy('start_date', 'asc')->get();
        return view('academic_events.index', compact('events'));
    }

    public function create()
    {
        return view('academic_events.create');
    }

    public function store(Request $request)
    {
        $isDraft = $request->input('action') === 'draft';

        $rules = [
            'title' => 'required|string|max:255',
            'event_type' => 'nullable|string',
            'academic_area' => 'nullable|string',
            'target_audience' => 'nullable|string',
            'max_capacity' => 'nullable|integer',
            'description' => 'nullable|string',
            'modality' => $isDraft ? 'nullable|string' : 'required|string',
            'start_date' => $isDraft ? 'nullable|date' : 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'nullable|string',
            'end_time' => 'nullable|string',
            'building' => 'nullable|string',
            'auditorium' => 'nullable|string',
            'digital_platform' => 'nullable|string',
            'responsible_name' => 'nullable|string',
            'responsible_email' => 'nullable|email',
            'responsible_phone' => 'nullable|string',
        ];

        $validated = $request->validate($rules);

        // Asignar estado según la acción
        $validated['status'] = $isDraft ? 'Borrador' : 'Pendiente de Revisión';

        AcademicEvent::create($validated);

        $message = $isDraft 
            ? 'Borrador guardado exitosamente en la sección de gestión de eventos.' 
            : 'El evento académico fue registrado exitosamente y enviado a revisión.';

        return redirect()->route('academic-events.index')->with('success', $message);
    }

    public function cancelView()
    {
        return view('academic_events.cancel');
    }

    public function manageView()
    {
        $drafts = AcademicEvent::where('status', 'Borrador')->get();
        return view('academic_events.manage', compact('drafts'));
    }

    public function reprogramIndex()
    {
        return view('academic_events.reprogram');
    }

    public function reprogramForm($id)
    {
        return view('academic_events.reprogram_form', compact('id'));
    }


    public function enrolledEvents()
    {
    return view('academic_events.enrolled');
    }

    public function enrolledList($id)
    {
    return view('academic_events.enrolled_list', compact('id'));
    }

    public function gradesIndex()
    {
        return view('academic_events.grades');
    }

    public function gradesForm($id)
    {
        return view('academic_events.grades_form', compact('id'));
    }

    public function certificatesIndex()
    {
        return view('academic_events.certificates');
    }
}