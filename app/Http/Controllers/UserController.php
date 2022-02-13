<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->load('adresses' , 'commandes');
        return view('user.compte' , compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()  
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , User $user) 
    {
        $validated = $request->validate([
            'nom' => ['required', 'string', 'min:3' , 'max:25'],
            'prenom' => ['required', 'string', 'min:3' , 'max:25']
        ]);
  
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->save();
        return redirect()->route('user.show' , $user)->with('message', 'Le compte a bien été modifié');

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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function resetpassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'newpassword' => ['required', 'confirmed', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()]
        ]);


        $user = Auth::user();    //recuperer les infos et mot de passe existant

        if (Hash::check($request->input('password'), $user->password))  //si actuel = saisi
        {
            if ($request->input('newpassword') !== $request->input('password')) {   //si nouveau != actuel

                $user->password = Hash::make($request->input('newpassword'));    //hasher nouveau mot de passe

                $user->save();

                return redirect()->route('user.show' , $user)->with('message', 'le mot de passe a bien été modifié');
            } else {

                return redirect()->back()->withErrors(['erreur' => 'ancien et nouveau mot de passe identiques ']);
            }
        } else {

            return redirect()->back()->withErrors(['erreur' => 'mot de passe actuel n\'est pas correct ']);
        }
    }

}