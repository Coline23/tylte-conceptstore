@extends('layouts.app')

@section('title')
    Tylte Concept Store - Espace Bar & Jeux
@endsection

@section('content')
<header class="d-flex justify-content-center align-items-center" style="background-image: linear-gradient(rgba(205, 209, 228, 0.3), rgba(205, 209, 228, 0.3)), url('./images/nos-espaces-header.png'); height: 90vh;">
    <div class="container h-50 d-flex align-items-end">
    <div class="row home-title py-5 h-50">

        <div class="col-md-6 offset-md-6 mb-4 mt-5">
            <div class="intro-espaces bg-white mx-3 my-2 px-5 py-4">
                <h2>ESPACE BAR & JEUX</h2>
                <p>Venez déguster nos bières et notre petite restauration à base de produits locaux tout en passant un bon moment autour de jeux de société captivants ...</p>
            </div>
        </div>
    </div>
</div>

</header>

<!--ESPACE BAR&JEUX-->
<section id="espace-bar">
<div class="row">

    <div class="col-md-6 mx-auto">
        <div class="desc-espace">
            <div class="row">
                <div class="col-md-12 ms-auto pt-5">
                    <h2 class="pb-5">Espace Bar <br>& Petite restauration</h2>
                    <p>Le bar Tylte vous propose : six tireuses à bière en libre-service, un large choix de bières en bouteille, des vins originaux, des sodas bio, des jus de fruits, des sirops et des boissons chaudes éthiques.</p>
                    <p class="p-5">En cas de petite faim, nous vous proposons différentes tapas avec des fromages et charcuteries de Haute Savoie, sans oublier les tapas végétariennes.</p>
                    <a href="./images/carte-bar.pdf" class="btn btn-concept" target="_blank" >LA CARTE DU BAR</a>
                    <a href="./images/carte-cafe.pdf" class="btn btn-concept" target="_blank" >LA CARTE DU CAFÉ</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <img src="./images/img-concept.png" alt="concept-store" class="h-100" id="desc-espace">
    </div>
</div>
</section>

<!--ESPACE BAR-->
<section id="espace-shop">
<div class="row">

    <div class="col-md-6">
        <img src="./images/espace-barjeux.webp" alt="concept-store" class="h-100" id="desc-espace">
    </div>

    <div class="col-md-6">
        <div class="desc-espace">
            <div class="row">
                <div class="col-md-12 ms-auto">
                    <h2>Les jeux</h2>
                    <p>Ici vous trouverez plus de 500 jeux de société de tout type, pour jouer entre amis, en famille, en couple ou même avec de nouveaux joueurs... Tous nos jeux sont référencés sur le site, il ne vous reste plus qu'à choisir ! </p>
                </div>
                <div id="carouselExampleAutoplaying" class="carousel slide mx-auto" style="width: 50%" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="./images/azul-jeu.jpeg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./images/7-wonders-jeu.jpeg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./images/splendor-jeu.jpeg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="./images/citadelles-jeu.jpeg" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection