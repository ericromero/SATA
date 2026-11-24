<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicEventController;
use App\Http\Controllers\AcademicEventStudentController;
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



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    // Módulo Alumnos - Eventos Académicos
    Route::get('eventos-academicos/alumnos/inicio', [AcademicEventStudentController::class, 'index'])
        ->name('eventos-academicos.alumnos.inicio');

    Route::get('eventos-academicos/alumnos/mis-eventos', [AcademicEventStudentController::class, 'upcoming'])
        ->name('eventos-academicos.alumnos.mis-eventos');

    Route::post('eventos-academicos/alumnos/eventos/{id}/inscribirse', [AcademicEventStudentController::class, 'enroll'])
        ->name('eventos-academicos.alumnos.inscribirse');

    Route::delete('eventos-academicos/alumnos/eventos/{id}/cancelar-asistencia', [AcademicEventStudentController::class, 'cancelAttendance'])
        ->name('eventos-academicos.alumnos.cancelar-asistencia');    

    Route::get('eventos-academicos/alumnos/historial', [AcademicEventStudentController::class, 'history'])
        ->name('eventos-academicos.alumnos.historial');

    Route::post('eventos-academicos/alumnos/eventos/{id}/justificar', [AcademicEventStudentController::class, 'justifyAbsence'])
        ->name('eventos-academicos.alumnos.justificar');    
    
    Route::get('eventos-academicos/alumnos/mis-constancias', [AcademicEventStudentController::class, 'certificates'])
        ->name('eventos-academicos.alumnos.mis-constancias');

    Route::get('eventos-academicos/alumnos/explorar', [AcademicEventStudentController::class, 'explore'])
    ->name('eventos-academicos.alumnos.explorar');



    // Recurso principal en español (genera index, create, store, edit, update, destroy, show)
    Route::resource('eventos-academicos', AcademicEventController::class);
});