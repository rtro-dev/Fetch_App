<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use App\Models\Trainer;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            'Agua', 'Fuego', 'Planta', 'Eléctrico', 'Normal', 'Volador', 
            'Veneno', 'Tierra', 'Psíquico', 'Lucha', 'Roca', 'Hielo', 
            'Bicho', 'Dragón', 'Fantasma', 'Siniestro', 'Acero', 'Hada'
        ];

        $pokemonNames = [
            'Bulbasaur', 'Charmander', 'Squirtle', 'Chikorita', 'Cyndaquil', 'Totodile',
            'Treecko', 'Torchic', 'Mudkip', 'Turtwig', 'Chimchar', 'Piplup',
            'Pikachu', 'Eevee', 'Snorlax', 'Gyarados', 'Dragonite', 'Metagross',
            'Lucario', 'Garchomp', 'Gengar', 'Tyranitar', 'Salamence', 'Gardevoir',
            'Mewtwo', 'Lugia', 'Rayquaza', 'Dialga', 'Palkia', 'Giratina',
            'Charizard', 'Blastoise', 'Venusaur', 'Feraligatr', 'Typhlosion', 'Meganium',
            'Sceptile', 'Blaziken', 'Swampert', 'Torterra', 'Infernape', 'Empoleon'
        ];

        $trainers = Trainer::all();

        for ($i = 0; $i < 300; $i++) {
            Pokemon::create([
                'nombre' => $pokemonNames[array_rand($pokemonNames)],
                'tipo' => $tipos[array_rand($tipos)],
                'nivel' => rand(1, 100),
                'id_entrenador' => $trainers->random()->id
            ]);
        }
    }
}
