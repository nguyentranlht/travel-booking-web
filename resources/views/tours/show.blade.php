@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Left Column: Tour Details -->
        <div class="col-md-8">
            <!-- Hero Section with Title Overlay -->
            <div class="position-relative rounded shadow-sm overflow-hidden">
                <img src="{{ asset('storage/' . explode(',', $tour->images)[0]) }}" class="d-block w-100 tour-image" alt="{{ $tour->title }}" style="height: 450px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('storage/' . explode(',', $tour->images)[0]) }}">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-end p-4" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                    <h1 class="text-white fw-bold">{{ $tour->title }}</h1>
                </div>
            </div>

            <!-- Image Gallery -->
            <div class="row mt-3">
                @foreach (explode(',', $tour->images) as $image)
                    <div class="col-4">
                        <img src="{{ asset('storage/' . trim($image)) }}" class="rounded shadow-sm w-100 gallery-image" style="height: 120px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('storage/' . trim($image)) }}">
                    </div>
                @endforeach
            </div>

            <!-- Tour Overview -->
            <div class="mt-4 p-4 bg-white rounded shadow-sm">
                <h2 class="fw-bold text-primary">Overview</h2>
                <p class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $tour->destinations }}</p>
                <p class="lead">{{ $tour->description }}</p>
            </div>

            <!-- Itinerary -->
            <div class="mt-4 p-4 bg-light rounded shadow-sm">
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
                                <div class="accordion-body">{{ $day }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Right Column: Booking Section -->
        <div class="col-md-4">
            <div class="p-4 bg-white rounded shadow-sm sticky-top">
                <h3 class="fw-bold text-success">${{ number_format($tour->price, 2) }}/person</h3>
                <p><i class="fas fa-calendar-alt text-primary"></i> <strong>{{ $tour->number_of_days }}</strong> days</p>
                <p><i class="fas fa-clock text-warning"></i> Start: <strong>{{ date('H:i d/m/Y', strtotime($tour->start_time)) }}</strong></p>
                <p><i class="fas fa-clock text-danger"></i> End: <strong>{{ date('H:i d/m/Y', strtotime($tour->end_time)) }}</strong></p>
                <p><i class="fas fa-users text-info"></i> Max guests: <strong>{{ $tour->number_of_guests }}</strong></p>
                <form action="{{ route('checkout', ['tourId' => $tour->id]) }}" method="get">
                    @csrf
                    <div class="mb-3">
                        <label for="guests" class="form-label">Number of Guests</label>
                        <input type="number" id="guests" name="guests" class="form-control" value="1" min="1" max="{{ $tour->number_of_guests }}">
                    </div>
                    <button type="submit" class="btn btn-success w-100">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lightbox -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" class="img-fluid rounded shadow-sm">
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
@endsection
