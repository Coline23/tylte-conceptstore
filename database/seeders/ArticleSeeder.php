<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // création d'un article Textile
        Article::create([
            'nom' => 'T-shirt Tylte X Sully',
            'description_courte' => 'T-shirt classique imprimé sur le devant, en coton biologique.',
            'description_longue' => 'Nous rendons ce produit aussi durable et éthique que possible Sortir des sentiers battus en utilisant des matières et des procédés moins impactant est le point de départ de notre engagement environnemental.',
            'prix' => 42,
            'image' => 'image-tyltesully',
            'stock' => 100, 
            'gamme_id' => 1, 
        ]);

        // création d'un article Deco
        Article::create([
            'nom' => 'Horloge de la semaine Ocean Clock',
            'description_courte' => 'Un objet de décoration pédagogique, ludique et esthétique !',            
            'description_longue' => 'Cette horloge, qui a été spécialement conçue pour les enfants, est l’objet de déco original indispensable pour guider votre petit bout chaque jour de la semaine !',
            'prix' => 70,
            'image' => 'image-horlogeocean',
            'stock' => 350, 
            'gamme_id' => 2, 
        ]);

        \App\Models\Article::factory(5)->create();
    }
}
