<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function index()
    {
        // ¡Este es el cambio clave! Ahora llama al diseño HTML
        return view('buzon.index');
    }

    public function createMessage()
    {
        return "Aquí se mostrará el formulario para crear un mensaje";
    }

    public function storeMessage(Request $request)
    {
        return "Esta ruta invisible guardará el mensaje en la base de datos";
    }

    public function createAd()
    {
        return "Aquí se mostrará el formulario para crear un anuncio";
    }

    public function storeAd(Request $request)
    {
        return "Esta ruta invisible guardará el anuncio en la base de datos";
    }

    public function getAlumnos()
    {
        return "Aquí se mostrará la lista de alumnos";
    }
}