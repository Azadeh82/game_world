<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

use App\Models\Promotion;

use Validator;

use App\Models\Article;



class PromotionController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $promotions = Promotion::whereDate('date_fin', '>=',  date('Y-m-d'))->orderBy('date_debut')->get();

        return view('promotion.index' , compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // on a la view create ici pour faire apres la creation dans store oui, oui pas besoin de réflechir !
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

        $request->validate([

            'nom' => 'required|max:50',
            'reduction' => 'required|max:99|numeric',
            'date_debut' => 'required|max:10|date',
            'date_fin' => 'required|max:10|date',
        ]);

        $promotion = new Promotion;
        $promotion->nom = $request['nom'];
        $promotion->reduction = $request['reduction'];
        $promotion->date_debut = $request['date_debut'];
        $promotion->date_fin = $request['date_fin'];
        $promotion->save();

        // $campagne = Campagne::create($request->all()); ligne simplifier (et donc faire le fillable)

        $articles = Article::all();

        for ($i = 1; $i < count($articles); $i++) {

            if (isset($request['article' . $i])) {
                $promotion->articles()->attach([$articles[$i]->id]);
            }
        }

        return redirect()->route('index')->with('message', 'La nouvel promotion a bien était créé');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        $articles = Article::all();
        $promotion->load('articles');
        return view('admin/promotion', compact('promotion', 'articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'nom' => 'required|max:50',
            'reduction' => 'required|max:99|numeric',
            'date_debut' => 'required|max:10',
            'date_fin' => 'required|max:10',

        ]);
        // on sauvegarde les modifications issues du formulaire
        $promotion->update($request->all());

        // on charge les articles associés à la promotion$promotion
        $promotion->load('articles');

        // on les retire de la table intermédiaire
        foreach ($promotion->articles as $article) {
            $promotion->articles()->detach($article);
        }

        // on récupère la liste des articles
        $articles = Article::all();

        // on associe à la promotion$promotion ceux cochés dans le formulaire
        // for ($i = 1; $i < count($articles); $i++) {
        //     if (isset($request['article' . $i])) {
        //         $promotion->articles()->attach([$articles[$i]->id]);
        //     }
        // }

        foreach ($articles as $article) {
            if (isset ($request['article' . $article->id])){
                $promotion->articles()->attach([$article->id]);
            }
        }

        return redirect()->back()->with('message', "La promotion a bien était modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('index')->with('message', "La promotion a bien était supprimé");
    }
}
