<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use HasFactory;

     // nom au pluriel car un user peut avoir plusieurs reservations d'event
    // cardinalité 0,n
    public function reservations()
    {
            return $this->belongsToMany(User::class, 'reservations');
    }

}
