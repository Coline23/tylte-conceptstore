<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()-> sentence(4),
            'description_courte' => fake()->paragraph(),
            'description_longue' => fake()->paragraphs(2,true),
            'date' => fake()->date('Y_m_d'),
            'heure_debut' => '14h',
            'heure_fin' => '17h',
            'max_personnes' => rand(10,15),
            'nombre_inscrits' => rand(1,10),
        ];
    }
}
