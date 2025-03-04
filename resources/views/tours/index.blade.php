@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Tour List</h2>
    <a href="{{ route('tours.create') }}" class="btn btn-primary mb-3">Add New Tour</a>
    
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
                    <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
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
