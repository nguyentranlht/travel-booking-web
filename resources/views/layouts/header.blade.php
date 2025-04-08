<header class="navbar navbar-expand-lg shadow-sm custom-navbar">
    <div class="container">
        <!-- Left Section (Find Tour) -->
        <div class="d-flex align-items-center left-section">
            @auth
                @if(auth()->user()->role === 'user' || auth()->user()->role === 'tour_rider')
                    <a href="{{ route('tours.home') }}" class="btn btn-outline-primary find-tour-btn" data-aos="fade-right">
                        <i class="fas fa-map-marker-alt"></i> Find Tour
                    </a>
                @endif
            @endauth
        </div>

        <!-- Logo (Centered) -->
        <a class="navbar-brand mx-auto logo-container" href="{{ route('tours.home') }}" data-aos="zoom-in">
            <img src="{{ asset('build/assets/img/logo.png') }}" alt="Logo" class="logo-img">
        </a>

        <!-- Right Section (User Menu) -->
        <div class="d-flex align-items-center right-section">
            @auth
                @if (auth()->user()->role === 'user' || auth()->user()->role === 'tour_rider')
                    <a href="{{ route('user.liked.tours') }}" class="btn btn-light favorite-btn" data-aos="fade-left">
                        <i class="fas fa-heart text-danger"></i>
                    </a>
                @endif
                
                <!-- Dropdown Menu -->
                <div class="dropdown" data-aos="fade-left">
                    <button class="btn btn-outline-secondary dropdown-toggle user-dropdown-btn" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->first_name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        @if (auth()->user()->role === 'user' || auth()->user()->role === 'tour_rider')
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="fas fa-user"></i> Dashboard</a></li>
                        @endif
                        <li>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Hidden Logout Form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary me-2 login-btn" data-aos="fade-left">
                    <i class="fas fa-sign-in-alt"></i> Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-primary signup-btn" data-aos="fade-left">
                    <i class="fas fa-user-plus"></i> Sign Up
                </a>
            @endauth
        </div>
    </div>
</header>

<style>

.logo-img {
    height: 50px;
    transition: transform 0.3s ease-in-out;
}

.logo-img:hover {
    transform: scale(1.1);
}

.left-section {
    position: absolute;
    left: 20px;
}

.right-section {
    position: absolute;
    right: 20px;
}

</style>