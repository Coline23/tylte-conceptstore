<?php

namespace Database\Seeders;

use App\Models\Evenement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) { //boucle pour faire 20 réservations
            DB::table('reservations')->insert([
                'user_id' => rand(1, User::count()),
                'evenement_id' => rand(1, Evenement::count()) //nombre d'event en fonction de mon nombre d'event
            ]);
        }
    }
}
