@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="mb-4">
            <a href="javascript:history.back()" class="btn btn-outline-primary">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>
        
        <!-- Left Column: Tour Details -->
        <div class="col-md-8">
            <!-- Hero Section with Title Overlay -->
            <div class="position-relative rounded shadow-sm overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('storage/' . explode(',', $tour->images)[0]) }}" class="d-block w-100 tour-image" alt="{{ $tour->title }}" style="height: 450px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('storage/' . explode(',', $tour->images)[0]) }}">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end p-4" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h1 class="text-white fw-bold">{{ $tour->title }}</h1>
                </div>
            </div>
            
            <!-- Image Gallery -->
            <div class="swiper-container mt-3" data-aos="fade-left" data-aos-delay="200">
                <div class="swiper-wrapper">
                    @foreach (explode(',', $tour->images) as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $image) }}" class="gallery-image rounded shadow-sm" alt="{{ $tour->title }}" style="height: 150px; object-fit: cover;" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('storage/' . $image) }}">
                        </div>
                    @endforeach
                </div>
                <!-- Swiper Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Tour Overview -->
            <div class="mt-4 p-4 bg-white rounded shadow-sm" data-aos="fade-right" data-aos-delay="300">
                <h2 class="fw-bold text-primary">Overview</h2>
                <p class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $tour->destinations }}</p>
                <p class="lead">{{ $tour->description }}</p>
            </div>

            <!-- Itinerary -->
            <div class="mt-4 p-4 bg-light rounded shadow-sm" data-aos="fade-up" data-aos-delay="400">
                <h3 class="fw-bold text-dark">Itinerary</h3>
                <div class="accordion" id="scheduleAccordion">
                    @foreach (explode('|', $tour->schedule) as $index => $day)
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#day{{ $index }}">
                                    <strong>Day {{ $index + 1 }}</strong>
                                </button>
                            </h2>
                            <div id="day{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}">
                                <div class="accordion-body">
                                    {!! nl2br(e($day)) !!} <!-- Sử dụng nl2br() để giữ định dạng xuống dòng -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Column: Booking Section -->
        <div class="col-md-4">
            <div class="p-4 bg-white rounded shadow-sm sticky-top">
                <h3 class="fw-bold text-success">{{ number_format($tour->price) }}VND/person</h3>
                <p><i class="fas fa-calendar-alt text-primary"></i> <strong>{{ $tour->number_of_days }}</strong> days</p>
                <p><i class="fas fa-clock text-warning"></i> Start: <strong>{{ date('H:i d/m/Y', strtotime($tour->start_time)) }}</strong></p>
                <p><i class="fas fa-clock text-danger"></i> End: <strong>{{ date('H:i d/m/Y', strtotime($tour->end_time)) }}</strong></p>
                <p><i class="fas fa-users text-info"></i> Max guests: <strong>{{ $tour->number_of_guests }}</strong></p>
                <p><i class="fas fa-users text-secondary"></i> Available seats: <strong>{{ $tour->available_seats }}</strong></p>
                <div class="like-button-container">
                    <x-like-button :tour="$tour" />
                </div>
                <form action="{{ route('checkout', ['tourId' => $tour->id]) }}" method="GET">
                    @csrf
                
                    @if($tour->available_seats > 0)
                        <div class="mb-3">
                            <label for="guests" class="form-label">Number of Guests</label>
                            <input type="number" id="guests" name="guest_count" class="form-control"
                                   value="1" min="1" max="{{ $tour->available_seats }}" required>
                        </div>
                
                        <button type="submit" class="btn btn-success w-100">
                            Book Now
                        </button>
                    @else
                        <div class="alert alert-secondary text-center p-3">
                            <strong class="text-dark">Sold Out!</strong> No more available seats for this tour.
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lightbox -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid rounded shadow-sm zoom-effect">
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Image Click -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalImage = document.getElementById("modalImage");
        const images = document.querySelectorAll(".tour-image, .gallery-image");

        images.forEach(img => {
            img.addEventListener("click", function() {
                modalImage.src = this.dataset.src;
            });
        });
    });
</script>

<!-- Add Swiper.js and AOS initialization -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
    
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>

<!-- Custom CSS -->
<style>
    /* Zoom effect for the modal image */
    .zoom-effect {
        transition: transform 0.3s ease;
    }

    .zoom-effect:hover {
        transform: scale(1.1);
    }

    /* Hover Effect for Tour Images */
    .tour-image, .gallery-image {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .tour-image:hover, .gallery-image:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Fix image gallery */
    .swiper-container {
        width: 100%;
        margin-top: 20px;
    }

    .swiper-wrapper {
        display: flex;
        justify-content: space-between;
    }

    .swiper-slide {
        width: calc(33.33% - 10px);
        /* Adjust width and space between images */
    }

    .gallery-image {
        object-fit: cover;
        height: 150px;
        width: 100%;
    }
</style>

@endsection
