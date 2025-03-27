@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-center">Your Bookings</h2>

    @if ($bookings->isEmpty())
        <div class="alert alert-warning text-center">You have no bookings yet.</div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($bookings as $booking)
                <div class="col">
                    <div class="card shadow-sm border-0">
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

        <div class="d-flex justify-content-center mt-4">
            {{ $bookings->links('components.nav-link') }}
        </div>
    @endif
</div>
@endsection
