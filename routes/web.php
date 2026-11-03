<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\BuzonController; 

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

// Rutas para el Buzón (Estilo Coders Free)
Route::get('/buzon', [BuzonController::class, 'index'])->name('buzon.index');
Route::get('/buzon/mensaje/crear', [BuzonController::class, 'createMessage'])->name('buzon.message.create');
Route::post('/buzon/mensaje', [BuzonController::class, 'storeMessage'])->name('buzon.message.store');
Route::get('/buzon/anuncio/crear', [BuzonController::class, 'createAd'])->name('buzon.ad.create');
Route::post('/buzon/anuncio', [BuzonController::class, 'storeAd'])->name('buzon.ad.store');
Route::get('/buzon/alumnos', [BuzonController::class, 'getAlumnos'])->name('buzon.alumnos');

require __DIR__.'/auth.php';