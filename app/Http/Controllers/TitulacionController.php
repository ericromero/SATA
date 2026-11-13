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
    public function menuF1()
    {
        return view('titulacion.menu_f1');
    }
    // NUEVO: Vista de Selección de Modalidad
    public function seleccionarModalidad()
    {
        return view('titulacion.seleccionar_modalidad');
    }

    // NUEVO: Vista del Formulario de Registro F1
    public function registrarF1()
    {
        return view('titulacion.registrar_f1');
    }
    public function buscadorDocentes()
{
    return view('titulacion.buscador_docentes');
}
// NUEVO: Vista de Firmas y Revisión
    public function firmasRevision()
    {
        return view('titulacion.firmas_revision');
    }
    // NUEVO: Vista de Observaciones
    public function verObservaciones()
    {
        return view('titulacion.observaciones');
    }

}