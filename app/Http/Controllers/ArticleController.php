<?php

namespace App\Http\Controllers;

use App\Models\Gamme;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles/index', ['articles' => $articles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|min:5|max:30',
            'description_courte' => 'required|min:10|max:255',
            'description_longue' => 'required|min:50|max:500',
            'prix' => 'required',
            'image' => 'required|min:5|max:25',
            'stock' => 'required',
            'gamme_id' => 'required'
        ]);

        Article::create($request->all());
        return redirect()->route('admin.index')->with('message', 'Article créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
         return view('articles/show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles/edit', [
            'article' => $article,
            'gammes' => Gamme::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nom' => 'required|min:5|max:30',
            'description_courte' => 'required|min:10|max:100',
            'description_longue' => 'required|min:50|max:500',
            'prix' => 'required',
            'image' => 'required|min:5|max:25',
            'stock' => 'required',
            'gamme_id' => 'required'
        ]);

        $article->update($request->except('_token'));
        return redirect()->route('admin.index')->with('message', 'Article modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.index')->with('message', 'L\'article a bien été supprimé');
    }
}
