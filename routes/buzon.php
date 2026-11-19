<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuzonController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('buzon')->name('buzon.')->group(function () {
    Route::get('/', [BuzonController::class, 'index'])->name('index');
    Route::get('/crear-mensaje', [BuzonController::class, 'crearMensaje'])->name('crear-mensaje');
    Route::post('/guardar-mensaje', [BuzonController::class, 'guardarMensaje'])->name('guardar-mensaje');
    Route::put('/mensaje/{id}', [BuzonController::class, 'actualizarMensaje'])->name('actualizar-mensaje');
    Route::delete('/mensaje/{id}', [BuzonController::class, 'eliminarMensaje'])->name('eliminar-mensaje');
    Route::get('/crear-aviso', [BuzonController::class, 'crearAviso'])->name('crear-aviso');
    Route::post('/guardar-aviso', [BuzonController::class, 'guardarAviso'])->name('guardar-aviso');
    Route::get('/grupos', [BuzonController::class, 'grupos'])->name('grupos');
    Route::get('/grupos/{grupo}/alumnos', [BuzonController::class, 'alumnosPorGrupo'])->name('alumnos');
});