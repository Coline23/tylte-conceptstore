<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // création de l'administrateur
        User::create([
            'nom' => 'administrateur',
            'prenom' => 'blabla',
            'password' => Hash::make('Azerty88@'),
            'email' => 'admin@tyltestore.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);

        // création d'un utilisateur de test
        User::create([
            'nom' => 'utilisateur',
            'prenom' => 'blablo',
            'password' => Hash::make('Azerty88@'),
            'email' => 'utilisateur@tyltestore.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        \App\Models\User::factory(10)->create();
    }
}
