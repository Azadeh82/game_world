<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;

use App\Models\Promotion;

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
        //
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
        return view('admin/article', compact('promotion'));
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
            'reduction' => 'required|max:99'|'numeric',
            'date_debut' => 'required|max:10',
            'date_fin' => 'required|max:10',
         
        ]);

        $promotion->update($request->except('_token',));  // method ultra rapide pr rapport a elle juste en bas !
        
        $promotion->save();
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
