<?php

use App\Livewire\Edificio\Edificio;
use App\Livewire\Proyecto\Proyecto;
use App\Livewire\TrabajosEdificio\TrabajosEdificio;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoPdfPreviewController;
use App\Livewire\PruebasTabajos\SettingsImage;
use App\Livewire\Settings\Configuraciones;

Route::get('/', Proyecto::class)->name('home');
Route::get('/crear-edificio/{proyect}', Edificio::class)->name('crear.edificio');
Route::get('/crear-Trabajo-edificio/{id_edificio}/{nombreEdificio}', TrabajosEdificio::class)->name('crear.trabajo.edificio');

Route::get('/proyecto/pdf-preview/{id}', [ProyectoPdfPreviewController::class, 'preview'])->name('proyecto.pdf-preview');

Route::get('/configuraciones', Configuraciones::class)->name('settings');

// RUTAS PARA REALIZACION DE PRUEBAS
Route::get('preuba/{id}',  [ProyectoPdfPreviewController::class, 'previewPre']);
Route::get('image/{id}', SettingsImage::class);


