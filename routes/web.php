<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostulanteController;


// Rutas sin autenticacion
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Rutas autenticadas
Route::middleware('auth')->group(function () {
    Route::get('/abc', function () {
        echo("test");
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Ruta para listar los postulantes
    Route::get('/postulantes', [PostulanteController::class, 'index'])->name('postulantes.index');

    // Ruta para mostrar el formulario de creación de postulantes
    Route::get('/postulantes/create', [PostulanteController::class, 'create'])->name('postulantes.create');

    // Ruta para guardar un nuevo postulante
    Route::post('/postulantes', [PostulanteController::class, 'store'])->name('postulantes.store');

    // Ruta para mostrar los detalles de un postulante
    Route::get('/postulantes/{postulante}', [PostulanteController::class, 'show'])->name('postulantes.show');

    // Ruta para mostrar el formulario de edición de un postulante
    Route::get('/postulantes/{postulante}/edit', [PostulanteController::class, 'edit'])->name('postulantes.edit');

    // Ruta para actualizar un postulante existente
    Route::put('/postulantes/{postulante}', [PostulanteController::class, 'update'])->name('postulantes.update');

    // Ruta para eliminar un postulante
    Route::delete('/postulantes/{postulante}', [PostulanteController::class, 'destroy'])->name('postulantes.destroy');






});
