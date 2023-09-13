@extends('layouts.app')

@section('title')
    Tylte Concept Store - Les univers
@endsection

@section('content')
<div class="container-fluid text-center mb-4">
    <img class="w-75 border border-primary" src="{{ asset('images/ranges.jpg') }}" alt="gammes">
</div>

<h1 class='pb-5 text-center'>Nos différents univers</h1>

<div class="container ranges">
    <div class="row">

        @foreach ($gammes as $gamme)

            <div class="container p-5">
                <div class="row p-5 justify-content-center">
                    <h2>{{ $gamme->nom }}</h2>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($gamme->articles as $article)
                            <div class="card text-center col-md-4 col-lg-3 p-3 m-3\" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset("images/$article->image") }}" alt="article">
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{ $article->nom }}</h5>
                                    <p class="card-text font-italic">{{ $article->description }}</p>

                                    <a href="{{ route('articles.show', $article) }}">
                                        <button class="btn btn-full">Détails produit</button>
                                    </a>

                                    @php $articleId = $article->id @endphp

                                    @php $articleId = $article->id @endphp


                                    @if ($article->stock > 0)
                                        <form method="POST" action="{{ route('cart.add', $article->id) }}"
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
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container text-center">
    <a href="{{ route('articles.index') }}" class="btn btn-full">Voir tous les articles</a>
</div>

@endsection