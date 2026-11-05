<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicEventController;

// Como ya están bajo el prefijo 'eventos-academicos' y nombre 'events.' en bootstrap/app.php, 
// aquí solo definimos las rutas relativas:
Route::get('/gestion', [AcademicEventController::class, 'management'])->name('management');
Route::get('/crear', [AcademicEventController::class, 'create'])->name('create');
Route::post('/crear', [AcademicEventController::class, 'store'])->name('store');
Route::get('/borrador/{id}', [AcademicEventController::class, 'edit'])->name('edit');
Route::put('/borrador/{id}', [AcademicEventController::class, 'update'])->name('update');
Route::get('/resumen/{id}', [AcademicEventController::class, 'show'])->name('show');