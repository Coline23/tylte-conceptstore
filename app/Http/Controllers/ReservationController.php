<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Evenement;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $user->load('reservations');
        return view('user/edit', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $evenementId = $request->input('evenementId');
        $user = User::find(auth()->user()->id);
        $user->reservations()->attach($evenementId);

        $evenement = Evenement::find($request->input('evenementId'));
        $evenement->nombre_inscrits+=1;
        $evenement->save();

        return redirect()->back()->with('message', 'Vous êtes bien inscrit pour l\'événement !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $evenementId = $request->input('evenementId');
        $user = User::find(auth()->user()->id);
        $user->reservations()->detach($evenementId);
        return redirect()->back()->with('message', 'Votre réservation pour l\'événement est annulée !');
    }
}
