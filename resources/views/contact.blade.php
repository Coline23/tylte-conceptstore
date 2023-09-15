@extends('layouts.app')

@section('title')
    Tylte Concept Store - Contact
@endsection

@section('content')
<section class="contactez-nous pt-5 mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="wrapper">
                    <div class="row no-gutters justify-content-between">
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="info-wrap w-100 p-5">
                                <h3 class="mb-4 text-white">Contactez-nous</h3>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker" style="color: antiquewhite"></span>
                                    </div>
                                    <div class="text pl-4">
                                        <p class="text-white"><span>Addresse :</span> 175 rue de la Nature 74330 Into The Wild</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone" style="color: antiquewhite"></span>
                                    </div>
                                    <div class="text pl-4">
                                        <p class="text-white"><span>Téléphone : 06 88 23 09 28</span></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-paper-plane" style="color: antiquewhite"></span>
                                    </div>
                                    <div class="text pl-4">
                                        <p class="text-white"><span>Email : tylteclothes@gmail.com</span></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-globe" style="color: antiquewhite"></span>
                                    </div>
                                    <div class="text pl-4">
                                        <p class="text-white"><span>Site internet : Vous êtes dessus ;)</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4 text-white">Get in touch</h3>
                                <div id="form-message-warning" class="mb-4"></div>
                                {{-- <div id="form-message-success" class="mb-4">
                                    Your message was sent, thank you!
                                </div> --}}
                                <form method="POST" id="contactForm" name="contactForm">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject"
                                                    id="subject" placeholder="Subject">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message"
                                                    cols="30" rows="5" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Envoyer un message"
                                                    class="btn btn-success mt-4">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection