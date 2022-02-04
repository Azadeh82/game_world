<?php

namespace App\Repositories;

use App\Models\Article;

interface BasketInterfaceRepository {

	// Afficher le panier
	public function show();

	// Ajouter un produit au panier
	public function add(Article $product, $quantity);

	// Retirer un produit du panier
	public function remove(Article $product);

	// Vider le panier
	public function empty();

}

?>