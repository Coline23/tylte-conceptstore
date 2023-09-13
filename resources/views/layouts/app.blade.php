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
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@100;300;400;500;600;700&family=Barlow:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@600&display=swap" rel="stylesheet">

    <!--icones-->
    <script src="https://kit.fontawesome.com/d7eb6f4634.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #D98468;">
            <div class="container">
                    
                    <!-- Left Side Of Navbar -->
                    <a class="navbar-brand" href="#">Concept Store <br>Tylte</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#monMenu"
                aria-controls="monMenu" aria-expanded="false" aria-label="Menu pour mobile">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Right Side Of Navbar -->
                    <div class="collapse navbar-collapse" id="monMenu">
                        <div class="navbar-nav ms-auto">
                            <a class="nav-item nav-link" href="{{ route('home') }}">Accueil</a>
                            <a class="nav-item nav-link" href="{{ route('concept') }}">Notre concept</a>
                            <a class="nav-item nav-link" href="{{ route('espacebarjeux') }}">Espace Bar & Jeux</a>
                            <a class="nav-item nav-link" href="{{ route('shop') }}">Le shop</a>
                            <a class="nav-item nav-link" href="{{ route('evenements.index') }}">Nos événements</a>
                            <a class="nav-item nav-link" href="{{ route('cart.show') }}"><i class="fa-solid fa-basket-shopping fa-xl" style="color: #ffffff;"></i></a>
                            <a class="nav-item nav-link" href="{{ route('contact') }}"><i class="fa-sharp fa-solid fa-comments fa-xl" style="color: #ffffff;"></i></a>
                            <a class="nav-item nav-link">
                                <div class="dropdown">
                                    <i class="fa-solid fa-user fa-xl" style="color: #ffffff;"></i>
                                <div class="dropdown-content">
                                
                    <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                                </li>
                            @endif
                        
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a href="{{ route('users.edit', $user = Auth::user()) }}">Mon compte</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
                    <p class="alert alert-success" id="successMessage">{{ session()->get('message') }}</p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger" id="errorMessage">
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

    <script>
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
    </script>

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

    <script type="text/javascript">
        window.onscroll = function () {
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
    </script>

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
                    <img src="{{ asset ('images/logo-tylte.png') }}">
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
