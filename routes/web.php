<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\contactoController;

use App\Http\Controllers\directorioController;
use App\Models\contacto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contactos',[contactoController::class, 'contactos'])->name('contacto.controller');

Route::get('/directorio', [directorioController::class, 'directorio'])->name('directorio.directorio');

Route::get('/directorio/crear', [directorioController::class, 'crear'])->name('directorio.crear');

Route::post('/directorio/store', [directorioController::class, 'store'])->name('directorio.store');

Route::get('/directorio/buscar', [directorioController::class, 'buscar'])->name('directorio.buscar');

Route::get('/directorio/search', [directorioController::class, 'search'])->name('direcciones.search');

Route::get('/contacto/agregar/{codigoEntrada}', [contactoController::class, 'agregar'])->name('contacto.agregar');

Route::post('/contacto/store', [contactoController::class, 'store'])->name('contacto.store');

Route::get('/contacto/delete/{id}', [contactoController::class, 'delete'])->name('contacto.delete');
Route::get('/contacto/destroy/{id}', [contactoController::class, 'destroy'])->name('contacto.destroy');
