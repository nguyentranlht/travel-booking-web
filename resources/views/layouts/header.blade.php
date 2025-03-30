<header class="header navbar">
    <div class="left-section">
        @auth
            @if(auth()->user()->role === 'user' || auth()->user()->role === 'tour_rider')
                <a href="{{ route('tours.home') }}" class="find-flight">Find Tour</a>
                <a href="#" class="find-stays">Find Stays</a>
            @endif
        @endauth
    </div>

    <div class="logo">
        <img src="{{ asset('build/assets/img/logo.png') }}" alt="Logo">
    </div>

    <div class="right-section user-menu">
        @auth
            @if (auth()->user()->role === 'user' || auth()->user()->role === 'tour_rider')
                <a href="{{ route('user.liked.tours') }}" class="favorite-icon">
                    <img src="{{ asset('build/assets/img/heart-icon.png') }}" alt="Favorites">
                </a>
            @endif
            <div class="dropdown">
                <button class="dropbtn">{{ auth()->user()->first_name }} ▼</button>
                <div class="dropdown-content">
                    @if (auth()->user()->role === 'user' || auth()->user()->role === 'tour_rider')
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @endif
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
