<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
</head>
<body style="background-color: #f1f2f6;">
<nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color: #06111c;">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Designer Plateform') }} --}}
            <img src="{{ asset('dist/images/logo.png') }}" alt="" style="width: 40px; height: 50px;">
        </a>
        @if(Auth::user())
            <a href="{{ url('/home') }}" class="nav-link text-light">
                Dashboard
            </a>
            <a href="{{ url('/post') }}" class="nav-link text-light">
                Mes Postes
            </a>
        @endif
        <a href="{{ url('/affiche') }}" class="nav-link text-light">
            Tous les Postes
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary text-light"
                           href="{{ route('login') }}">{{ __('Connexion') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a style="margin-left: 1em;" class="nav-link btn btn-success text-light"
                               href="{{ route('register') }}">{{ __('Inscription') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="/logout" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<br><br>

<div class="container">
    <div class="row gap-y">


        @foreach($posts as $post)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card card-hover-shadow" data-postId="{{ $post->id }}">
                    <a href=""><img class="card-img-top" src="uploads/post/{{$post->image}}"
                                    alt="Card image cap"></a>
                    <div class="card-block">
                        <h4 class="card-title text-center">{{$post->name}}</h4>
                        <p class="card-text text-center">{{$post->description}}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

</div>

</body>
<script src="{{ asset('dist/js/jquery.min.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
</html>