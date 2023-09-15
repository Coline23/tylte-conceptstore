<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Adresse;
use Illuminate\Support\Facades\Gate;


class CartController extends Controller
{

	# Affichage du panier
	public function show()
	{
		return view("cart.show"); // resources\views\cart\show.blade.php
	}

	# Ajout d'un produit au panier
	public function add($articleId, Request $request)
	{
		// Validation de la requête
		$this->validate($request, [
			"quantite" => "numeric|min:1"
		]);

		$article = Article::find($articleId);  // on récupère l'article
		$quantite = $request->quantite; // on récupère la quantité choisie

		if ($article->stock >= $quantite) {  // si le stock restant est suffisant

			// Ajout/Mise à jour du produit au panier avec sa quantité
			$cart = session()->get("cart"); // On récupère le panier en session

			// Les informations du produit à ajouter
			$article_details = [
				'id' => $article->id,
				'nom' => $article->nom,
				'prix' => $article->prix,
				'description_courte' => $article->description_courte,
				'quantite' => $quantite
			];

			$cart[$article->id] = $article_details; // On ajoute ou on met à jour le produit au panier
			session()->put("cart", $cart); // On enregistre le panier

		} else {
			return redirect()->back()->withErrors("Quantité en stock insuffisante !");
		}

		// Redirection vers le panier avec un message
		return redirect()->route("cart.show")->withMessage("Article ajouté au panier");
	}

	// Suppression d'un produit du panier
	public function remove($key)
	{
		// Suppression du produit du panier par son identifiant
		$cart = session()->get("cart"); // On récupère le panier en session
		unset($cart[$key]); // On supprime le produit du tableau $cart
		session()->put("cart", $cart); // On enregistre le panier

		// Redirection vers le panier
		return back()->withMessage("Produit retiré du panier");
	}

	// Vider le panier
	public function empty()
	{
		// Suppression du panier en session
		session()->forget("cart");

		// Redirection 
		return back()->withMessage("Panier vidé");
	}

	public function validation(Request $request)
	{
		if (Gate::denies("access_order_validation")){
			abort(403, 'Vous n\'êtes pas connecté');
		}

		$user = User::find(auth()->user()->id);

		return view('cart/validation', ['user' => $user]);
	}

	// Ajout heure et date retrait commande
	public function creneau(Request $request)
	{
		if (Gate::denies("access_order_validation")){
			abort(403, 'Vous n\'êtes pas connecté');
		}

		$request->validate([
            'heure_retrait' => 'required|string',
            'date_retrait' => 'required|date'
        ]);
		
		session()->put("date_retrait", $request->date_retrait);
		session()->put("heure_retrait", $request->heure_retrait);

		$user = User::find(auth()->user()->id);
		return view('cart/validation', ['user' => $user])->with('message', 'Date et heure de retrait validé');
	}
}

