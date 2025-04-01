<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>
    <link rel="stylesheet" href="{{ asset('build/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
    <header class="home-header">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

</body>
<script>
gsap.registerPlugin(ScrollTrigger);

// Hiệu ứng cho tiêu đề và mô tả trên hero section
gsap.from(".hero h1, .hero h2, .hero p", {
    opacity: 0,
    y: 50, // Di chuyển từ dưới lên
    duration: 1,
    ease: "power3.out",
    stagger: 0.3
});

// Hiệu ứng cho các destination card khi cuộn trang
gsap.from(".destination-card", {
    scrollTrigger: {
        trigger: ".destination-card",
        start: "top 80%", // Khi nào kích hoạt
        toggleActions: "play none none none"
    },
    opacity: 0,
    y: 50, // Di chuyển từ dưới lên
    duration: 1.2,
    ease: "power2.out",
    stagger: 0.2
});

// Hiệu ứng cho các service cards khi cuộn trang
gsap.from(".services .service-card", {
    scrollTrigger: {
        trigger: ".services",
        start: "top 75%",
        toggleActions: "play none none none"
    },
    opacity: 0,
    scale: 0.8, // Thu nhỏ và phóng to
    duration: 1.2,
    ease: "elastic.out(1, 0.5)",
    stagger: 0.3
});

// Hiệu ứng cho explore section
gsap.from(".explore-grid img", {
    scrollTrigger: {
        trigger: ".explore",
        start: "top 75%",
        toggleActions: "play none none none"
    },
    opacity: 0,
    y: 50, // Di chuyển từ dưới lên
    duration: 1.2,
    ease: "power3.out",
    stagger: 0.2
});

</script>
</html>
