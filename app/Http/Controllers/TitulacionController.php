<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    public function index()
    {
        return view('titulacion.index');
    }
}