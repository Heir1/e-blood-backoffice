<!-- Start header -->
<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="{{asset('client/images/logo.png')}}" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbars-rs-food">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#"></a></li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/apropos')}}">E-blood Bank</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">Services</a>
                        {{-- <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="#">E-blood Bank</a>
                            <a class="dropdown-item" href="#">E-blood Med</a>
                            <a class="dropdown-item" href="#">E-blood Prod</a>
                        </div> --}}
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" target="_blank" href="{{ url('hospital/hospitallogin', []) }}">E-blood Connect</a>
                        {{-- <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="#">Connexion</a>
                            <a class="dropdown-item" href="#">Inscription</a>
                        </div> --}}
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{url('/contact')}}">Service clients</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">FR|EN</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-a">
                            <a class="dropdown-item" href="#">Français</a>
                            <a class="dropdown-item" href="#">Englais </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- End header -->