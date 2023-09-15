<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventpasses = Evenement::where('date', '<',  date('Y-m-d'))->orderBy('date','desc')
                                ->get();

        $eventavenir = Evenement::where('date', '>=', date('Y-m-d'))->orderBy('date') //2022-02-09  format de date mysql
                                ->get();
        return view('evenements/index', [
            'eventpasses' => $eventpasses,
            'eventavenir' => $eventavenir
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // pas besoin car l'user ne créé pas d'event
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { // valide la création
        $request->validate([
            'nom' => 'required|min:10|max:150',
            'description_courte' => 'required|min:10|max:255',
            'description_longue' => 'required|min:50|max:500',
            'date' => 'required',
            'heure_debut' => 'required|min:2|max:5',
            'heure_fin' => 'required|min:2|max:5',
            'max_personnes' => 'required'
        ]);

        Evenement::create($request->all());
        return redirect()->route('admin.index')->with('message', 'Evénement créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
         //envoyer une vue et injecter variable dans la vue
         return view('evenements/show', ['evenement' => $evenement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        return view('evenements/edit', [
            'evenement' => $evenement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'nom' => 'required|min:10|max:150',
            'description_courte' => 'required|min:10|max:255',
            'description_longue' => 'required|min:50|max:500',
            'date' => 'required',
            'heure_debut' => 'required|min:2|max:5',
            'heure_fin' => 'required|min:2|max:5',
            'max_personnes' => 'required'
        ]);

        $evenement->update($request->except('_token'));
        return redirect()->route('admin.index')->with('message', 'Evénement mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('admin.index')->with('message', 'L\'événement a bien été supprimé');
    }
}
