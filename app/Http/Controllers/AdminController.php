<?php

namespace App\Http\Controllers;

use App\Models\Gamme;

use App\Models\Article;

use App\Models\Promotion;

use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Gate::denies('acceder_au_back_office')) { // méthode 2 restriction accès : via Gate 
            abort(403);                          // autre syntaxe : if(!Gate::allows('acceder_au_back_office'))
        }

        $gammes = Gamme::all();
        $articles = Article::all();
        $promotions = Promotion::all();
        return view('admin/index', compact('gammes', 'articles', 'promotions'));
    }

    
}