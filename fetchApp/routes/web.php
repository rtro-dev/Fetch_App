<?php

use App\Http\Controllers\TrainerController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('fetch');
});

/* // Rutas para Entrenadores
Route::resource('trainers', TrainerController::class);

// Rutas para Pokemon
Route::resource('pokemon', PokemonController::class);

// Rutas adicionales para filtrado de Pokemon
Route::get('pokemon/filter/type/{tipo}', [PokemonController::class, 'index'])
    ->name('pokemon.filter.type');
Route::get('pokemon/filter/trainer/{trainer_id}', [PokemonController::class, 'index'])
    ->name('pokemon.filter.trainer');

// Ruta para ver todos los Pokemon de un entrenador específico
Route::get('trainers/{trainer}/pokemon', [TrainerController::class, 'showPokemon'])
    ->name('trainers.pokemon'); */

// API Routes de Entrenadores
Route::post('/api/trainers', [TrainerController::class, 'apiStore']);
Route::put('/api/trainers/{trainer}', [TrainerController::class, 'apiUpdate']);
Route::delete('/api/trainers/{trainer}', [TrainerController::class, 'apiDestroy']);
Route::get('/api/trainers', [TrainerController::class, 'apiIndex']);
Route::get('/api/trainers/{trainer}', [TrainerController::class, 'apiShow']);

// API Routes de Pokemon
Route::post('/api/pokemon', [PokemonController::class, 'apiStore']);
Route::put('/api/pokemon/{pokemon}', [PokemonController::class, 'apiUpdate']);
Route::delete('/api/pokemon/{pokemon}', [PokemonController::class, 'apiDestroy']);
Route::get('/api/pokemon', [PokemonController::class, 'apiIndex']);
Route::get('/api/pokemon/{pokemon}', [PokemonController::class, 'apiShow']);