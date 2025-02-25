<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trainer;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = ['Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Teselia', 'Kalos', 'Alola', 'Galar', 'Paldea'];
        $nombres = [
            'Red', 'Blue', 'Green', 'Gold', 'Silver', 'Crystal', 'Ruby', 'Sapphire', 'Emerald',
            'Diamond', 'Pearl', 'Platinum', 'Black', 'White', 'X', 'Y', 'Sun', 'Moon', 'Sword', 'Shield'
        ];

        foreach ($nombres as $nombre) {
            Trainer::create([
                'nombre' => $nombre,
                'region' => $regions[array_rand($regions)],
                'edad' => rand(10, 25)
            ]);
        }
    }
}
