<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicEventStudentController extends Controller
{
    public function index()
    {
        return view('Academic_Events_Alumnos.index');
    }

    public function upcoming()
    {
        return view('Academic_Events_Alumnos.upcoming');
    }

    public function enroll(Request $request, int $id)
    {
        return back()->with('status', "Inscripción simulada al evento #$id");
    }

    public function cancelAttendance(int $id)
    {
        return back()->with('status', "Asistencia cancelada para el evento #$id");
    }

    public function history()
    {
        return view('Academic_Events_Alumnos.history');
    }

    public function justifyAbsence(Request $request, int $id)
    {
        return back()->with('status', "Justificación enviada para el evento #$id");
    }

    public function certificates()
    {
        return view('Academic_Events_Alumnos.certificates');
    }

    public function explore()
    {
        return view('Academic_Events_Alumnos.explore');
    }

    
}