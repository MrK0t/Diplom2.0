<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="/maincss2.0.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
    

<body>
<div class="py-3 bg-dark" style="margin-bottom: 80px;" >
    <div class="row">

        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-light">
            <div class="container-fluid">
            <a href="/"><img src="/logo/logo.svg" width="100" height="100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse " id="navbarCollapse" style="">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="{{ route('index')}}">Главная</a>
                </li>
                @auth
                    @if(Auth::User()->isAdmin === 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Администрирование
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="Администрирование">
                            <li><a class="dropdown-item" href="{{ route('rooms.index')}}">Номера</a></li>
                            <li><a class="dropdown-item" href="{{ route('categories.index')}}">Категории</a></li>
                            <li><a class="dropdown-item" href="{{ route('types.index')}}">Типы</a></li>
                            <li><a class="dropdown-item" href="{{ route('buildings.index')}}">Корпуса</a></li>
                            <li><a class="dropdown-item" href="{{ route('orders.index')}}">Бронирования</a></li>
                        </ul>
                    </li>
                    @endif
                    <a class="nav-link text-dark" href="{{ route('profile.index')}}">Профиль</a>
                @endauth
                @guest
                    <a class="nav-link text-dark" href="{{ route('login')}}">Вход</a>
                    <a class="nav-link text-dark" href="{{ route('register')}}">Регистрация</a>
                @endguest
                @auth
                    <a class="nav-link text-dark" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Выход({{Auth::user()->name}})</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
                </ul>
            </div>
            </div>
        </nav>

        
    </div>
</div>

@yield('content')

</body>
</html>