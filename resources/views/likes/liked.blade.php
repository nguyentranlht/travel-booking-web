@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Your Favorite Tours</h2>
        <div class="row">
            @forelse($likedTours as $tour)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="position-relative">
                            <!-- Picture Tour -->
                            <div class="tour-image-container">
                                <a href="{{ route('tours.show', $tour->id) }}">
                                    <img src="{{ $tour->images ? asset('storage/' . explode(',', $tour->images)[0]) : 'https://via.placeholder.com/300x200' }}"
                                        class="tour-image">
                                </a>
                                {{-- <span class="tour-badge">{{ count(explode(',', $tour->images)) }} images</span> --}}
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
                <div class="col-12 text-center">
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
