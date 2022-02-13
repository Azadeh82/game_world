<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use Auth;
use App\Models\Article;


class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $commande = Commande::create([

            'prix' => $request['total'],
            'numero' => rand(1000000, 9999999),
            'user_id' => Auth::user()->id,
            'adresse_id' => session()->get("adresse")->id
            
        ]);
        
        $panier = session()->get("panier");
        foreach($panier as $article){

            $commande->articles()->attach($article["id"], ['quantite' => $article['quantite'],'reduction' => $article['reduction']]);

            // C'est 3 ligne permet de faire baisser le stock en ligne d'un produit et de l'actualiser.
            $articleInDatabase = Article::find($article['id']); //  find recupere les infos d'un article en fonction de son id
            $articleInDatabase->stock -= $article['quantite']; // je fait baisser le stock de la quantité commander (exemple 10 de stock et j'en enlève 3 ce qui fait 7)
            $articleInDatabase->save(); // je sauvegarde le nouveau stock de l'article en question dans la base pour eviter que des client achète des produit qui ne son plus en stock
        }
        
        session()->forget("panier");
        return redirect()->route('home')->with('message', "La commande à bien était valider");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
