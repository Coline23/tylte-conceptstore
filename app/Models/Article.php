<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // nom au pluriel car un user peut poster plusieurs commentaires
    // cardinalité 1,1
    public function gamme()
    {
        return $this->belongsTo(Gamme::class);
    }

    // nom au pluriel car un article peut avoir plusieurs commandes 
    // cardinalité 0,n
    public function commandes_articles()
    {
        return $this->belongsToMany(Commande::class, 'commandes_articles')->withPivot('quantite');
    }

    protected $fillable = [
        'nom',
        'description_courte',
        'description_longue',
        'prix',
        'image',
        'stock',
        'gamme_id',
    ];
}
