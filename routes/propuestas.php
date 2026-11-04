<?php

use Illuminate\Support\Facades\Route;

// Rutas
Route::middleware(['auth'])->group(function () {
    
    // Rutas temporales para tu menú
    Route::get('/registro-propuestas', function () { return view('dashboard'); })->name('proposals.create');
    Route::get('/periodos', function () { return view('dashboard'); })->name('periods.index');
    Route::get('/plantilla', function () { return view('dashboard'); })->name('academics.index');
    Route::get('/revision', function () { return view('dashboard'); })->name('proposals.review');
    
    Route::get('/propuestas/crear', function () {
        return view('propuestas.create');
    });
});