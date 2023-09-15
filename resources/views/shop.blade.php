@extends('layouts.app')

@section('title')
    Tylte Concept Store - Le shop
@endsection

@section('content')

<!--ESPACE SHOP-->
<section id="espace-shop mt-5 pt-5">
<div class="row">

    <div class="col-md-6">
        <img src="./images/espace-shop.webp" alt="concept-store" class="h-100" id="desc-espace">
    </div>

    <div class="col-md-6">
        <div class="desc-espace">
            <div class="row">
                <div class="col-md-12 mx-auto p-5 mt-5 pt-5">
                    <h2>ESPACE SHOP</h2>
                    <p>Le but de l'espace Shop est de mettre en avant les créateurs qui se lancent et qui font du made in local. Nous proposerons également la collection Tylte, en collaboration avec l'un des créateurs, Julien, pour des t-shirts 100% made in Europe.<br><br> 
                        Nous vous proposerons une sélection soigneusement choisie de vêtements, d'accessoires et même d'articles de décoration ou de jeux, le tout dans un environnement pensé pour refléter la van life, la nature et l'outdoor.</p>
                    <a href="{{ route('gammes.index') }}" class="btn btn-full">Nos univers</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection