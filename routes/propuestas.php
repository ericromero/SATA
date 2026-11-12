<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    
    // 1. Vista Coordinador (Crea propuestas iniciales)
    Route::get('/propuestas/crear', function () {
        return view('propuestas.create');
    })->name('proposals.create');

    // 2. Vista Coordinador (Bandeja para revisar cancelaciones y modificaciones)
    Route::get('/revision', function () { 
        return view('propuestas.review'); 
    })->name('proposals.review');

    // 3. Vista Docente (Bandeja para aceptar, modificar, cancelar o agregar)
    Route::get('/mis-propuestas', function () {
        return view('propuestas.my_proposals');
    })->name('proposals.my_proposals');

    // Rutas pendientes (Las dejamos apuntando al dashboard temporalmente para evitar errores)
    Route::get('/periodos', function () { return view('dashboard'); })->name('periods.index');
    Route::get('/plantilla', function () { return view('dashboard'); })->name('academics.index');
    // Rutas de extraordinarios
    Route::get('/periodos/ordinarios', function () { return view('dashboard'); })->name('periods.ordinary');
    Route::get('/periodos/extraordinarios', function () { return view('dashboard'); })->name('periods.extraordinary');
    Route::get('/plantilla', function () { return view('dashboard'); })->name('academics.index');
});