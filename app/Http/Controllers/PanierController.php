<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class PanierController extends Controller
{
    # Affichage du panier
    public function show () {
    	return view("panier"); // resources\views\panier\show.blade.php
    }

    # Ajout d'un produit au panier
    public function add (Article $article, Request $request) {
    
    	// Validation de la requête
    	$this->validate($request, [
    		"quantite" => "numeric|min:1"
    	]);

    	// Ajout/Mise à jour du produit au panier avec sa quantité
				
		$panier = session()->get("panier"); // On récupère le panier en session

		// Les informations du produit à ajouter
		$article_details = [
			'nom' => $article->nom,
			'prix' => $article->prix,
			'quantite' => $request->quantite
		];
		
		$panier[$article->id] = $article_details; // On ajoute ou on met à jour le produit au panier
		session()->put("panier", $panier); // On enregistre le panier
    	// Redirection vers le panier avec un message
		
    	return redirect()->route("panier.show")->withMessage("Produit ajouté au panier");
	
    }

    // Suppression d'un produit du panier
    public function remove (Article $article) {

    	// Suppression du produit du panier par son identifiant
    	$panier = session()->get("panier"); // On récupère le panier en session
		unset($panier[$article->id]); // On supprime le produit du tableau $panier
		session()->put("panier", $panier); // On enregistre le panier

    	// Redirection vers le panier
    	return back()->withMessage("Produit retiré du panier");
    }

    // Vider la panier
    public function empty () {

    	// Suppression des informations du panier en session
    	session()->forget("panier"); // On supprime le panier en session

    	// Redirection vers le panier
    	return back()->withMessage("Panier vidé");

    }

}
