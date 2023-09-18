@extends ('layouts.app')

@section('title')
Détails commande - Tylte Concept Store
@endsection

@section('content')

<h4 class="text-center p-5 pt-5 mt-5"style="font-family: Shadows Into Light, cursive; color: #26316A; font-size: 300%"> Détails commande n° {{$commande->id}}</h4>

<div class="container text-center">
    <h5>Montant : <b>{{$commande->prix}} €</b></h5>
    <br>
    <h5>Date : 
   <b>@php echo \Carbon\Carbon::parse($commande->created_at)->translatedFormat('l d F Y à H\hi') 
   @endphp</b></h5>
   <br>
</div>

<div class="container">
    <table class="table table border border-primary">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Description</th>
                <th scope="col">Quantité</th>
                <th scope="col">Prix total</th>
            </tr>
        </thead>
        @php $total = 0;  // prix total des articles sans les frais de port 
        @endphp

        @foreach ($commande->articles as $article)

        <tr>
            <td>{{$article->nom}}</td>
            
            <td>{{number_format($article->prix, 2, ',', '') . " €"; }}</td>

            <td>{{$article->description_courte}}</td>
            
            <td>{{$article->quantite}}</td>
            
            <td>
                <!-- On affiche total général -->
                <strong>@php echo (number_format($commande->prix, 2, ',', ' ') . " €") @endphp</strong>
            </td>
        </tr>
        @endforeach
    </table>

    <p class="text-center">Date et heure de retrait : <b>
        Le {{$commande->date_retrait}} à {{$commande->heure_retrait}}</b> au Concept Store Tylte directement.</p>

</div>

@endsection