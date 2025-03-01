@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h2 class="mb-0">Edit Tour</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $tour->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $tour->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Destinations</label>
                    <input type="text" name="destinations" class="form-control" value="{{ $tour->destinations }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Number of Days</label>
                    <input type="number" name="number_of_days" class="form-control" value="{{ $tour->number_of_days }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Start Time</label>
                    <input type="datetime-local" name="start_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($tour->start_time)) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">End Time</label>
                    <input type="datetime-local" name="end_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($tour->end_time)) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Schedule</label>
                    <textarea name="schedule" class="form-control" required>{{ $tour->schedule }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Number of Guests</label>
                    <input type="number" name="number_of_guests" class="form-control" value="{{ $tour->number_of_guests }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="active" {{ $tour->status == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="canceled" {{ $tour->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                        <option value="finished" {{ $tour->status == 'finished' ? 'selected' : '' }}>Finished</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price ($)</label>
                    <input type="text" name="price" class="form-control" value="{{ $tour->price }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Images</label>
                    <div class="d-flex flex-wrap">
                        @foreach (explode(',', $tour->images) as $image)
                            <img src="{{ asset('storage/' . trim($image)) }}" class="img-thumbnail me-2" style="width: 150px; height: 100px;">
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Images</label>
                    <input type="file" name="images[]" class="form-control" multiple>
                </div>

                <button type="submit" class="btn btn-success">Update Tour</button>
                <a href="{{ route('tours.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
