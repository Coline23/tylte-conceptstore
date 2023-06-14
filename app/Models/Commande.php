<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // je charge automatiquement l'utilisateur à chaque fois que je récupère une commande
    protected $with = ['user'];

    // nom de la fonction au singulier car 1 seul user en relation
    // cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     // nom au pluriel car un article peut avoir plusieurs commandes 
    // cardinalité 1,n
    public function commandes_articles()
    {
            return $this->belongsToMany(Article::class, 'commandes_articles');
    }
}
