<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer;
use App\Http\Requests\StoreTrainerRequest;
use App\Http\Requests\UpdateTrainerRequest;

class TrainerController extends Controller
{
    public function apiIndex()
    {
        $trainers = Trainer::paginate(10);
        return response()->json($trainers);
    }

    public function apiShow(Trainer $trainer)
    {
        return response()->json($trainer);
    }

    public function apiStore(StoreTrainerRequest $request)
    {
        $trainer = Trainer::create($request->validated());
        return response()->json([
            'message' => 'Entrenador creado exitosamente',
            'trainer' => $trainer
        ], 201);
    }

    public function apiUpdate(UpdateTrainerRequest $request, Trainer $trainer)
    {
        $trainer->update($request->validated());
        return response()->json([
            'message' => 'Entrenador actualizado exitosamente',
            'trainer' => $trainer
        ]);
    }

    public function apiDestroy(Trainer $trainer)
    {
        $trainer->delete();
        return response()->json([
            'message' => 'Entrenador eliminado exitosamente'
        ]);
    }
}