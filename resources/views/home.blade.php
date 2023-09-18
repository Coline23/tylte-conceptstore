@extends('layouts.app')

@section('title')
    Tylte Concept Store
@endsection

@section('content')

<!--HEADER-->
<header class="d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(205, 209, 228, 0.3), rgba(205, 209, 228, 0.3)), url('images/test-header2.png');">
<div>
    <div class="container">
        <div class="row home-title">
            <div class="col-md-12 center-block">
                <h1 class="fw-bold">FAIR-PLAY AVEC <br>LA NATURE.</h1>
                <a href="{{ route('concept') }}" class="btn btn-full">DÉCOUVREZ TYLTE</a>
                <a href="{{ route('concept') }}" class="btn btn-full">NOTRE TEAM</a>

            </div>
        </div>
    </div>
</div>
</header>

<div class="logo-tylte">
    <img src="{{ asset ('images/logo-tylte-sanstxt-moitie.png') }}" alt="logo-tylte">
</div>

<!--QUI SOMMES NOUS-->
<section class="enbref" id="enbref">
    <div class="container">
        <h2 class="w-50 p-3 mx-auto">En bref...</h2>
        <div class="row">
            <div class="col-md-12">
                <p>Ce qui fait “tilt” est par essence quelque chose qui frappe l’esprit, attire l’attention de quelqu’un. Un mot, un sourire, une voix, un visage, on a tous eu un jour quelque chose qui a fait “tilt” dans notre tête. C’est aussi l’esprit du jeu : le flipper, les fléchettes, mais aussi la nature, un terrain de jeu immense. C’est ainsi qu’en 2019 Tylte a émergé de nos têtes… Il a bien évolué en 3 ans & deviendra un concept-store.</p>
                <p>Mêlant à la fois le sport, un espace bar & jeux et un coin shop, le pilier central sera le respect de l’environnement. Avec du local et rien que du local. L’objectif de ce concept store est de mettre en avant la nature via le prisme d’une passion & mixer 2 attraits multi-générationnels et populaires afin de toucher et intéresser un large public. 
                </p>
            </div>
        </div>
        </div>

        <div class="row">
            <div class="p-3 mx-auto text-center">
                <a href="{{ route('contact') }}"><button class="btn btn-full mx-auto">CONTACTEZ-NOUS</button></a>
            </div>
        </div>
    </div>
</section>
@endsection
