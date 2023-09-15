@extends('layouts.app')

@section('title')
    Tylte Concept Store - Tous les articles
@endsection

@section('content')
    <h1 class='mt-5 pt-5 text-center' style="font-family: Shadows Into Light, cursive; color: #26316A; font-size: 300%">Tous les articles</h1>

    <div class="container ranges">
        <div class="row">
            <div class="container p-5">
                <div class="container">
                    <div class="row">
                        @foreach ($articles as $article)
                            <div class="text-center col-md-4 col-lg-3 p-3">
                                <div class="card text-center">
                                <img class="card-img-top" src="{{ asset("images/$article->image") }}" alt="article">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                                    <p class="card-text font-italic">{{ $article->description }}</p>
                                    <a href="{{ route('articles.show', $article) }}" class="btn btn-full">Détails
                                        produit</a>

                                    @php $articleId = $article->id @endphp

                                    @php $articleId = $article->id @endphp


                                    @if ($article->stock > 0)
                                        <form method="POST" action="{{ route('cart.add', $article) }}"
                                            class="form-inline d-inline-block">
                                            @csrf
                                            <input type="number" min="1" max="9" name="quantite"
                                                class="form-control mr-2"
                                                value="{{ isset(session('cart')[$article->id]) ? session('cart')[$article->id]['quantite'] : 1 }}">
                                            <button type="submit" class="btn btn-concept">+ Ajouter au panier</button>
                                        </form>
                                    @endif

                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
