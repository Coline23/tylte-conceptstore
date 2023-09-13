@extends ('layouts.app')

@section('title')
    Tylte Concept Store - Les événements
@endsection

@section('content')
    <header class="d-flex justify-content-center align-items-center"
        style="background-image: linear-gradient(rgba(205, 209, 228, 0.3), rgba(205, 209, 228, 0.3)), url('images/events-cover.jpg'); height: 80vh;">
        <div class="container d-flex align-items-end">
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
            <h2>ÉVÉNEMENTS À VENIR</h2>
            <div class="container">
                <div class="row">
                    @foreach ($eventavenir as $evenement)
                        <div class="card card-margin text-center col-md-3 col-lg-4 p-1 m-2\">
                            <div class="row
                            p-5 justify-content-center">
                            <div class="card-header no-border">
                                <h5 class="card-title">{{ $evenement->nom }}</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-primary">
                                            <span class="widget-49-date-day">
                                                @php
                                                    $datetime = DateTime::createFromFormat('Y-m-d', $evenement->date);
                                                    echo $datetime->format('d');
                                                @endphp
                                            </span>
                                            <span class="widget-49-date-month">
                                                @php
                                                    $datetime = DateTime::createFromFormat('Y-m-d', $evenement->date);
                                                    echo $datetime->format('M y');
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title">{{ $evenement->description_courte }}</span>
                                            <span class="widget-49-meeting-time">{{ $evenement->heure_debut }} -
                                                {{ $evenement->heure_fin }}</span>
                                        </div>
                                    </div>
                                    <div class="widget-49-meeting-points">
                                        <a
                                            class="widget-49-meeting-item"><span>{{ $evenement->description_longue }}</span></a>
                                    </div>
                                    <div class="widget-49-meeting-action">
                                        <a href="{{ route('evenements.show', $evenement) }}"
                                            class="btn btn-sm btn-flash-border-primary">Voir le détail</a>
                                    </div>
                                </div>
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
            <h2>ÉVÉNEMENTS PASSÉS</h2>
            <div class="container">
                <div class="row">
                    @foreach ($eventpasses as $evenement)
                        <div class="card card-margin text-center col-md-3 col-lg-4 p-1 m-2\">
                            <div class="row
                            p-5 justify-content-center">
                            <div class="card-header no-border">
                                <h5 class="card-title">{{ $evenement->nom }}</h5>
                            </div>
                            <div class="card-body pt-0">
                                <div class="widget-49">
                                    <div class="widget-49-title-wrapper">
                                        <div class="widget-49-date-primary">
                                            <span class="widget-49-date-day">
                                                @php
                                                    $datetime = DateTime::createFromFormat('Y-m-d', $evenement->date);
                                                    echo $datetime->format('d');
                                                @endphp
                                            </span>
                                            <span class="widget-49-date-month">
                                                @php
                                                    $datetime = DateTime::createFromFormat('Y-m-d', $evenement->date);
                                                    echo $datetime->format('M y');
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="widget-49-meeting-info">
                                            <span class="widget-49-pro-title">{{ $evenement->description_courte }}</span>
                                            <span class="widget-49-meeting-time">{{ $evenement->heure_debut }} -
                                                {{ $evenement->heure_fin }}</span>
                                        </div>
                                    </div>
                                    <ol class="widget-49-meeting-points">
                                        <li class="widget-49-meeting-item">
                                            <span>{{ $evenement->description_longue }}</span>
                                        </li>
                                    </ol>
                                    <div class="widget-49-meeting-action">
                                        <a href="{{ route('evenements.show', $evenement) }}"
                                            class="btn btn-sm btn-flash-border-primary">Voir le détail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection
