<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('dashboard', function () {
    return redirect('/usuarios');
})->middleware(['auth', 'verified'])->name('dashboard');

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

Route::get('/usuarios/consultar-academicos', [UserController::class, 'consultarAcademicos']);

//Editar y eliminar alumnos
Route::get('/usuarios/alumnos/{user_id}/editar', [UserController::class, 'editAlumno']);
Route::put('/usuarios/alumnos/{user_id}', [UserController::class, 'updateAlumno']);
Route::delete('/usuarios/alumnos/{user_id}', [UserController::class, 'destroyAlumno']);

//Editar y eliminar docentes
Route::get('/usuarios/docentes/{user_id}/editar', [UserController::class, 'editDocente']);
Route::put('/usuarios/docentes/{user_id}', [UserController::class, 'updateDocente']);
Route::delete('/usuarios/docentes/{user_id}', [UserController::class, 'destroyDocente']);

require __DIR__.'/auth.php';