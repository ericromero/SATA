<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicEventController;

/*
|--------------------------------------------------------------------------
| Rutas del Módulo de Eventos Académicos (Homologadas en Español)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', config('jetstream.auth_session')])->group(function () {
    
    // Rutas específicas / fijas (van SIEMPRE antes del resource)
    Route::get('eventos-academicos/gestion', [AcademicEventController::class, 'manageView'])->name('eventos-academicos.gestion');
    Route::get('eventos-academicos/cancelar', [AcademicEventController::class, 'cancelView'])->name('eventos-academicos.cancelar');
    
    // Rutas de Reprogramación
    Route::get('eventos-academicos/reprogramar', [AcademicEventController::class, 'reprogramIndex'])->name('eventos-academicos.reprogramar');
    Route::get('eventos-academicos/{evento}/reprogramar', [AcademicEventController::class, 'reprogramForm'])->name('eventos-academicos.reprogramar-form');

    // Módulo Lista de Inscritos
    Route::get('eventos-academicos/inscritos', [AcademicEventController::class, 'enrolledEvents'])->name('eventos-academicos.inscritos');
    Route::get('eventos-academicos/{evento}/inscritos', [AcademicEventController::class, 'enrolledList'])->name('eventos-academicos.inscritos-lista');

    // Módulo Asignación de Calificaciones
    Route::get('eventos-academicos/calificaciones', [AcademicEventController::class, 'gradesIndex'])->name('eventos-academicos.calificaciones');
    Route::get('eventos-academicos/{evento}/calificaciones', [AcademicEventController::class, 'gradesForm'])->name('eventos-academicos.calificaciones-form');

    // Módulo Descarga de Constancias
    Route::get('eventos-academicos/constancias', [AcademicEventController::class, 'certificatesIndex'])->name('eventos-academicos.constancias');

    // Recurso principal en español (genera index, create, store, edit, update, destroy, show)
    Route::resource('eventos-academicos', AcademicEventController::class);
});