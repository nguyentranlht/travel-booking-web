@extends('layouts.app')

@section('content')
<div class="container text-center mt-5" data-aos="fade-up">
    <!-- Title Section -->
    <h2 class="text-success mb-3">
        <i class="fas fa-check-circle"></i> Payment Successful!
    </h2>
    
    <!-- Message Section -->
    <p class="lead text-muted mb-4">
        Your booking has been confirmed. We look forward to hosting you on the tour!
    </p>

    <!-- Buttons Container -->
    <div class="d-flex justify-content-center gap-3">
        <!-- Button Back to Tours -->
        <a href="{{ route('tours.index') }}" class="btn btn-primary btn-lg px-4 py-2">
            <i class="fas fa-arrow-left"></i> Back to Tours
        </a>

        <!-- Button to View Ticket -->
        <a href="{{ route('user.bookings.show', ['id' => $bookingId]) }}" class="btn btn-success btn-lg px-4 py-2">
            <i class="fas fa-ticket-alt"></i> Go to Ticket
        </a>
    </div>
</div>

<!-- AOS Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script>
    // Initialize AOS (Animate On Scroll)
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out',
        once: true
    });
</script>

<!-- Custom Styling -->
<style>
    .text-success {
        font-size: 2rem;
        font-weight: bold;
    }
    .lead {
        font-size: 1.25rem;
        color: #6c757d;
    }
    .btn-lg {
        font-size: 1.2rem;
        padding: 15px 30px;
        border-radius: 50px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #218838;
    }
</style>

@endsection
