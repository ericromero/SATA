<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\TitulacionController;

  Route::get('/dashboard', [TitulacionController::class, 'index'])->name('dashboard');
  Route::get('/titulacion/requisitos', [TitulacionController::class, 'requisitos'])->name('titulacion.requisitos');
  Route::get('/titulacion/editar-documentacion', [TitulacionController::class, 'editarDocumentacion'])->name('titulacion.editar_documentacion');
  Route::get('/titulacion/menu-f1', [TitulacionController::class, 'menuF1'])->name('titulacion.menu_f1');
  Route::get('/titulacion/seleccionar-modalidad', [TitulacionController::class, 'seleccionarModalidad'])->name('titulacion.seleccionar_modalidad');
  Route::get('/titulacion/registrar-f1', [TitulacionController::class, 'registrarF1'])->name('titulacion.registrar_f1');
  Route::get('/titulacion/buscador-docentes', [TitulacionController::class, 'buscadorDocentes'])->name('titulacion.buscador_docentes');
  Route::get('/titulacion/firmas-revision', [TitulacionController::class, 'firmasRevision'])->name('titulacion.firmas_revision');
  Route::get('/titulacion/observaciones', [TitulacionController::class, 'verObservaciones'])->name('titulacion.observaciones');