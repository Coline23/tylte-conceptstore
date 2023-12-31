@extends('layouts.app')
@section('content')
    <div class="container">
        @if (session()->has('cart'))
            <h1 class="p-4 pt-5 mt-5" style="font-family: Shadows Into Light, cursive; color: #26316A; font-size: 300%">Mon panier</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Description</th>
                            <th>Quantité</th>
                            <th>Prix total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('cart') -->
                        @foreach (session('cart') as $cle => $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <strong><a href="{{ route('articles.show', $cle) }}"
                                            title="Afficher le produit">{{ $article['nom'] }}</a></strong>
                                </td>

                                <td>{{ $article['description_courte'] }}</td>
                                <td>
                                    <!-- Le formulaire de mise à jour de la quantité -->
                                    <form method="POST" action="{{ route('cart.add', $cle) }}"
                                        class="form-inline d-inline-block">
                                        @csrf
                                        <input type="number" min="1" max="9" name="quantite"
                                            value="{{ $article['quantite'] }}" class="form-control m-2"
                                            style="width: 80px">
                                        <input type="submit" class="btn btn-outline-success btn-sm" value="Actualiser" />
                                        <!-- Le Lien pour retirer un produit du panier -->
                                    <a href="{{ route('cart.remove', $cle) }}" class="btn btn-outline-danger btn-sm"
                                    title="Retirer le produit du panier">Retirer</a>
                                    </form>
                                </td>
                                <td>
                                    <!-- Le total du produit = prix * quantité -->
                                    
                                        @php
                                        $lineTotal = $article['prix'] * $article['quantite'];
                                        echo number_format($lineTotal, 2, ',', ' ') . ' €';
                                        $total += $lineTotal;
                                    @endphp
                                </td>
                            </tr>
                        @endforeach
                        <tr colspan="2">
                            <td colspan="4">Total général</td>
                            <td colspan="2">
                                <!-- On affiche total général -->
                                <strong>@php echo (number_format($total, 2, ',', ' ') . " €") @endphp</strong>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="container w-50 text-center">
                
                @if (Auth::check())
                    <!-- Lien pour valider le panier -->
                    <a class="btn btn-success" href="{{ route('validation') }}" title="validation">Valider la
                        commande</a>
                @else
                    <p class="p-2">Vous devez être connecté pour valider la commande.</p>
                @endif
                <!-- Lien pour vider le panier -->
                <a class="btn btn-danger" href="{{ route('cart.empty') }}"
                    title="Retirer tous les produits du panier">Vider le panier</a>

            </div>
        @else
            <div class="container p-5 m-3">
                <div class="alert alert-info m-5 text-center">Aucun produit dans le panier</div>
            </div>
        @endif
    </div>
@endsection