@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">{{ $tour->title }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Description</th>
                        <td>{{ $tour->description }}</td>
                    </tr>
                    <tr>
                        <th>Destinations</th>
                        <td>{{ $tour->destinations }}</td>
                    </tr>
                    <tr>
                        <th>Number of Days</th>
                        <td>{{ $tour->number_of_days }}</td>
                    </tr>
                    <tr>
                        <th>Start Time</th>
                        <td>{{ $tour->start_time }}</td>
                    </tr>
                    <tr>
                        <th>End Time</th>
                        <td>{{ $tour->end_time }}</td>
                    </tr>
                    <tr>
                        <th>Number of Guests</th>
                        <td>{{ $tour->number_of_guests }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge 
                                @if($tour->status == 'active') bg-success
                                @elseif($tour->status == 'canceled') bg-danger
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($tour->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>${{ number_format($tour->price, 2) }}</td>
                    </tr>
                    <tr>
                        <th>Images</th>
                        <td>
                            @if ($tour->images)
                                <div class="d-flex flex-wrap">
                                    @foreach (explode(',', $tour->images) as $image)
                                        <img src="{{ asset('storage/' . trim($image)) }}" class="img-thumbnail me-2" style="width: 150px; height: 100px;">
                                    @endforeach
                                </div>
                            @else
                                No images available.
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
