@extends ('layouts.app')

@section('title')
    Mon compte
@endsection

@section('content')
    <main class="container">

        <h1>Mon compte</h1>
        <div class="row">

            <div class="col-md-6">

                <h4 class="text-center p-4">Mes informations</h4>

                <div class="row">
                    <div class="col-10 offset-1 text-center">
                        <form class="col-12 mx-auto p-5 border border-info" action="{{ route('users.update',$user) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input required type="text" class="form-control" name="prenom"
                                    value="{{ $user->prenom }}" id="prenom">
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input required type="text" class="form-control" name="nom" value="{{ $user->nom }}"
                                    id="nom">
                            </div>
                            <input type="hidden" name="email" value="{{ $user->email }}" id="email">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required type="email" class="form-control" name="email"
                                    id="email">
                            </div>

                            <div class="form-group mt-4">
                                <label class="label">Mot de passe actuel</label>
                                <div class="control">
                                    <input class="form-control" type="password" name="currentPassword">
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('currentPassword') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="label">Nouveau mot de passe</label>
                                <div class="control">
                                    <input class="form-control" type="password" name="newPassword">
                                </div>
                                @if ($errors->has('password'))
                                    <p class="help is-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="label">Confirmez le mot de passe</label>
                                <div class="control">
                                    <input class="form-control" type="password" name="newPassword_confirmation">
                                </div>
                                @if ($errors->has('password_confirmation'))
                                    <p class="help is-danger">{{ $errors->first('password_confirmation') }}</p>
                                @endif
                                @if ($errors->has('password_error'))
                                    <p class="help is-danger">{{ $errors->first('password_error') }}</p>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-info text-light mt-4">Modifier</button>
                        </form>
                    </div>
                </div>

            </div>
    </div>

    <h4 class="text-center pt-5"> Mes commandes</h4>

    @if (isset($user->commandes) && count($user->commandes) > 0)
        <div class="container">
            <table class="table table border border-primary">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">numéro</th>
                        <th scope="col">prix</th>
                        <th scope="col">date</th>
                        <th scope="col">détails</th>
                    </tr>
                </thead>
                @foreach ($user->commandes as $commande)
                    <tr>
                        <td>{{ $commande->numero }}</td>
                        <td>{{ $commande->prix }}</td>
                        <td>
                            @php echo \Carbon\Carbon::parse($commande->created_at)->translatedFormat('l d F Y à H\hi');
                            @endphp</td>
                        <td>
                            <form action="{{ route('commandes.show', $commande) }}" method="get">
                                <button type="submit" class="btn btn-primary">Détails</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <p class="text-center p-5"> Vous n'avez pas encore passé de commande.</p>
    @endif

    <h4 class="text-center pt-5">Mes événements</h4>

    <div class="container">
        <div class="row">

            @if (isset($user->reservations) && count($user->reservations) > 0)
                @foreach ($user->reservations as $evenement)

                    <div class="card text-center col-md-4 col-lg-3 p-3 m-3\" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $evenement->nom }}</h5>
                            <p class="card-text font-italic">{{ $evenement->description_courte }}</p>
                            <a href="{{ route('evenements.show', $evenement) }}">
                                <button class="btn btn-info m-2">Détails événement</button>
                            </a>

                            <form method="post" action="{{ route('reservations.destroy', $evenement->id) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger m-2">Annnuler l'inscription</button>
                                <input type="hidden" value="{{ $evenement->id }}" name="evenementId">
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="container text-center">
                    <p class="text-center p-5"> Vous n'avez pas encore participé à d'événement.</p>
                </div>
            @endif

            <div class="container text-center">
            <form action="{{route('users.destroy', $user)}}" method="post">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-danger">Supprimer mon compte</button>
            </form>
            </div>

@endsection
