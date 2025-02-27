<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">
</head>

<body>
    <header>
        <nav>
            <div class="logo">
            </div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            <a href="{{ route('login') }}">
                <button class="login-btn">Login</button>
            </a>
        </nav>
        <div class="hero">
            <h1>Helping Others</h1>
            <h2>LIVE & TRAVEL</h2>
            <p>Special offers to suit you</p>
            <div class="search-bar">
                <input type="text" placeholder="Flights">
                <input type="text" placeholder="Hotels">
                <input type="date">
                <input type="text" placeholder="Passengers, Economy">
                <button>Search</button>
            </div>
        </div>
    </header>
    <section class="destinations">
        <h2>Plan your perfect trip</h2>
        <p>Affordable flights & hotels from our most popular destinations</p>
        <a href="#" class="view-more">View more places</a>
        <div class="destination-grid">
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination1.png') }}" alt="Destination 1">
                <div class="text-content">
                    <h3>Seoul, Sydney</h3>
                    <p>Flights - Hotels</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination2.png') }}" alt="Destination 2">
                <div class="text-content">
                    <h3>Sydney, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination3.png') }}" alt="Destination 3">
                <div class="text-content">
                    <h3>Bali, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination3.png') }}" alt="Destination 3">
                <div class="text-content">
                    <h3>Bali, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination3.png') }}" alt="Destination 3">
                <div class="text-content">
                    <h3>Bali, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination3.png') }}" alt="Destination 3">
                <div class="text-content">
                    <h3>Bali, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination3.png') }}" alt="Destination 3">
                <div class="text-content">
                    <h3>Bali, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination3.png') }}" alt="Destination 3">
                <div class="text-content">
                    <h3>Bali, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
            <div class="destination-card">
                <img src="{{ asset('build/assets/img/destination3.png') }}" alt="Destination 3">
                <div class="text-content">
                    <h3>Bali, Australia</h3>
                    <p>Flights - Hotels - Resorts</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="services">
        <div class="service-card">
            <img src="{{ asset('build/assets/img/flights.png') }}" alt="Flights">
            <div class="content">
                <h3>Flights</h3>
                <p>Search Flights & Make Low Price Offers</p>
                <button>Show Flights</button>
            </div>
        </div>
        <div class="service-card">
            <img src="{{ asset('build/assets/img/hotels.png') }}" alt="Hotels">
            <div class="content">
                <h3>Hotels</h3>
                <p>Search Flights & Make Low Price Offers</p>
                <button>Show Hotels</button>
            </div>
        </div>
    </section>
    
    <section class="explore">
        <h2>Explore new worlds with exotic natural scenery</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua.</p>
        <div class="explore-grid">
            <img src="{{ asset('build/assets/img/explore1.png') }}" alt="Explore 1">
            <img src="{{ asset('build/assets/img/explore2.png') }}" alt="Explore 2">
            <img src="{{ asset('build/assets/img/explore3.png') }}" alt="Explore 3">
        </div>
    </section>

    @include('layouts.footer')
    
</body>

</html>
