@extends ('layouts.app')

@section('title')
    Tylte Concept Store - Détails de l'article
@endsection

@section('content')
<div class="container py-5 my-5">
    <div class="row mt-5 pt-5">
            <div class="col-md-6 mx-auto text-center p-5">
                <img class="card-img-top mx-auto text-center" style="width: 50%" src="{{ asset("images/$article->image") }}" alt="article">
            </div>
            <div class="product-commerce col-md-6 mx-auto">
                <h3 class="px-5">{{ $article->nom }}</h3>
                <p class="px-5">{{ $article->prix }} €</p>
                <p class="px-5"><i>{{ $article->description_courte }}</i></p>
                <p class="px-5">{{ $article->description_longue }}</p>

                @if ($article->stock > 0)
                    <form method="POST" action="{{ route('cart.add', $article->id) }}"
                        class="form-inline d-inline-block px-5">
                        @csrf
                        <p style="font-weight: 500">Quantité
                            <input type="number" min="1" max="9" name="quantite" class="form-control mr-2"
                                value="{{ isset(session('cart')[$article->id]) ? session('cart')[$article->id]['quantite'] : 1 }}">
                        </p>
                        <button type="submit" class="btn btn-concept">+ Ajouter au panier</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
