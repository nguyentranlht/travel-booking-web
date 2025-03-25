@extends('layouts.app')

@section('content')
<body>
    <div class="search-bar">
        <input type="text" placeholder="Enter Destination">
        <input type="date">
        <input type="date">
        <select>
            <option>1 room, 2 guests</option>
        </select>
        <button>Show Places</button>
    </div>
    <section class="recent-searches">
        <h2>Your recent searches</h2>
        <div class="search-list">
            <div class="search-item">Istanbul, Turkey</div>
            <div class="search-item">Sydney, Australia</div>
            <div class="search-item">Baku, Azerbaijan</div>
            <div class="search-item">Malé, Maldives</div>
        </div>
    </section>

    <section class="travel-destinations text-center">
        <div class="container position-relative">
            <h2 class="mb-4">Fall into Travel</h2>
            <a href="{{ route('tours.index') }}" class="see-all-button">See All</a>
            <p class="mb-4">Going somewhere to celebrate this season? Whether you’re going home or somewhere to roam, we’ve got the travel tools to get you to your destination.</p>
    
            <div class="row justify-content-center">
                @foreach ($tours->take(3) as $tour)
                    <div class="col-md-4">
                        <a href="{{ route('tours.show', $tour->id) }}" class="travel-card-link">
                            <div class="travel-card">
                                @if ($tour->images)
                                    <img src="{{ asset('storage/' . explode(',', $tour->images)[0]) }}" class="travel-image">
                                @else
                                    <img src="https://via.placeholder.com/300x200" class="travel-image">
                                @endif
    
                                <div class="travel-card-body">
                                    <h5 class="travel-title">{{ $tour->title }}</h5>
                                    <span class="travel-price">${{ number_format($tour->price, 2) }}</span>
                                    <div class="travel-footer">
                                        <a href="{{ route('checkout', ['tourId' => $tour->id]) }}" class="travel-button">
                                            Book a Tour
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</body>
@endsection
