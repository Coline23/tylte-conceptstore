<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;300;400;500;600;700&family=Barlow:wght@100;300;400;500&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600&display=swap" rel="stylesheet">

    <!--icones-->
    <script src="https://kit.fontawesome.com/d7eb6f4634.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #D98468;">
            <div class="container-fluid">

                <!-- Left Side Of Navbar -->
                <a class="ms-5 text-end" href="#"><img src="./images/logo-tylte.png" alt="concept-store" id="logo-tylte" class="ms-auto"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#monMenu"
                    aria-controls="monMenu" aria-expanded="false" aria-label="Menu pour mobile">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="monMenu">
                    <div class="navbar-nav me-auto">
                        <a class="nav-item nav-link px-4" href="{{ route('home') }}">Accueil</a>
                        <a class="nav-item nav-link px-4" href="{{ route('concept') }}">Notre concept</a>
                        <a class="nav-item nav-link px-4" href="{{ route('espacebarjeux') }}">Espace Bar & Jeux</a>
                        <a class="nav-item nav-link px-4" href="{{ route('shop') }}">Le shop</a>
                        <a class="nav-item nav-link px-4" href="{{ route('evenements.index') }}">Nos événements</a>
                    </div>
                    <!-- Right Side Of Navbar -->
                    <div class="navbar-nav pe-4">
                        <a class="nav-item nav-link" href="{{ route('cart.show') }}"><i
                                class="fa-solid fa-basket-shopping fa-l px-2" style="color: #ffffff;"></i></a>
                        <a class="nav-item nav-link" href="{{ route('contact') }}"><i
                                class="fa-sharp fa-solid fa-comments fa-lg px-2" style="color: #ffffff;"></i></a>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-item nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                            @endif

                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                            @endif
                        @else
                            <div class="nav-item dropdown px-2">
                                <a id="nav-item navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>
                                    <i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('users.edit', $user = Auth::user()) }}"
                                        class="text-dark">Mon compte</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    <!-- affichage du lien back-office uniquement pour l'administrateur -->
                                    @if (Auth::user()->isAdmin())
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">
                                            Back-office
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
    </div>
    </a>
    </div>
    </div>
    </nav>

    <main>

        <div class="container-fluid text-center">
            @if (session()->has('message'))
                <p class="alert alert-success pt-5 mt-5" id="successMessage">{{ session()->get('message') }}</p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger pt-5 mt-5" id="errorMessage">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        @yield('content')

    </main>
    </div>

    {{-- <script>
        // *****************************************************************
        // Disparaître le message de succès après 2 secondes
        setTimeout(function() {
            $('#successMessage').fadeOut('slow');
        }, 2000);

        // Disparaître le message d'erreur après 2 secondes
        setTimeout(function() {
            $('#errorMessage').fadeOut('slow');
        }, 2000);
        // *****************************************************************
    </script> --}}

    <!--SCRIPT-->

    {{-- <script type="text/javascript">
        window.onscroll = function() {
            let navbar = document.getElementsByTagName('nav')[0]
            if (window.scrollY > 100) {
                navbar.style.backgroundColor = "#DFBBAF";
                navbar.style.boxShadow = "0 2px 4px 0 rgba(0,0,0,.2)";
                navbar.style.color = "#26316A"
            } else {
                navbar.style.backgroundColor = "";
                navbar.style.boxShadow = "";
            }
        };
    </script> --}}

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
                        <img src="{{ asset('images/logo-tylte.png') }}">
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
</body>

</html>
