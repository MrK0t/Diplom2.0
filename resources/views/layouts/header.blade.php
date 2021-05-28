<div class="py-3 mb-5 bg-dark">
    <div class="row text-light">

        <nav class="navbar navbar-expand-xl navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
            <a href="/"><img src="logo/logo.png" width="100" height="100"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse " id="navbarCollapse" style="">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="{{ route('index')}}">Home</a>
                </li>
                @auth
                    @if(Auth::User()->isAdmin === 1)
                    <a class="nav-link text-light" href="{{ route('tasks')}}">Adminka</a>
                    @endif
                    <a class="nav-link text-light" href="{{ route('profile')}}">Profile</a>
                @endauth
                @guest
                        <a class="nav-link text-light" href="{{ route('login')}}">Log in</a>
                        <a class="nav-link text-light" href="{{ route('register')}}">Sign up</a>
                @endguest
                @auth
                    <a class="nav-link text-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">Log out({{Auth::user()->name}})</a>
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