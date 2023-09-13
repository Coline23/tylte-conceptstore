<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Commande;
use App\Models\Evenement;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // nom au pluriel car un user peut passer plusieurs commandes
    // cardinalité 0,n
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    // nom au pluriel car un user peut avoir plusieurs reservations d'event
    // cardinalité n,n
    public function reservations()
    {
            return $this->belongsToMany(Evenement::class, 'reservations');
    }

    // nom de la fonction au singulier car 1 seul rôle en relation
    // cardinalité 1,1
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isAdmin()
    {
        //return $this->role == "admin";
        return $this->role_id == 2;
    }

    // permet de vérifier si un article est dans les favoris de l'utilisateur connecté
    // dans la vue, on utilise la syntaxe suivante : @if (Auth::user()->isInFavorites($article))
    
    public function isInReservation(Evenement $evenement)
    {
        return $evenement->reservations()->where('user_id', $this->id)->exists();
    }
}
