<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Commande;
use App\Models\Article;

class CommandeArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) { //boucle pour faire 20 réservations
            DB::table('commandes_articles')->insert([
                'commande_id' => rand(1, Commande::count()),
                'article_id' => rand(1, Article::count()), //nombre d'event en fonction de mon nombre d'event
                'quantite' => rand(1,5)
            ]);
        }
    }
}
