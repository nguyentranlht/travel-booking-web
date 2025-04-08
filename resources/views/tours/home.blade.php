@extends('layouts.app')

@section('content')
<body>
    <!-- Search Bar -->
    <div class="container mt-5">
        <div class="search-bar p-3 shadow-lg rounded bg-white" data-aos="fade-up">
            <div class="row g-2 align-items-center">
                <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Enter Destination">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-2">
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>1 room, 2 guests</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">
                        <i class="fas fa-search"></i> Show Places
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Searches -->
    <section class="recent-searches text-center mt-5">
        <h2 data-aos="fade-up">Your Recent Searches</h2>
        <div class="search-list d-flex justify-content-center gap-3 mt-3" data-aos="fade-up" data-aos-delay="200">
            <span class="badge bg-light text-dark px-3 py-2 shadow-sm">Istanbul, Turkey</span>
            <span class="badge bg-light text-dark px-3 py-2 shadow-sm">Sydney, Australia</span>
            <span class="badge bg-light text-dark px-3 py-2 shadow-sm">Baku, Azerbaijan</span>
            <span class="badge bg-light text-dark px-3 py-2 shadow-sm">Malé, Maldives</span>
        </div>
    </section>

    <!-- Travel Destinations -->
    <section class="travel-destinations text-center mt-5">
        <div class="container position-relative">
            <h2 class="mb-4" data-aos="fade-up">Fall into Travel</h2>
            <p class="mb-4" data-aos="fade-up" data-aos-delay="100">
                Going somewhere to celebrate this season? Whether you’re going home or somewhere to roam, we’ve got the travel tools to get you to your destination.
            </p>
            <a href="{{ route('tours.index') }}" class="btn btn-outline-primary mb-4" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-plane"></i> See All
            </a>

            <div class="row justify-content-center">
                @foreach ($tours->take(3) as $tour)
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 150 }}">
                        <a href="{{ route('tours.show', $tour->id) }}" class="travel-card-link text-decoration-none">
                            <div class="card shadow-sm border-0">
                                @if ($tour->images)
                                    <img src="{{ asset('storage/' . explode(',', $tour->images)[0]) }}" class="card-img-top travel-image">
                                @else
                                    <img src="https://via.placeholder.com/300x200" class="card-img-top travel-image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tour->title }}</h5>
                                    <span class="badge bg-success p-2">{{ number_format($tour->price) }} VND</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</body>
@endsection

@section('scripts')
    <script>
        // Khởi động hiệu ứng AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true
        });
    </script>
@endsection
