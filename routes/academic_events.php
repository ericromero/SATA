<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicEventController;

/*
|--------------------------------------------------------------------------
| Rutas del Módulo de Eventos Académicos
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

   
// Rutas específicas (van ANTES del resource)

    Route::get('academic-events/cancel', [AcademicEventController::class, 'cancelView'])->name('academic-events.cancel'); 
    Route::get('academic-events/manage', [AcademicEventController::class, 'manageView'])->name('academic-events.manage');
  

    // Rutas de Reprogramación
    Route::get('academic-events/reprogram', [AcademicEventController::class, 'reprogramIndex'])->name('academic-events.reprogram');
    Route::get('academic-events/{academic_event}/reprogram', [AcademicEventController::class, 'reprogramForm'])->name('academic-events.reprogram-form');

   
    // Módulo Lista de Inscritos
    Route::get('academic-events/enrolled', [AcademicEventController::class, 'enrolledEvents'])->name('academic-events.enrolled');
    Route::get('academic-events/{academic_event}/enrolled', [AcademicEventController::class, 'enrolledList'])->name('academic-events.enrolled-list');


    // Módulo Asignación de Calificaciones
    Route::get('academic-events/grades', [AcademicEventController::class, 'gradesIndex'])->name('academic-events.grades');
    Route::get('academic-events/{academic_event}/grades', [AcademicEventController::class, 'gradesForm'])->name('academic-events.grades-form');

    
    // Módulo Descarga de Constancias
    Route::get('academic-events/certificates', [AcademicEventController::class, 'certificatesIndex'])->name('academic-events.certificates');


    
    Route::resource('academic-events', AcademicEventController::class);
});