@extends ('layouts.app')

@section('title')
    Tylte Concept Store - Les événements
@endsection

@section('content')
    <header class="d-flex justify-content-center align-items-center"
        style="background-image: linear-gradient(rgba(205, 209, 228, 0.3), rgba(205, 209, 228, 0.3)), url('images/events-cover.jpg'); height: 85vh;">
        <div class="container d-flex align-items-end mt-5">
            <div class="row home-title py-5 h-50">

                <div class="col-md-6 offset-md-6 mb-4 mt-5">
                    <div class="intro-espaces bg-white my-4 px-5 py-4">
                        <h2>NOS ÉVÉNEMENTS</h2>
                        <p>Depuis le début de l'aventure Tylte, les événements prennent une place primordiale dans notre
                            quotidien. <br>Ateliers, sorties tests matériel, ceux avec lesquels nous tissont un lien de
                            partenariat, les événements sont toujours un temps fort qui permettent de créer de beaux
                            souvenirs. <br>Retrouvez-nous à de nombreuses occasions pour partager quelques bons moments
                            autour d’un apéro 100% local et convivial !</p>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!--EVENT A VENIR-->
    <section>
        <div class="container-fluid text-center mb-4">
            <h2 class="p-4" style="font-family: Shadows Into Light, cursive; color: #26316A; font-size: 300%">ÉVÉNEMENTS À
                VENIR</h2>
            <div class="container">
                <div class="row">
                    @foreach ($eventavenir as $evenement)
                        <div class="text-center col-md-4 col-lg-3 p-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title pb-2">{{ $evenement->nom }}</h5>
                                    <p class="card-text">{{ substr($evenement->description_longue, 0, 100) }}...</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ substr($evenement->description_courte, 0, 25) }}...</li>
                                    <li class="list-group-item">@php
                                        $datetime = DateTime::createFromFormat('Y-m-d', $evenement->date);
                                        echo $datetime->format('d M y');
                                    @endphp</li>
                                    <li class="list-group-item">{{ $evenement->heure_debut }} - {{ $evenement->heure_fin }}
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <a href="{{ route('evenements.show', $evenement) }}" class="btn btn-full">Voir le
                                        détail</a>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>

    <!--EVENT PASSES-->
    <section>

        <div class="container-fluid text-center mb-4">
            <h2 class="p-4 border-top border-primary"
                style="font-family: Shadows Into Light, cursive; color: #26316A; font-size: 300%">ÉVÉNEMENTS
                PASSÉS</h2>
            <div class="container">
                <div class="row">
                    @foreach ($eventpasses as $evenement)
                        <div class="text-center col-md-4 col-lg-3 p-3">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title pb-2">{{ $evenement->nom }}</h5>
                                    <p class="card-text">{{ substr($evenement->description_longue, 0, 100) }}...</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ substr($evenement->description_courte, 0, 25) }}...</li>
                                    <li class="list-group-item">@php
                                        $datetime = DateTime::createFromFormat('Y-m-d', $evenement->date);
                                        echo $datetime->format('d M y');
                                    @endphp</li>
                                    <li class="list-group-item">{{ $evenement->heure_debut }} - {{ $evenement->heure_fin }}
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <a href="{{ route('evenements.show', $evenement) }}" class="btn btn-full">Voir le
                                        détail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
