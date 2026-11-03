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
    // 1. Gestión de eventos académicos
    Route::get('/gestion', [AcademicEventController::class, 'management'])->name('management');
    
    // 2. Formulario de registro
    Route::get('/crear', [AcademicEventController::class, 'create'])->name('create');
    
    // 3. Registro en borrador
    Route::get('/borrador/{id}', [AcademicEventController::class, 'edit'])->name('edit');
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
