<header class="header navbar">
    <div class="left-section">
        <a href="#" class="find-flight">Find Flight</a>
        <a href="#" class="find-stays">Find Stays</a>
    </div>
    <div class="logo">
        <img src="{{ asset('build/assets/img/logo.png') }}" alt="Logo"> 
    </div>
    <div class="right-section user-menu">
        @auth
            <a href="#" class="favorite-icon">
                <img src="{{ asset('build/assets/img/heart-icon.png') }}" alt="Favorites">
            </a>
            <div class="dropdown">
                <button class="dropbtn">{{ Auth::user()->first_name }} ▼</button>
                <div class="dropdown-content">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}" class="login">Login</a>
            <a href="{{ route('register') }}" class="signup">Sign up</a>
        @endauth
    </div>
</header>
