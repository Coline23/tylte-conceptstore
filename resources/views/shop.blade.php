@extends('layouts.app')

@section('title')
    Tylte Concept Store - Le shop
@endsection

@section('content')

<!--ESPACE SHOP-->
<section id="espace-shop">
<div class="row">

    <div class="col-md-6">
        <img src="./images/espace-shop.webp" alt="concept-store" class="h-100" id="desc-espace">
    </div>

    <div class="col-md-6">
        <div class="desc-espace">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <h2>ESPACE SHOP</h2>
                    <p>Le but de l'espace Shop est de mettre en avant les créateurs qui se lancent et qui font du made in local. Nous proposerons également la collection Tylte blablabla.<br><br> 
                    Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.<br><br>
                    Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. </p>
                    <a href="{{ route('gammes.index') }}" class="btn btn-full">Nos univers</a>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection