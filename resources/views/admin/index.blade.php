@extends('layouts.app')

@section('title')
    Back-office - Tylte Concept Store
@endsection

@section('content')
    <script>
        let nomsTableaux = ['articlesForm', 'rangesForm', 'evenementsForm', 'articlesList', 'rangesList', 'evenementsList', 'usersList']

        function showElement(elementId) {

            nomsTableaux.forEach(element => { // nom du tableau 
                document.getElementById(element).style.display = 'none'
            });

            let element = document.getElementById(elementId);

            // écriture ternaire
            element.style.display == "block" ? element.style.display = "none" : element.style.display = "block";

            // autre écriture
            // if (element.style.display == "block" ){
            //     element.style.display = "none" p
            // } else {
            //     element.style.display = "block"
            // }
        }
    </script>

    <div class="container text-center pt-3 mb-3">
        <h1 class="pb-5">Back-office</h1>
        <div class="row mb-3 justify-content-around">
            <button class="btn btn-lg btn-primary" onclick="showElement('articlesForm')">Créer un article</button>
            <button class="btn btn-lg btn-primary" onclick="showElement('rangesForm')">Créer une gamme</button>
            <button class="btn btn-lg btn-primary" onclick="showElement('evenementsForm')">Créer un événement</button>
        </div>
        <div class="row justify-content-around">
            <button class="btn btn-lg btn-secondary" onclick="showElement('articlesList')">Liste des articles</button>
            <button class="btn btn-lg btn-secondary" onclick="showElement('rangesList')">Liste des gammes</button>
            <button class="btn btn-lg btn-secondary" onclick="showElement('evenementsList')">Liste des événéments</button>
            <button class="btn btn-lg btn-secondary" onclick="showElement('usersList')">Liste des utilisateurs</button>
        </div>

        <!-- Créer un article -->

        <div class="container w-50 p-5" style="display:none" id="articlesForm">
            <h3>Créer un article</h3>
            <form method="post" action="{{ route('articles.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input required type="text" class="form-control" name="nom" value="" id="nom">
                </div>
                <div class="form-group">
                    <label for="description_courte">Description courte</label>
                    <input required type="text" class="form-control" name="description_courte" value=""
                        id="description_courte">
                </div>
                <div class="form-group">
                    <label for="description_longue">Description longue</label>
                    <input required type="text" class="form-control" name="description_longue" value=""
                        id="description_longue">
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input required type="number" class="form-control" name="prix" id="number" step="0.01">
                </div>
                <div class="form-group row mt-4">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{_('Image')}}</label>
                    <div class="col-md-6">
                        <input type="file" name="image" class="form-control">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input required type="text" class="form-control" name="stock" value="" id="stock">
                </div>
                <div class="form-group">
                    <label for="gamme_id">Gamme</label>
                    <select name="gamme_id" id="gamme_id">
                        <option value="">--Choisissez une gamme--</option>
                        @foreach ($gammes as $gamme)
                            <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-info text-light mt-4">Valider</button>
            </form>
        </div>

        <!-- Liste des articles -->

        <div class="container p-5" style="display:none" id="articlesList">
            <h3 class="mb-3">Liste des articles</h3>

            <table class="table table-info">
                <thead class="thead-dark">
                    <th>Nom</th>
                    <th>description courte</th>
                    <th>image</th>
                    <th>prix</th>
                    <th>stock</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </thead>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->nom }}</td>
                        <td>{{ $article->description }}</td>
                        <td>{{ $article->image }}</td>
                        <td>{{ $article->prix }}</td>
                        <td>{{ $article->stock }}</td>
                        <td><a href="{{ route('articles.edit', $article) }}"><button
                                    class="btn btn-warning">Modifier</button></a></td>
                        <td>
                            <form method="post" action="{{ route('articles.destroy', $article) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


        <!-- Créer une gamme -->

        <div class="container w-50 p-5" style="display:none" id="rangesForm">
            <h3>Créer une gamme</h3>
            <form method="post" action="{{ route('gammes.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">nom</label>
                    <input required type="text" class="form-control" name="nom" value="" id="nom">
                </div>
                <button type="submit" class="btn btn-info text-light mt-4">Valider</button>
            </form>
        </div>


        <!-- Liste des gammes -->

        <div class="container w-50 p-5" style="display:none" id="rangesList">
            <h3 class="mb-3">Liste des gammes</h3>

            <table class="table table-info">
                <thead class="thead-dark">
                    <th>id</th>
                    <th>nom</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </thead>
                @foreach ($gammes as $gamme)
                    <tr>
                        <td>{{ $gamme->id }}</td>
                        <td>{{ $gamme->nom }}</td>
                        <td><a href="{{ route('gammes.edit', $gamme) }}"><button
                                    class="btn btn-warning">Modifier</button></a></td>
                        <td>
                            <form method="post" action="{{ route('gammes.destroy', $gamme) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <!-- Créer un événement -->

        <div class="container w-50 p-5" style="display:none" id="evenementsForm">
            <h3 class="mb-3">Créer un événement</h3>
            <form method="post" action="{{ route('evenements.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input required type="text" class="form-control" name="nom" value="" id="nom">
                </div>
                <div class="form-group">
                    <label for="description_courte">Description courte</label>
                    <input required type="text" class="form-control" name="description_courte" value=""
                        id="description_courte">
                </div>
                <div class="form-group">
                    <label for="description_longue">Description longue</label>
                    <textarea required type="text" class="form-control" name="description_longue" value=""
                        id="description_longue"></textarea>
                </div>
                <div class="form-group mt-4">
                    <label class="label">Date & heure</label>
                    <div class="control">
                        <input required type="date" class="form-control" name="date">
                    </div>
                </div>

                <div class="input-group">
                    <input required type="text" aria-label="heure_debut" class="form-control" name="heure_debut">
                    <input required type="text" aria-label="heure_fin" class="form-control" name="heure_fin">
                </div>

                <div class="form-group mt-4">
                    <label for="max_personnes">Nombre de personnes max</label>
                    <input required type="text" class="form-control" name="max_personnes" value="" id="max_personnes">
                </div>
                
                <button type="submit" class="btn btn-info text-light mt-4">Valider</button>
            </form>
        </div>

        <!-- Liste des événements -->

        <div class="container p-5" style="display:none" id="evenementsList">
            <h3 class="mb-3">Liste des événements</h3>

            <table class="table table-info">
                <thead class="thead-dark">
                    <th>Nom</th>
                    <th>description courte</th>
                    <th>description longue</th>
                    <th>date</th>
                    <th>heure de début</th>
                    <th>heure de fin</th>
                    <th>nombre de personnes max</th>
                    <th>modifier</th>
                    <th>supprimer</th>
                </thead>
                @foreach ($evenements as $evenement)
                    <tr>
                        <td>{{ $evenement->nom }}</td>
                        <td>{{ $evenement->description_courte }}</td>
                        <td>{{ $evenement->description_longue }}</td>
                        <td>{{ $evenement->date }}</td>
                        <td>{{ $evenement->heure_debut }}</td>
                        <td>{{ $evenement->heure_fin }}</td>
                        <td>{{ $evenement->max_personnes }}</td>
                        <td><a href="{{ route('evenements.edit', $evenement) }}"><button
                                    class="btn btn-warning">Modifier</button></a></td>
                        <td>
                            <form method="post" action="{{ route('evenements.destroy', $evenement) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- Liste des utilisateurs -->

        <div class="container p-5" style="display:none" id="usersList">
            <h3 class="mb-3">Liste des utilisateurs</h3>

            <table class="table table-info">
                <thead class="thead-dark">
                    <th>id</th>
                    <th>nom</th>
                    <th>prénom</th>
                    <th>pseudo</th>
                    <th>e-mail</th>
                    <th>rôle</th>
                    <th>supprimer</th>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->pseudo }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role->role }}</td>
                        <td>
                            <form method="post" action="{{ route('users.destroy', $user) }}">
                                @csrf
                                @method('delete')
                                <input type="hidden" value="{{ $user->id }}" name="userId">
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
