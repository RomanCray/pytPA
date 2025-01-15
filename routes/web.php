<?php

use App\Livewire\Edificio\Edificio;
use App\Livewire\Proyecto\Proyecto;
use App\Livewire\TrabajosEdificio\TrabajosEdificio;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoPdfPreviewController;
use App\Livewire\Home\CompleteProjects;
use App\Livewire\Home\Home;
use App\Livewire\PruebasTabajos\SettingsImage;
use App\Livewire\Settings\Configuraciones;
use App\Http\Middleware\RouteRevision;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/', Proyecto::class)->name('home');
    Route::get('/', Home::class)->name('home');
    Route::get('/ver-proyecto/{proyect}', CompleteProjects::class)->name('ver.proyecto')->middleware(RouteRevision::class . ':checkEdificio');
    Route::get('/proyectos', Proyecto::class)->name('Pry');
    Route::get('/crear-edificio/{proyect}', Edificio::class)->name('crear.edificio')->middleware(RouteRevision::class . ':checkEdificio');
    Route::get('/crear-Trabajo-edificio/{id_edificio}/{nombreEdificio}', TrabajosEdificio::class)->name('crear.trabajo.edificio')->middleware(RouteRevision::class . ':checkTrabajoEdificio');

    Route::get('/proyecto/pdf-preview/{id}', [ProyectoPdfPreviewController::class, 'preview'])->name('proyecto.pdf-preview');

    Route::get('/configuraciones', Configuraciones::class)->name('settings');

    // RUTAS PARA REALIZACION DE PRUEBAS
    Route::get('preuba/{id}', [ProyectoPdfPreviewController::class, 'previewPre']);
    Route::get('image/{id}', SettingsImage::class);
});

require __DIR__ . '/auth.php';
