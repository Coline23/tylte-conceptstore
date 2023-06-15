<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //mettre en plac validateur pour modifier data qui ont ete saisies
        $request->validate([
            'nom' => ['required', 'string', 'min:4', 'max:25'],
            'prenom' => ['required', 'string', 'min:4', 'max:25'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'newPassword' => ['nullable', 'string', 'min:8', 'confirmed'] //nullable est facultatif
        ]);

        //on modifie les infos de l'utilisateur
        $user->nom = $request->input('nom');
        $user->prenom =  $request->input('prenom');
        $user->email =  $request->input('email');

        //delcenche que si ya un new mdp de saisi
        if ($request->newPassword) {
            $currentTypedPassword = $request->input('currentPassword'); // mdp actuel saisi (en clair)

            $currentHashedPassword = $user->password; // mdp actuel en base (hashé)
            
            $newpassword = $request->input('newPassword'); // nouveau mdp saisi (en clair)

            // test 1) : si mot de passe actuel saisi = mot de passe actuel bdd =>ok, sinon => erreur
            if (Hash::check($currentTypedPassword, $currentHashedPassword)) {

                // test 2) : si ancien et nouveau mdp différents => ok, sinon => erreur
                if ($currentTypedPassword !== $newpassword) {

                    $user->password = Hash::make($newpassword); // on remplace l'ancien mdp par le nouveau (que l'on hashe)
                } else {
                    return redirect()->route('users.edit')->withErrors(['password_error', 'Ancien et nouveau mot de passe identiques !']);
                }
            } else {
                return redirect()->route('users.edit')->withErrors(['password_error', 'Mot de passe actuel saisi incorrect !']);
            }
        }

        // on sauvegarde les changements en bdd
        $user->save();

        // on redirige sur la page précédente
        return back()->with('message', 'Le compte a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // on vérifie que c'esrt bien l'utilisateur connecté qui fait la demande de suppression
        // (les id doivent être identiques)
        if (Auth::user()->id == $user->id) {
            $user->delete();                    // on réalise la suppression
            return redirect()->route('home')->with('message', 'Le compte a bien été supprimé');
        } else {
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible']);
        }
    }
}
