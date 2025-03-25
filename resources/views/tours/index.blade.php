@extends('layouts.app')

@section('content')
    <div class="container mt-4 tour-listing">
        <div class="row">

            <aside class="col-md-3">
                <div class="tour-filter p-3 border rounded">
                    <h5>Filters</h5>

                    <!-- Price Filter -->
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="range" class="form-range">
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
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Free Parking</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Free WiFi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Pool</label>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- tour list -->
            <!-- Tour List -->
            <section class="col-md-9">
                <div class="tour-list">
                    <h3 class="mb-3">Showing {{ $tours->count() }} tours</h3>

                    @foreach ($tours as $tour)
                        <div class="tour-item mb-4 p-3 border rounded d-flex align-items-center shadow-sm">
                            <!-- Ảnh Tour -->
                            <div class="tour-image-container">
                                <a href="{{ route('tours.show', $tour->id) }}">
                                    <img src="{{ $tour->images ? asset('storage/' . explode(',', $tour->images)[0]) : 'https://via.placeholder.com/300x200' }}"
                                        class="tour-image">
                                </a>
                                {{-- <span class="tour-badge">{{ count(explode(',', $tour->images)) }} images</span> --}}
                            </div>

                            <!-- Thông Tin Tour -->
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
                                    <span class="tour-price">${{ number_format($tour->price, 2) }}/person</span>
                                    <a href="{{ route('checkout', ['tourId' => $tour->id]) }}" class="btn btn-success">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
