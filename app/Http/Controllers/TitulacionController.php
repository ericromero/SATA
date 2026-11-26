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
    // Vista de Revisión y Emisión de Dictamen (Docentes / Comité)
    public function revisionDictamen()
    {
        return view('titulacion.revision_dictamen');
    }
    // Vista principal del Menú Carga de F2
    public function menuF2()
    {
        return view('titulacion.menu_f2');
    }

    // Fase II - Paso 1: Carga de Documento Final y Validación de VoBo
    public function cargarDocumentoF2()
    {
        return view('titulacion.cargar_documento_f2');
    }
    // Fase II - Paso 2: Vinculación de Sínodo y Generador de Formato F2
    public function generadorF2()
    {
        return view('titulacion.generador_f2');
    }

}