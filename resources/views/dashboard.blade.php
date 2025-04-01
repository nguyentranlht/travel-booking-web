@extends('layouts.app')

@section('content')
<main class="account-page">
    <!-- Profile Header -->
    <div class="profile-header text-center" data-aos="fade-up">
        <div class="profile-info">
            <h2 class="text-success">{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h2>
            <p class="text-muted">{{ auth()->user()->email }}</p>
        </div>
    </div>

    <!-- Account Navigation -->
    <div class="account-tabs d-flex justify-content-center gap-3 mb-4" data-aos="fade-up" data-aos-delay="200">
        <a href="{{ route('user.profile.edit') }}">
            <button class="btn-lg px-4 py-2">Settings</button>
        </a>
        <a href="{{ route('user.bookings.index') }}">
            <button class="btn-lg px-4 py-2">Booking History</button>
        </a>
    </div>

    <!-- Account Details -->
    <section class="account-details container" data-aos="fade-up" data-aos-delay="400">
        <h3 class="mb-4">Account Details</h3>
        
        <!-- Information Boxes -->
        <div class="info-box">
            <label class="fw-bold">Name</label>
            <p>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</p>
        </div>
        <div class="info-box">
            <label class="fw-bold">Email</label>
            <p>{{ auth()->user()->email }}</p>
        </div>
        <div class="info-box">
            <label class="fw-bold">Password</label>
            <p>*****************</p>
        </div>
        <div class="info-box">
            <label class="fw-bold">Phone Number</label>
            <p>{{ auth()->user()->phone }}</p>
        </div>
        <div class="info-box">
            <label class="fw-bold">Date of Birth</label>
            <p>{{ auth()->user()->date_of_birth }}</p>
        </div>
    </section>
</main>

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
