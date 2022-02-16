<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

use Auth;

use App\Models\Adresse;

use Illuminate\Support\Facades\Gate;




class PanierController extends Controller
{
	# Affichage du panier
	public function show()
	{
		return view("panier/panier"); // resources\views\panier\show.blade.php
	}

	# Ajout d'un produit au panier
	public function add(Article $article, Request $request)
	{

		// Validation de la requête
		$this->validate($request, [
			"quantite" => "numeric|min:1"
		]);

		$quantite = $request['quantite'];

		if ($article->stock >= $quantite) {
			// Ajout/Mise à jour du produit au panier avec sa quantité

			$panier = session()->get("panier"); // On récupère le panier en session

			// Les informations du produit à ajouter
			$article_details = [
				'nom' => $article->nom,
				'prix' => $article->prix,
				'image' => $article->image,
				'quantite' => $request->quantite,
				'id' => $article->id
			];
			if (
				isset($article->promotions[0]) && $article->promotions[0]->date_debut <= date('Y-m-d')
				&& $article->promotions[0]->date_fin >= date('Y-m-d')
			) {

				$article_details['reduction'] = $article->promotions[0]->reduction;
				$newPrice = $article->prix - $article->prix * ($article->promotions[0]->reduction / 100);
				$article_details['prix_reduit'] = $newPrice;
			} else {

				$article_details['reduction'] = 0;
			}


			$panier[$article->id] = $article_details; // On ajoute ou on met à jour le produit au panier
			session()->put("panier", $panier); // On enregistre le panier
			// Redirection vers le panier avec un message


			return redirect()->route("panier.show")->withMessage("Produit ajouté au panier");
		} else {

			return redirect()->back()->withErrors("Quantité en stock insufisante");
		}
	}





	// Suppression d'un produit du panier
	public function remove(Article $article)
	{

		// Suppression du produit du panier par son identifiant
		$panier = session()->get("panier"); // On récupère le panier en session
		unset($panier[$article->id]); // On supprime le produit du tableau $panier
		session()->put("panier", $panier); // On enregistre le panier

		// Redirection vers le panier
		return back()->withMessage("Produit retiré du panier");
	}

	// Vider la panier
	public function empty()
	{

		// Suppression des informations du panier en session
		session()->forget("panier"); // On supprime le panier en session

		// Redirection vers le panier
		return back()->withMessage("Panier vidé");
	}

	public function validation()
	{

		// Gate = un portaile soi on passe soi on passe pas !!!!!!!!!!!
		if (!Gate::allows('acceder_a_la_validation')) {   // autre syntaxe : if(Gate::denies('access_order_validation'))
			abort(403);
		}
		// On récupére les information de l'utilisateur
		$user = Auth::user();
		$user->load('adresses');

		// Redirection vers la page validation avec les informations user (compact)
		return view("panier/validation", compact('user'));
	}

	public function choixadresse(Request $request)
	{

		$choix = $request['choixadresse'];
		$adresse = Adresse::find($choix); // je recupére l'adresse entiere à partir de l'id transmi par le formulaire
		session()->put("adresse", $adresse);  // enregistre dans la session la clez et la valeur de adresse
		// session(['adresse' => $adresse]); autre possibilité
		return redirect()->route('validation')->with('message', "L'adresse de livraison a bien était modifier");
	}

	public function choixlivraison(Request $request)
	{
		$user = Auth::user();
		$user->load('adresses');

		$livraison = $request['livraison'];
		$total = $request['total'];

		switch ($livraison) {
			case "classic":
				$total += 5;
				break;
			case "express":
				$total += 9.90;
				break;
			case "relais":
				$total += 4;
				break;
		}

		// return view("validation" , compact('total', 'user', 'livraison'));
		return view('panier/validation', ['user' => $user, 'nouveautotal' => $total, 'livraison' => $livraison]);
	}
}
