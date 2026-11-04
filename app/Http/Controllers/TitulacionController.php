<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    // Método que ya tenías para el dashboard principal
    public function index()
    {
        return view('dashboard');
    }

    // NUEVO MÉTODO para la vista de Requisitos Previos
    public function requisitos()
    {
        return view('titulacion.requisitos');
    }
    //Metodo para editar Documentacion
    public function editarDocumentacion()
    {
        return view('titulacion.editar_documentacion');
    }
}