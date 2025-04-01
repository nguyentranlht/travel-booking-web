@extends('layouts.app')

@section('content')
<div class="container mt-4 tour-listing">
    <div class="row">
        <!-- Sidebar: Filters -->
        <aside class="col-md-3">
            <div class="tour-filter p-3 border rounded" data-aos="fade-right">
                <h5>Filters</h5>

                <!-- Price Filter -->
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="range" class="form-range" min="0" max="5000" step="100" value="2500">
                </div>

                <!-- Rating -->
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-secondary btn-sm">0+</button>
                        <button class="btn btn-outline-secondary btn-sm">1+</button>
                        <button class="btn btn-outline-secondary btn-sm">2+</button>
                        <button class="btn btn-outline-secondary btn-sm">3+</button>
                        <button class="btn btn-outline-secondary btn-sm">4+</button>
                    </div>
                </div>

                <!-- Amenities -->
                <div>
                    <label class="form-label">Amenities</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="parking">
                        <label class="form-check-label" for="parking">Free Parking</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="wifi">
                        <label class="form-check-label" for="wifi">Free WiFi</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pool">
                        <label class="form-check-label" for="pool">Pool</label>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Tour List Section -->
        <section class="col-md-9">
            <div class="tour-list">
                <h3 class="mb-3" data-aos="fade-left" data-aos-delay="200">Showing {{ $tours->count() }} tours</h3>

                @foreach ($tours as $tour)
                    <div class="tour-item mb-4 p-3 d-flex align-items-center shadow-sm" data-aos="fade-up" data-aos-delay="300">
                        <!-- Tour Image -->
                        <div class="tour-image-container" style="max-width: 300px;">
                            <a href="{{ route('tours.show', $tour->id) }}">
                                <img src="{{ asset('storage/' . explode(',', $tour->images)[0]) }}" class="tour-image img-fluid" alt="{{ $tour->title }}">
                            </a>
                        </div>

                        <!-- Like Button -->
                        <div class="like-button-container">
                            <x-like-button :tour="$tour" />
                        </div>

                        <!-- Tour Information -->
                        <div class="tour-info ms-4">
                            <h5 class="tour-title">
                                <a href="{{ route('tours.show', $tour->id) }}" class="text-dark">
                                    {{ $tour->title }}
                                </a>
                            </h5>
                            <p class="tour-location text-muted">
                                <i class="fas fa-map-marker-alt"></i> {{ $tour->location }}
                            </p>

                            <div class="tour-meta mb-2">
                                <span class="tour-rating">⭐ 4.5 (371 reviews)</span>
                                <span class="tour-amenities">🌟 20+ Amenities</span>
                            </div>
                            
                            <p class="tour-description text-muted">{{ Str::limit($tour->description, 100) }}</p>

                            <!-- Footer -->
                            <div class="tour-footer d-flex justify-content-between align-items-center mt-3">
                                <span class="tour-price">{{ number_format($tour->price) }} VND/person</span>
                                @if($tour->available_seats > 0)
                                    <a href="{{ route('checkout', ['tourId' => $tour->id]) }}" class="btn btn-success">
                                        Book Now
                                    </a>
                                @else
                                    <button class="btn btn-secondary" disabled>Sold Out!</button>
                                @endif
                            </div> 
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</div>

<script>
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true
    });
</script>

@endsection
