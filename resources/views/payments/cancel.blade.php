@extends('layouts.app')

@section('content')
<div class="container text-center mt-5" data-aos="fade-up">
    <!-- Title Section -->
    <h2 class="text-danger mb-3">
        <i class="fas fa-times-circle"></i> Payment Failed!
    </h2>

    <!-- Message Section -->
    <p class="lead text-muted mb-4">
        Something went wrong with your payment. Please try again later, or contact support if the problem persists.
    </p>

    <!-- Button Back to Tours -->
    <a href="{{ route('tours.index') }}" class="btn btn-warning btn-lg px-4 py-2">
        <i class="fas fa-arrow-left"></i> Back to Tours
    </a>

</div>

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
    .text-danger {
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
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #c82333;
    }
</style>

@endsection
