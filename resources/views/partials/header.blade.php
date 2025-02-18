<header class="header">
    <div class="logo">
        <img src="{{ asset('images/logolib.jpeg') }}" alt="Logo">
        <h1>Starlight Reads!</h1>
    </div>
    <nav>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li class="dropdown">
                <a href="#">Books Categories</a>
                <ul class="dropdown-menu">
                    <li><a href="">Category 1</a></li>
                    <li><a href="">Category 2</a></li>
                    <li><a href="">Category 3</a></li>
                </ul>
            </li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <div class="favorites-badge">
            <li>
                <a href="{{ route('favorites.index') }}">
                <i class="fas fa-heart"></i>  
                    <span class="badge bg-danger">
                        {{ \App\Models\Favorite::where('user_id', Auth::id())->count() }}
                    </span>
                </a>
            </li>
                <li><a href=""><i class="fas fa-shopping-cart"></i></a></li>
            </div>
        </ul>
    </nav>
    
    <div class="auth-buttons">
        @auth
            <a href="{{ url('/admin') }}" class="px-4 py-2">Admin Profile</a>
            <a href="{{ route('logout') }}" class="px-4 py-2"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="px-4 py-2">Login</a>
            <a href="{{ route('register') }}" class="px-4 py-2">Register</a>
        @endauth
    </div>

</header>
