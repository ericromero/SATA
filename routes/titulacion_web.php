<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\TitulacionController;

  Route::get('/dashboard', [TitulacionController::class, 'index'])->name('dashboard');
  Route::get('/titulacion/requisitos', [TitulacionController::class, 'requisitos'])->name('titulacion.requisitos');
  Route::get('/titulacion/editar-documentacion', [TitulacionController::class, 'editarDocumentacion'])->name('titulacion.editar_documentacion');