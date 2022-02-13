<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles =  Article::with(['promotions' => function ($query) {
            $query->whereDate('date_debut', '<=', date('Y-m-d'))
                ->whereDate('date_fin', '>=', date('Y-m-d'))->get();
        }])
 
        
        ->get();
        return view('article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // affiche le formulaire d'une creation d'un element
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // créer l'article
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article) // afficher un article en particulier (afficher une ressource unique)
    {
        return view('detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin/article', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => 'required|max:30',
            'image' => 'required|max:30',
            'description_courte' => 'required|max:60',
            'description_longue' => 'required|max:1000',
            'prix' => 'required|numeric',
            'stock' => 'required|max:100|numeric',
         
        ]);

        $article->update($request->except('_token',));  // method ultra rapide pr rapport a elle juste en bas !
        // $article->nom = $request['nom'];
        // $article->image = $request['image'];
        // $article->description_courte = $request['description_courte'];
        // $article->description_longue = $request['description_longue'];
        // $article->prix = $request['prix'];
        // $article->stock = $request['stock'];
        
        $article->save();
        return redirect()->back()->with('message', "L'article a bien était modifié");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('index')->with('message', "L'article a bien était supprimé");
    }
}
