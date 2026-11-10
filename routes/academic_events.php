<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicEventController;

/*
|--------------------------------------------------------------------------
| Rutas del Módulo de Eventos Académicos
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::resource('academic-events', AcademicEventController::class);
});