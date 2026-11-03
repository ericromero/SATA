<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AcademicEventController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Subsección 1: Registrar Evento (Acceso libre para pruebas)
Route::prefix('eventos-academicos')->name('events.')->group(function () {
    // 1. Gestión de eventos académicos (cards/listado)
    Route::get('/gestion', [AcademicEventController::class, 'management'])->name('management');
    
    // 2. Formulario de registro (Crear y Guardar)
    Route::get('/crear', [AcademicEventController::class, 'create'])->name('create');
    Route::post('/crear', [AcademicEventController::class, 'store'])->name('store');
    
    // 3. Registro en borrador (Editar y Actualizar)
    Route::get('/borrador/{id}', [AcademicEventController::class, 'edit'])->name('edit');
    Route::put('/borrador/{id}', [AcademicEventController::class, 'update'])->name('update');

    // 4. Ver Resumen / Ficha Técnica
    Route::get('/resumen/{id}', [AcademicEventController::class, 'show'])->name('show');
});

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Módulo Principal de Eventos Académicos
    Route::get('/eventos-academicos', [AcademicEventController::class, 'index'])->name('events.index');
});

require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});