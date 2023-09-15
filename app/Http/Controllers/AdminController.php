<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gamme;
use App\Models\Article;
use App\Models\Evenement;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('access_backoffice')) { 
            abort(403, 'Vous n\'êtes pas administrateur : accès refusé');
        }

        // je récupère toutes les données nécessaires
        $gammes = Gamme::all();
        $articles = Article::all();
        $evenements = Evenement::all();
        $users = User::with('role')->get();

        // je renvoie la vue admin/index.blade.php en y injectant toutes ces données
        return view('admin/index', [
            'gammes' => $gammes,
            'articles' => $articles,
            'evenements' => $evenements,
            'users' => $users
        ]);
    }
}
