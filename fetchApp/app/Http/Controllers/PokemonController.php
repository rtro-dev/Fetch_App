<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Http\Requests\StorePokemonRequest;
use App\Http\Requests\UpdatePokemonRequest;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pokemon::with('trainer');
        $filtroAplicado = false;
        
        // Filtrar por tipo si se especifica
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
            $filtroAplicado = true;
        }

        // Filtrar por entrenador si se especifica
        if ($request->filled('trainer_id')) {
            $query->where('id_entrenador', $request->trainer_id);
            $filtroAplicado = true;
        }

        $pokemon = $query->paginate(10);
        $trainers = Trainer::all(); // filtro de entrenadores

        return view('pokemon.index', compact('pokemon', 'trainers', 'filtroAplicado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trainers = Trainer::all();
        return view('pokemon.create', compact('trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Se cambia Request por StorePokemonRequest
    public function store(StorePokemonRequest $request)
    {
        /* $validated = $request->validate([
            'nombre' => 'required|max:100',
            'tipo' => 'required|max:50',
            'nivel' => 'required|integer|min:1|max:100',
            'id_entrenador' => 'required|exists:trainers,id'
        ]); */
        // La validación se hace en el FormRequest

        Pokemon::create($request->validated());
        return redirect()->route('pokemon.index')
            ->with('success', 'Pokémon registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        $trainers = Trainer::all();
        return view('pokemon.edit', compact('pokemon', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Se cambia Request por UpdatePokemonRequest
    public function update(UpdatePokemonRequest $request, Pokemon $pokemon)
    {
        /* $validated = $request->validate([
            'nombre' => 'required|max:100',
            'tipo' => 'required|max:50',
            'nivel' => 'required|integer|min:1|max:100',
            'id_entrenador' => 'required|exists:trainers,id'
        ]); */
        // La validación se hace en el FormRequest

        $pokemon->update($request->validated());
        return redirect()->route('pokemon.index')
            ->with('success', 'Pokémon actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index')
            ->with('success', 'Pokémon eliminado exitosamente');
    }
}
