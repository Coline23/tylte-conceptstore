<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gamme;

class GammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Gamme::create([
                'nom' => 'Textile'
            ]);
    
            Gamme::create([
                'nom' => 'Décoration'
            ]);

            Gamme::create([
                'nom' => 'Epicerie fine'
            ]);
        }
    }
