<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trainer extends Model
{
    protected $fillable = [
        'nombre',
        'region',
        'edad'
    ];

    // Obtiene los pokemon asociados al entrenador. Relación uno a muchos con Pokemon
    public function pokemon(): HasMany
    {
        return $this->hasMany(Pokemon::class, 'id_entrenador');
    }
}
