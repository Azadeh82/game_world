<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Gamme;
use Auth;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gammes =  Gamme::with(['articles.promotions' => function ($query) {
            $query->whereDate('date_debut', '<=', date('Y-m-d'))
                ->whereDate('date_fin', '>=', date('Y-m-d'))->get();
        }])
        
        ->get();

        return view('gamme/gamme', compact('gammes'));
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

        $request->validate([

            'nom' => 'required|max:30'       
        ]);

        Gamme::create($request->all());
    
        return redirect()->route('admin.index')->with('message', 'La nouvel gamme a bien était créé');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gamme $gamme)
    {
        return view('admin/gamme', compact('gamme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gamme $gamme)
    {
        $request->validate([
            'nom' => 'required|max:30',
            
        ]);

        $gamme->update($request->except('_token',));  // methode ultra rapide pr rapport a elle juste en bas !
        // $article->nom = $request['nom'];
        // $article->image = $request['image'];
        // $article->description_courte = $request['description_courte'];
        // $article->description_longue = $request['description_longue'];
        // $article->prix = $request['prix'];
        // $article->stock = $request['stock'];
        
        $gamme->save();
        return redirect()->back()->with('message', "La gamme a bien était modifié");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->delete();
        return redirect()->route('admin.index')->with('message', 'La gamme a bien était supprimé');
    }
}
