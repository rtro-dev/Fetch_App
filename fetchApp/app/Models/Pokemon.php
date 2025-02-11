<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pokemon extends Model
{
    protected $table = 'pokemon';

    protected $fillable = [
        'nombre',
        'tipo',
        'nivel',
        'id_entrenador'
    ];

    // Obtiene el entrenador al que pertenece el pokemon. Relación muchos a uno con Trainer
    public function trainer(): BelongsTo
    {
        return $this->belongsTo(Trainer::class, 'id_entrenador');
    }
}
