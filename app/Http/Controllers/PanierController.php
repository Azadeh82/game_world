<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\PanierInterfaceRepository;

use App\Models\Article;

class PanierController extends Controller
{

	protected $panierRepository; // L'instance panierSessionRepository

    public function __construct (PanierInterfaceRepository $panierRepository) {
    	$this->panierRepository = $panierRepository;
    }

    # Affichage du panier
    public function show () {
    	return view("panier.show"); // resources\views\panier\show.blade.php
    }

    # Ajout d'un produit au panier
    public function add (Article $article, Request $request) {
    	
    	// Validation de la requête
    	$this->validate($request, [
    		"quantity" => "numeric|min:1"
    	]);

    	// Ajout/Mise à jour du produit au panier avec sa quantité
    	$this->panierRepository->add($article, $request->quantity);

    	// Redirection vers le panier avec un message
    	return redirect()->route("panier.show")->withMessage("Produit ajouté au panier");
    }

    // Suppression d'un produit du panier
    public function remove (Article $article) {

    	// Suppression du produit du panier par son identifiant
    	$this->panierRepository->remove($article);

    	// Redirection vers le panier
    	return back()->withMessage("Produit retiré du panier");
    }

    // Vider la panier
    public function empty () {

    	// Suppression des informations du panier en session
    	$this->panierRepository->empty();

    	// Redirection vers le panier
    	return back()->withMessage("Panier vidé");

    }

}
