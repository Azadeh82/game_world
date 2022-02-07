<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date= date("Y-m-d");
        $promotion = Promotion::with(['articles'=>function($query){
            $query->limit(3);
        }])
        ->whereDate('date_debut', '<=' , $date)
        ->whereDate('date_fin' , '>=' , $date)
        ->get();

        if (isset($promotion[0])) {
            $promotion = $promotion[0];
        } else {
            $promotion = null;
        }

        $articleCelebity= Promotion::with('articles');

        return view('home' , compact('promotion' , 'articleCelebity'));
    }


}