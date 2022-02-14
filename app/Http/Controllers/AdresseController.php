<?php

namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdresseController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'adresse' => ['required', 'string', 'min:3' , 'max:255'],
            'code_postal' => ['required', 'string', 'min:5' , 'max:5'],
            'ville' => ['required', 'string', 'min:3' , 'max:20']
        ]);
        
        $user = Auth::user();
        $adresse = new Adresse();
        $adresse->user_id = $user->id;
        $adresse->adresse = $validated['adresse'];
        $adresse->code_postal = $validated['code_postal'];
        $adresse->ville = $validated['ville'];
        $adresse->save();
        return redirect()->route('user.show' , $user)->with('message', 'votre adresse a bien été ajouté');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Adresse $adresse )
    {
        $validated = $request->validate([
            'adresse' => ['required', 'string', 'min:3' , 'max:255'],
            'code_postal' => ['required', 'string', 'min:5' , 'max:5'],
            'ville' => ['required', 'string', 'min:3' , 'max:20']
        ]);
        
        $user = Auth::user();

        $adresse->user_id = $user->id;
        $adresse->adresse = $validated['adresse'];
        $adresse->code_postal = $validated['code_postal'];
        $adresse->ville = $validated['ville'];
        $adresse->user_id = $user->id;
        $adresse->save();
        return redirect()->route('user.show' , $user)->with('message', 'votre adresse a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adresse $adresse) 
    {
        $user = Auth::user();
        $adresse->delete();
        return redirect()->route('user.show' , $user)->with('message', 'votre adresse a bien été supprimé');
    }
}
