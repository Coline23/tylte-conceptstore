@extends ('layouts.app')

@section('title')
    Tylte Concept Store - Détails de l'événement
@endsection

@section('content')
<div class="pt-5 mt-5">
<h3 class="px-5">{{$evenement->nom}}</h3>
<p class="px-5">Date et heure : {{$evenement->date}} de {{$evenement->heure_debut}} à {{$evenement->heure_fin}}</p>
<p class="px-5"><i>{{$evenement->description_courte}}</i></p>
<p class="px-5">{{$evenement->description_longue}}</p>
<p class="px-5">Nombre de personnes max : {{$evenement->max_personnes}}</p>
<p class="px-5">Nombre d'inscrits : {{$evenement->nombre_inscrits}}</p>

@if (auth()->user() !== null)
                        @if (Auth::user()->isInReservation($evenement))
                            <!-- si inscrit à l'évent-->
                            <form method="post" action="{{ route('reservations.destroy', $evenement->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-full">Me désinscrire</button>
                            </form>
                        @else
                            <!-- si pas inscrit à l'évent-->
                            <form method="post" action="{{ route('reservations.store') }}">
                                @csrf
                                <button type="submit" class="btn btn-concept" style="margin-left: 45px; margin-bottom: 100px">Je m'inscris</button>
                                <input type="hidden" value="{{ $evenement->id }}" name="evenementId">
                            </form>
                        @endif
                    @endif
</div>
@endsection
