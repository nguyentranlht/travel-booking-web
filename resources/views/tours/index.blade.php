@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Tour List</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Destinations</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tours as $tour)
            <tr>
                <td>{{ $tour->id }}</td>
                <td>{{ $tour->title }}</td>
                <td>{{ $tour->destinations }}</td>
                <td>{{ $tour->start_time }}</td>
                <td>{{ $tour->end_time }}</td>
                <td>${{ $tour->price }}</td>
                <td>
                    <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-info btn-sm">View</a>
                </td>
                <td>
                    <a href="{{ route('checkout', ['tourId' => $tour->id]) }}" class="btn btn-success">Book now</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
