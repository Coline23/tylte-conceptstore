<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $commande=Commande::create([
            'prix'=>$request->total,
            'date_retrait'=>session()->get("date_retrait"),
            'heure_retrait'=>session()->get("heure_retrait"),
            'user_id'=>auth()->user()->id
        ]);

         // je récupère le panier (stocké dans une variable), et je boucle dessus
         $panier = session()->get("cart");

         foreach ($panier as $article) {
 
             // j'insère chacun de ses articles dans commande_articles (syntaxe attach)
             $commande->articles()->attach($article['id'], ['quantite' => $article['quantite']]);
 
             // je fais baisser le stock de chaque article (stock actuel - stock commandé)
             $articleInDatabase = Article::find($article['id']);
             $articleInDatabase->stock -= $article['quantite'];
             $articleInDatabase->save();
         }

         session()->forget("cart");
        return redirect()->route("home")->withMessage("Commande validée !");    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande) //pour les détails de l'élément spécifié
    {
        //eager loading
        $commande->load('commandes_articles'); // je charge les articles de cette commande
        //envoyer une vue et injecter variable dans la vue
        return view('commandes/show', ['commande' => $commande]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
