@extends('layouts.app')

@section('content')
<div class="container">
    
    <!-- Title Section -->
    <h2 class="mb-4 text-center text-success" data-aos="fade-up">Your Bookings</h2>
    <div class="mb-4">
        <a href="javascript:history.back()" class="btn btn-outline-primary">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>

    <!-- No Bookings Message -->
    @if ($bookings->isEmpty())
        <div class="alert alert-warning text-center" data-aos="fade-up" data-aos-delay="200">
            You have no bookings yet.
        </div>
    @else
        <!-- Bookings Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4" data-aos="fade-up" data-aos-delay="400">
            @foreach ($bookings as $booking)
                <div class="col">
                    <div class="card shadow-sm border-0" data-aos="zoom-in" data-aos-delay="500">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $booking->tour->title }}</h5>
                            <p class="mb-1"><strong>Guests:</strong> {{ $booking->guest_count }}</p>
                            <p class="mb-1"><strong>Start Date:</strong> {{ date('d M Y', strtotime($booking->start_date)) }}</p>
                            <p class="mb-1"><strong>Total Paid:</strong> ${{ number_format($booking->total_amount, 2) }}</p>
                            <p class="mb-3"><strong>Status:</strong> 
                                <span class="badge {{ $booking->status == 'confirmed' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </p>
                            <a href="{{ route('user.bookings.show', $booking->id) }}" class="btn btn-outline-primary w-100">
                                View Ticket
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4" data-aos="fade-up" data-aos-delay="600">
            {{ $bookings->links('components.nav-link') }}
        </div>
    @endif
</div>

<!-- AOS Script -->
<script>
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true
    });
</script>

@endsection
