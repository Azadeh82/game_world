<?php

namespace App\Http\Controllers;

use App\Models\Gamme;

use App\Models\Article;

use App\Models\Promotion;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gammes = Gamme::all();
        $articles = Article::all();
        $promotions = Promotion::all();
        return view('admin/index', compact('gammes', 'articles', 'promotions'));
    }

}