<?php

namespace Database\Factories;

use App\Models\Gamme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->words(3, true),
            'description_courte' => fake()->paragraph(),
            'description_longue' => fake()->paragraphs(2,true),
            'prix' => fake()->randomFloat(2,15,150),            
            'image' => 'produit-base.png',
            'stock' => fake()->numberBetween(0, 350), 
            'gamme_id' => rand(1,Gamme::count()) 
        ];
    }
}
