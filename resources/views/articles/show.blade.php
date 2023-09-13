@extends ('layouts.app')

@section('title')
    Tylte Concept Store - Détails de l'article
@endsection

@section('content')
    <h3>{{ $article->nom }}</h3>
    <p>{{ $article->prix }} €</p>
    <p><i>{{ $article->description_courte }}</i></p>
    <p>{{ $article->description_longue }}</p>

    @if ($article->stock > 0)
        <form method="POST" action="{{ route('cart.add', $article->id) }}" class="form-inline d-inline-block">
            @csrf
            <input type="number" min="1" max="9" name="quantite" class="form-control mr-2"
                value="{{ isset(session('cart')[$article->id]) ? session('cart')[$article->id]['quantite'] : 1 }}">
            <button type="submit" class="btn btn-concept">+ Ajouter au panier</button>
        </form>
    @endif
@endsection
