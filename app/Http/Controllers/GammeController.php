<?php

namespace App\Http\Controllers;

use App\Models\Gamme;
use Illuminate\Http\Request;

class GammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gammes = Gamme::with('articles')->get();
        return view('gammes/index', [
            'gammes' => $gammes,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:5|max:30',
        ]);

        Gamme::create(['nom'=>$request->nom]);

        return redirect()->route('admin.index')->with('message', 'Gamme créée avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gamme $gamme)
    {
        return view('gammes/edit', ['gamme' => $gamme]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gamme $gamme)
    {
        $request->validate([
            'nom' => 'required|min:5|max:30',
        ]);

        $gamme->update($request->all());
        return redirect()->route('admin.index')->with('message', 'Gamme modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gamme $gamme)
    {
        $gamme->load('articles');
        foreach ($gamme->articles as $article) {
            $article->delete();
        }
        $gamme->delete();

        return redirect()->route('admin.index')->with('message', 'La gamme a bien été supprimée');
    }
}
