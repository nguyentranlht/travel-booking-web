@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Create New Tour</h2>
    <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Destinations</label>
            <input type="text" name="destinations" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Days</label>
            <input type="number" name="number_of_days" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Start Time</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">End Time</label>
            <input type="datetime-local" name="end_time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Schedule</label>
            <textarea name="schedule" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Number of Guests</label>
            <input type="number" name="number_of_guests" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="active">Active</option>
                <option value="canceled">Canceled</option>
                <option value="finished">Finished</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create Tour</button>
    </form>
</div>
@endsection
