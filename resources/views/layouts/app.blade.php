<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/images/logo.png" alt="logo" id ="logo" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                   
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item ">
                            <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('home') }}">{{ __('ACCUEIL') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('article.index') }}">{{ __('CATALOGUE') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('gamme.index') }}">{{ __('GAMMES') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('promotion.index') }}">{{ __('PROMOTIONS') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('populaires') }}">{{ __('LES PLUS POPULAIRES') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('panier.show') }}">{{ __('PANIER') }}</a>
                        </li>
                        

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('login') }}">{{ __('Connecter') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif

                        @else

                             <li class="nav-item">
                                <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('favori.index') }}">{{ __('MES FAVORIS') }}</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link fw-bolder fs-5 text-light" href="{{ route('user.show',  $user = auth()->user()->id) }}">{{ __('COMPTECLIENT') }}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    @if (auth()->user()->role_id == 2)
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                        Back-office
                                    </a>
                                @endif

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container w-50 text-center p-3">

            @if (session()->has('message'))
                <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<footer class="d-flex mx-auto justify-content-center align-items-center mt-5" >
    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-facebook  mx-md-5"  viewBox="0 0 16 16" style="color: #fff" >
        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-youtube " viewBox="0 0 16 16"  style="color: #fff">
        <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
    </svg>
</footer>
</html>
