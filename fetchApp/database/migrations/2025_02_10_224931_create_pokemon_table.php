<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id(); // Identificador único
            $table->string('nombre', 100); // Nombre del Pokémon
            $table->string('tipo', 50); // Tipo del Pokémon
            $table->integer('nivel'); // Nivel del Pokémon
            $table->foreignId('id_entrenador') // Clave foránea
                  ->constrained('trainers') // Referencia a la tabla trainers
                  ->onDelete('cascade'); // Si se elimina el entrenador, se eliminan sus pokemon
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
