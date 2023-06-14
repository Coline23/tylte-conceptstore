<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evenement;

class EvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // création d'un evenement X
        Evenement::create([
            'description_courte' => 'TYLTE"RUN#65 x Millet',
            'description_longue' => 'Rendez-vous Jeudi 29 juin pour une session course à pied de 1h-1h30 vers le Mont Veyrier en présence de lathlète Millet, Simon Paccard ! Départ du parking du petit por à Annecy-le-Vieux .
            Testez les produits MILLET : Sac à dos Intense 5L, Intense 12L et le Intense Belt.',
            'date' => '2023-06-23',
            'heure_debut' => '18h30',
            'heure_fin' => '21h',
            'max_personnes' => 15,
            'nombre_inscrits' => 10,
        ]);

        // création d'un evenement Y
        Evenement::create([
            'description_courte' => 'SAMAYA x TYLTE',
            'description_longue' => 'Venez découvrir les innovations Samaya et leur processus de développement à la boutique Tylte. Au programme, projection de une vidéo centrée sur la R&D des developpement produits et un moment de échange avec une partie de la team developpement afin de mettre en lumière les enjeux et les procédés de développement des produits techniques de montagne avec comme exemple la gamme de sacs à dos « Ultra » de Samaya.',
            'date' => '2023-07-20',
            'heure_debut' => '18h',
            'heure_fin' => '21h',
            'max_personnes' => 10,
            'nombre_inscrits' => 5,
        ]);

        \App\Models\Evenement::factory(5)->create();
    }
}
