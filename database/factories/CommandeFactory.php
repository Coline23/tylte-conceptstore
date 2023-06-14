<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prix' => fake()->randomFloat(2,15,150),
            'date_retrait' => date('Y_m_d'),
            'heure_retrait' => fake()->randomElement(['10h' ,'12h','14h30', '17h30']),
            'user_id' => rand(1,User::count()) //nombre d'utilisateurs entre 1 et le nombre d'user qu'il y a dans la table
        ];
    }
}
