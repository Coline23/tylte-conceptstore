@extends('layouts.app')

@section('title')
    Tylte Concept Store
@endsection

@section('content')
<header class="d-flex justify-content-center align-items-center">

    <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #D98468;">

        <div class="container">
            <a class="navbar-brand" href="#">Concept Store <br>Tylte</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#monMenu"
                aria-controls="monMenu" aria-expanded="false" aria-label="Menu pour mobile">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="monMenu">
                <div class="navbar-nav ms-auto">
                    <a class="nav-item nav-link" href="#menu-acc">ACCUEIL</a>
                    <a class="nav-item nav-link" href="index-espaces.html">NOS ESPACES</a>
                    <a class="nav-item nav-link" href="">NOS ÉVÉNEMENTS</a>
                    <a class="nav-item nav-link" href="index-contact.html">CONTACT</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row home-title">
            <div class="col-md-12 center-block">
                <h1 class="fw-bold">FAIR-PLAY AVEC <br>LA NATURE.</h1>
                <a href="#le-concept" class="btn btn-full">DÉCOUVREZ TYLTE</a>
                <a href="#team" class="btn btn-full">NOTRE TEAM</a>

            </div>
        </div>
    </div>

</header>

<div class="logo-tylte">
    <img src="./images/logo-tylte-sanstxt-moitie.png" alt="logo-tylte">
</div>

<!--LE CONCEPT-->
<section id="le-concept">
    <div class="row">

        <div class="col-md-6">
            <div class="desc-concept">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <h2>LE CONCEPT</h2>
                        <p>Ce qui fait “tilt” est par essence quelque chose qui frappe l’esprit, attire l’attention
                            de quelqu’un. Un mot, un sourire, une voix, un visage, on a tous eu un jour quelque
                            chose qui a fait “tilt” dans notre tête. <br><br> 
                            C’est aussi l’esprit du jeu : le flipper, les fléchettes, mais aussi la nature, un
                            terrain de jeu immense. C’est ainsi qu’en 2019 Tylte a émergé de nos têtes… Il a bien
                            évolué en 3 ans & deviendra un concept-store.<br><br>
                            Mêlant à la fois le sport, un espace bar & jeux et un coin shop, le pilier central sera
                            le respect de l’environnement. Avec du local et rien que du local. </p>
                        <a href="index-pdeux.html" class="btn btn-concept">NOS ESPACES</a>
                        <a href="" class="btn btn-concept">NOS ÉVÉNEMENTS</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <img src="./images/img-concept.png" alt="concept-store" class="h-100" id="desc-concept">
        </div>
    </div>
</section>

<!--LA TEAM-->
<section class="la-team" id="team">
    <div class="container">
        <h2 class="w-50 p-3 mx-auto">LA TEAM</h2>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="details-team">
                    <img src="./images/profil-guibouOK.png">
                    <h4>Guillaume <br>aka Guibou</h4>
                    <p>Guibou c'est du made in Lyon. Après avoir bougé pendant quelques années avec Coco, il est
                        revenu dans la région pour kiffer la nature, le dénivelé & les montagnes : le sport c'est la
                        vie ! Pur produit financier, au fond de lui il a toujours rêvé d'avoir son truc à lui. Ses
                        potes et de la montagne, what else ?!</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="details-team">
                    <img src="./images/profil-juOK.png">
                    <h4>Julien <br>aka Ju</h4>
                    <p>Ju c'est du made in Le Mans. Pur produit de l'ouest, il n'y a jamais vraiment bougé mais kiff
                        voyager & voir du paysage. Vrai artiste dans l'âme, architecte au quotidien, il ne se
                        déplace plus sans son compagnon le drône. Lui aussi a toujours rêvé de se lancer dans une
                        aventure comme celle de Tylte, alors zé partiii ! </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="details-team">
                    <img src="./images/profil-cocoOK.png">
                    <h4>Coline <br>aka Coco 5</h4>
                    <p>Coco c'est du made in Yaute (74). La montagne ça la gagne (même si secrètement elle a
                        toujours rêvé de vivre au bord de l'océan). Elle a aussi eu la bougeotte depuis quelques
                        années avant de revenir aux sources et kiffer la nature.Elle n'attend qu'une chose, c'est de
                        se lancer avec ses potes pour quitter le train train quotidien !</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 w-50 p-3 mx-auto text-center">
                <a href=""><button class="btn btn-full mx-auto">CONTACTEZ-NOUS</button></a>
            </div>
        </div>
    </div>
</section>

<!--FOOTER-->
<footer>
    <div class="container">

        <div class="row">
            <div class="col-md-4">
                <div class="details-contact">
                    <h4>CONTACT</h4>
                    <p>tylteclothes@gmail.com</p>
                    <p>0688230928</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="details-marque">
                    <img src="./images/logo-tylte.png">
                    <p>© 2022 Concept Store Tylte</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="details-rs">
                    <h4>RÉSEAUX SOCIAUX</h4>
                    <a href="" class="icon-rs"><i class="fa-brands fa-facebook fa-2x"></i></a>
                    <a href="" class="icon-rs"><i class="fa-brands fa-instagram fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
