@extends('layouts.app')
@section('content')
    <div class="container text-center">
        @if (session()->has('cart'))
            <h1 class="p-4 mt-5 pt-5" style="font-family: Shadows Into Light, cursive; color: #26316A; font-size: 300%">Valider ma commande </h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('cart') -->
                        @foreach (session('cart') as $key => $item)
                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                            @if (count($item) > 0)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong><a href="{{ route('articles.show', $key) }}"
                                                title="Afficher le produit">{{ $item['nom'] }}</a></strong>
                                    </td>
                                    <td>{{ $item['prix'] }} €</td>
                                    

                                    <td>{{ $item['quantite'] }}</td>
                                    <td>
                                        <!-- Le total du produit = prix * quantité -->
                                        @php
                                                $lineTotal = $item['prix'] * $item['quantite'];
                                        @endphp
                                        @php
                                            echo number_format($lineTotal, 2, ',', ' ') . ' €';
                                            $total += $lineTotal;
                                        @endphp
                                    </td>
                                </tr>
                            @endif
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
            <div class="container w-50 text-center p-4">
                <a class="btn btn-success" href="{{ route('cart.validation') }}" title="validation">Valider la
                    commande</a>
                <a class="btn btn-danger" href="{{ route('cart.empty') }}" title="Retirer tous les produits du panier">Vider
                    le panier</a>
            @else
                <div class="alert alert-info">Aucun produit dans le panier</div>
        @endif
    </div>


    <h4 class="text-center p-3">Mes informations</h4>

    <div class="row pb-3">
        <div class="col-6 offset-3 text-center">
            <form class="col-12 mx-auto p-5 border border-success rounded" action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input required type="text" class="form-control" name="prenom" value="{{ $user->prenom }}"
                        id="prenom">
                </div>
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input required type="text" class="form-control" name="nom" value="{{ $user->nom }}"
                        id="nom">
                </div>
                <input type="hidden" name="email" value="{{ $user->email }}" id="email">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input required type="email" class="form-control" name="email" value="{{ $user->email }}"
                        id="email">
                </div>
                <button type="submit" class="btn btn-success text-light mt-4">Modifier</button>
            </form>
        </div>
    </div>


    <!--Click collect-->
    <h3 class="p-3">Créneau pour le click & collect</h3>
    <form method="post" action="{{ route('cart.creneau') }}" class="mb-4">
        @csrf
        <div class="form-group">
            <input type="date" name="date_retrait" id="date_retrait" min="{{date("Y-m-d")}}" @if (session()->has('date_retrait')) value="{{session()->get('date_retrait')}}" @endif>
            <label for="date_retrait">Date</label>
        </div>

        <div class="form-floating p-3">
            <select class="form-select" id="heure_retrait" name="heure_retrait" aria-label="Floating label select example">
              <option selected>Choisissez votre heure de retrait</option>
              <option value="12h" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='12h') selected @endif>12h</option>
              <option value="12h30" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='12h30') selected @endif>12h30</option>
              <option value="13h" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='13h') selected @endif>13h</option>
              <option value="13h30" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='13h30') selected @endif>13h30</option>
              <option value="14h" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='14h') selected @endif>14h</option>
              <option value="17h" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='17h') selected @endif>17h</option>
              <option value="17h30" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='17h30') selected @endif>17h30</option>
              <option value="18h" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='18h') selected @endif>18h</option>
              <option value="18h30" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='18h30') selected @endif>18h30</option>
              <option value="19h" @if (session()->has('heure_retrait') && session()->get('heure_retrait')=='19h') selected @endif>19h</option>
            </select>
            <label for="heure_retrait">Works with selects</label>
          </div>
        <button type="submit" class="btn btn-success">Valider</button>
    </form>

        <h3 class="pt-5 pb-3 fw-bold">Total à payer : {{ $total }} €</h3>
        <form method="post" action="{{ route('commandes.store') }}">
            @csrf
            <input type="hidden" value="{{ $total }}" name="total">
            <button type="submit" class="btn btn-success btn-lg">Valider la commande</button>
        </form>
    </div>
@endsection