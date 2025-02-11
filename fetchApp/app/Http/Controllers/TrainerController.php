<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Trainer::with('pokemon');
        $filtroAplicado = false;
        
        // Filtrar por región si se especifica
        if ($request->filled('region')) {
            $query->where('region', $request->region);
            $filtroAplicado = true;
        }

        $trainers = $query->paginate(10);
        
        return view('trainers.index', compact('trainers', 'filtroAplicado'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trainers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Se cambia Request por StoreTrainerRequest
    public function store(StoreTrainerRequest $request)
    {
        /* $validated = $request->validate([
            'nombre' => 'required|max:100',
            'region' => 'required|max:50',
            'edad' => 'required|integer|min:10|max:100'
        ]); */
        // La validación se hace en el FormRequest

        Trainer::create($request->validated());
        return redirect()->route('trainers.index')
            ->with('success', 'Entrenador creado exitosamente');
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
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Se cambia Request por UpdateTrainerRequest
    public function update(UpdateTrainerRequest $request, Trainer $trainer)
    {
        /* $validated = $request->validate([
            'nombre' => 'required|max:100',
            'region' => 'required|max:50',
            'edad' => 'required|integer|min:10|max:100'
        ]); */
        // La validación se hace en el FormRequest

        $trainer->update($request->validated());
        return redirect()->route('trainers.index')
            ->with('success', 'Entrenador actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect()->route('trainers.index')
            ->with('success', 'Entrenador eliminado exitosamente');
    }
}
