<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


Route::get('/usuarios', function () {
    return view('usuarios.index');
});

Route::get('/usuarios/alta-alumnos', function () {
    return view('usuarios.alta-alumnos');
});

Route::post('/usuarios/alta-alumnos', [UserController::class, 'storeAlumno']);

// Ruta para mostrar la tabla de alumnos
Route::get('/usuarios/consultar-alumnos', [UserController::class, 'indexAlumnos']);


Route::get('/usuarios/alta-docentes', function () {
    return view('usuarios.alta-docentes');
});

Route::post('/usuarios/alta-docentes', [UserController::class, 'storeDocente']);

require __DIR__.'/auth.php';