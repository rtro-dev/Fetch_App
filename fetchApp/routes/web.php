<?php

use App\Http\Controllers\TrainerController;
use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return redirect()->route('trainers.index');
});

// Rutas para Entrenadores
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
    ->name('trainers.pokemon');