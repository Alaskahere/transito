<?php

use App\Http\Controllers\AccidenteController;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//http://localhost/transito/public/accidentes
Route::resource('accidentes', AccidenteController::class);
Route::resource('personas', PersonaController::class);
// Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
// Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
// Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
// Route::get('/personas/{persona}', [PersonaController::class, 'show'])->name('personas.show');
// Route::get('/personas/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
// Route::put('/personas/{persona}', [PersonaController::class, 'update'])->name('personas.update');
// Route::delete('/personas/{persona}', [PersonaController::class, 'destroy'])->name('personas.destroy');



