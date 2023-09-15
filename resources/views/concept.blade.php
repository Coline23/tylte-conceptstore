@extends('layouts.app')

@section('title')
    Tylte Concept Store - Notre concept
@endsection

@section('content')
    <!--LE CONCEPT-->
    <section id="le-concept">
        <div class="row">

            <div class="col-md-6 mt-5 pt-5">
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
                            <p><b>Concrètement ça veut dire quoi ?</b>
                                <br>Du sport : Des sorties outdoor (running, trail, randonnée…) alliant le plaisir & la
                                    sensibilisation à l’environnement + protection de la nature.<br><br>
                                L’espace Bar & Jeux : des boissons locales et une petite restauration avec uniquement
                                    des produits locaux/régionaux pour la partie Bar — quelques petits jeux de société, un
                                    jeu de fléchettes et un flipper (obligé quand on s’appelle Tylte) — des ateliers
                                    afterwork en mode DIY en partenariat avec des experts et/ou associations.<br>
                                <br>Le coin shop : la promotion de vêtements made in France, à travers des marques qui
                                    luttent contre le changement climatique et enfin, notre propre collection de t-shirts
                                    (dans un premier temps), fair-play avec la nature.
                            </p>
                            <p><b>Et l’objectif dans tout ça ?</b><br>
                                L’objectif de ce concept store est de mettre en avant la nature via le prisme d’une passion
                                & mixer 2 attraits multi-générationnels et populaires afin de toucher et intéresser un large
                                public.</p>
                            </p>
                            <a href="{{ route('espacebarjeux') }}" class="btn btn-concept">NOS ESPACES</a>
                            <a href="{{ route('evenements.index') }}" class="btn btn-concept">NOS ÉVÉNEMENTS</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <img src="{{ asset('images/img-concept.png') }}" alt="concept-store" class="h-100" id="desc-concept">
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
                        <img src="{{ asset('images/profil-guibouOK.png') }}">
                        <h4>Guillaume <br>aka Guibou</h4>
                        <p>Guibou c'est du made in Lyon. Après avoir bougé pendant quelques années avec Coco, il est
                            revenu dans la région pour kiffer la nature, le dénivelé & les montagnes : le sport c'est la
                            vie ! Pur produit financier, au fond de lui il a toujours rêvé d'avoir son truc à lui. Ses
                            potes et de la montagne, what else ?!</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="details-team">
                        <img src="{{ asset('images/profil-juOK.png') }}">
                        <h4>Julien <br>aka Ju</h4>
                        <p>Ju c'est du made in Le Mans. Pur produit de l'ouest, il n'y a jamais vraiment bougé mais kiff
                            voyager & voir du paysage. Vrai artiste dans l'âme, architecte au quotidien, il ne se
                            déplace plus sans son compagnon le drône. Lui aussi a toujours rêvé de se lancer dans une
                            aventure comme celle de Tylte, alors zé partiii ! </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="details-team">
                        <img src="{{ asset('images/profil-cocoOK.png') }}">
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
                    <a href="{{ route('contact') }}"><button class="btn btn-full mx-auto">CONTACTEZ-NOUS</button></a>
                </div>
            </div>
        </div>
    </section>
@endsection
