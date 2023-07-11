@extends ('layouts.app')

@section('title')
    Détails de la commande
@endsection

@section('content')
<thead class="thead-dark">
    <tr>
        <th scope="col">{{$commande->prix}}</th>
    </tr>
</thead>
@endsection