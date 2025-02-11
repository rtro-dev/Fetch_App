<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Http\Requests\StorePokemonRequest;
use App\Http\Requests\UpdatePokemonRequest;

class PokemonController extends Controller
{
    public function apiIndex()
    {
        $pokemon = Pokemon::paginate(10);
        return response()->json($pokemon);
    }

    public function apiShow(Pokemon $pokemon)
    {
        return response()->json($pokemon);
    }

    public function apiStore(StorePokemonRequest $request)
    {
        $pokemon = Pokemon::create($request->validated());
        return response()->json([
            'message' => 'Pokémon creado exitosamente',
            'pokemon' => $pokemon
        ], 201);
    }

    public function apiUpdate(UpdatePokemonRequest $request, Pokemon $pokemon)
    {
        $pokemon->update($request->validated());
        return response()->json([
            'message' => 'Pokémon actualizado exitosamente',
            'pokemon' => $pokemon
        ]);
    }

    public function apiDestroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return response()->json([
            'message' => 'Pokémon eliminado exitosamente'
        ]);
    }
}