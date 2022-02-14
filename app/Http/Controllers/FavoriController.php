<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;


class FavoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $user = User::find(auth()->user()->id); //trouver user avec son id

        $user->load('favoris'); //charger ses favoris 

        if(count($user->favoris)>0){

             return view('favori.index' , compact('user'));

        }else{

            return redirect()->back()->withErrors(['erreur' => 'vous n\'avez pas d\'article dans favoris']);
 
        }
        
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

        $user = User::find(auth()->user()->id);
        
        $user->favoris()->attach($request['articleId']); 

        return redirect()->back()->with('message', 'votre article a bien ajouté aux favoris');
        
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
    public function destroy(Request $request)
    {
        $articleId = $request->input('articleId');

        $user = User::find(auth()->user()->id);
        
        $user->favoris()->detach($articleId); 

        if (count($user->favoris) > 0){

                 return redirect()->back()->with('message', 'Article supprimé des favoris');

        } else {

            return redirect()->route('home')->with('message', 'Article supprimé des favoris');
        }
    }
}
