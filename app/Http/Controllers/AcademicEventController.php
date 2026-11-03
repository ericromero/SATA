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

    // 2. Formulario de registro
    public function create()
    {
        return view('academic_events.register.create');
    }

    // 3. Registro en borrador
    public function edit($id)
    {
        return view('academic_events.register.edit', compact('id'));
    }
}