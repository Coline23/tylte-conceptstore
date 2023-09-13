@extends ('layouts.app')

@section('title')
    Tylte Concept Store - Détails de l'événement
@endsection

@section('content')
<h3>{{$evenement->nom}}</h3>
<p>Date et heure : {{$evenement->date}} de {{$evenement->heure_debut}} à {{$evenement->heure_fin}}</p>
<p><i>{{$evenement->description_courte}}</i></p>
<p>{{$evenement->description_longue}}</p>
<p>Nombre de personnes max : {{$evenement->max_personnes}}</p>
<p>Nombre d'inscrits : {{$evenement->nombre_inscrits}}</p>

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
                                <button type="submit" class="btn btn-concept">Je m'inscris</button>
                                <input type="hidden" value="{{ $evenement->id }}" name="evenementId">
                            </form>
                        @endif
                    @endif
@endsection
