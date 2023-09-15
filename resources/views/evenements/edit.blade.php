@extends ('layouts.app')

@section('title')
    Modifier l'événement - Tylte Concept Store
@endsection

@section('content')
    <main class="container">

        <h1 class="text-center">Modification de l'événement</h1>
        <div class="row">

            <div class="col-md-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <form class="col-12 mx-auto p-5 border border-dark-subtle rounded"
                            action="{{ route('evenements.update', $evenement) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input required type="text" class="form-control" name="nom"
                                    value="{{ $evenement->nom }}" id="nom">
                            </div>

                            <input type="hidden" name="description_courte" value="{{ $evenement->description_courte }}"
                                id="description_courte">
                            <div class="form-group">
                                <label for="description_courte">Description courte</label>
                                <input required type="text" class="form-control" name="description_courte"
                                    value="{{ $evenement->description_courte }}" id="description_courte">
                            </div>

                            <input type="hidden" name="description_longue" value="{{ $evenement->description_longue }}"
                                id="description_longue">
                            <div class="form-group">
                                <label for="description_longue">Description longue</label>
                                <textarea required type="text" class="form-control" name="description_longue" id="description_longue">{{ $evenement->description_longue }}</textarea>
                            </div>

                            <div class="form-group mt-4">
                                <label class="label">Date & heure</label>
                                <div class="control">
                                    <input class="form-control" type="date" name="date"
                                        value="{{ $evenement->date }}">
                                </div>
                            </div>

                            <div class="input-group">
                                <input type="text" aria-label="heure_debut" class="form-control" name="heure_debut"
                                    value="{{ $evenement->heure_debut }}">
                                <input type="text" aria-label="heure_fin" class="form-control" name="heure_fin"
                                    value="{{ $evenement->heure_fin }}">
                            </div>

                            <div class="form-group mt-4">
                                <label class="label">Nombre de personne maximum</label>
                                <div class="control">
                                    <input class="form-control text-center" type="text" name="max_personnes"
                                        value="{{ $evenement->max_personnes }}">
                                </div>
                            </div>

                            <input type="hidden" name="nombre_inscrits" value="{{ $evenement->nombre_inscrits }}"
                                id="nombre_inscrits">
                            <div class="form-group">
                                <label for="nombre_inscrits">Nombre d'inscrits</label>
                                <input class="form-control text-center" type="text" name="nombre_inscrits"
                                    value="{{ $evenement->nombre_inscrits }}">
                            </div>

                            <button type="submit" class="btn btn-full">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endsection
