<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuzonController;

// 1. La ruta raíz carga la vista de bienvenida original con Login y Register
Route::get('/', function () {
    return view('welcome');
});

// 2. Grupo protegido para el Dashboard y tu módulo de Buzón
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    
    // Vista del Dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Módulo de Buzón y Avisos
    Route::prefix('buzon')->name('buzon.')->group(function () {
        Route::get('/', [BuzonController::class, 'index'])->name('index');
        Route::get('/crear-mensaje', [BuzonController::class, 'crearMensaje'])->name('crear-mensaje');
        Route::post('/guardar-mensaje', [BuzonController::class, 'guardarMensaje'])->name('guardar-mensaje');
        Route::get('/crear-aviso', [BuzonController::class, 'crearAviso'])->name('crear-aviso');
        Route::post('/guardar-aviso', [BuzonController::class, 'guardarAviso'])->name('guardar-aviso');
        Route::get('/grupos', [BuzonController::class, 'grupos'])->name('grupos');
        Route::get('/grupos/{grupo}/alumnos', [BuzonController::class, 'alumnosPorGrupo'])->name('alumnos');
    });

});