@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4" data-aos="fade-up">Your Favorite Tours</h2>
        <div class="row">
            <div class="mb-4">
                <a href="javascript:history.back()" class="btn btn-outline-primary">
                    <i class="fa-solid fa-arrow-left"></i> Back
                </a>
            </div>
            @forelse($likedTours as $tour)
                <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <div class="card shadow-sm border-0">
                        <div class="position-relative">
                            <!-- Picture Tour -->
                            <div class="tour-image-container">
                                <a href="{{ route('tours.show', $tour->id) }}">
                                    <img src="{{ $tour->images ? asset('storage/' . explode(',', $tour->images)[0]) : 'https://via.placeholder.com/300x200' }}"
                                        class="tour-image">
                                </a>
                            </div>
                            
                            <!-- Like -->
                            <div class="like-button-container">
                                <x-like-button :tour="$tour" />
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $tour->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($tour->description, 100) }}</p>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-outline-primary">View Details</a>
                                <span class="badge bg-success p-2">${{ number_format($tour->price, 2) }}/person</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center" data-aos="fade-up">
                    <p class="text-muted">You haven't liked any tours yet.</p>
                    <a href="{{ route('tours.index') }}" class="btn btn-primary">Explore Tours</a>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $likedTours->links('components.nav-link') }}
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Initialize AOS animation
        AOS.init({
            duration: 1000, // Animation duration
            easing: 'ease-in-out', // Animation easing
            once: true, // Whether the animation should happen once
        });
    </script>
@endsection
