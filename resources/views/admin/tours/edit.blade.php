@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Edit Tour</h2>
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h3 class="mb-0">Edit Tour Details</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Title -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $tour->title }}" required>
                    </div>

                    <!-- Destinations -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destinations</label>
                        <input type="text" name="destinations" class="form-control" value="{{ $tour->destinations }}" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required>{{ $tour->description }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Number of Days -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Number of Days</label>
                        <input type="number" name="number_of_days" class="form-control" value="{{ $tour->number_of_days }}" required>
                    </div>

                    <!-- Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price ($)</label>
                        <input type="text" name="price" class="form-control" value="{{ $tour->price }}" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Start Time -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="datetime-local" name="start_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($tour->start_time)) }}" required>
                    </div>

                    <!-- End Time -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">End Time</label>
                        <input type="datetime-local" name="end_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($tour->end_time)) }}" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Schedule -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Schedule</label>
                        <textarea name="schedule" class="form-control" rows="3" required>{{ $tour->schedule }}</textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Number of Guests -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Number of Guests</label>
                        <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" value="{{ $tour->number_of_guests }}" required>
                    </div>

                    <!-- Available Seats -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Available Seats</label>
                        <input type="number" name="available_seats" id="available_seats" class="form-control" value="{{ $tour->available_seats }}" readonly>
                    </div>
                </div>

                <div class="row">
                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="active" {{ $tour->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="canceled" {{ $tour->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            <option value="finished" {{ $tour->status == 'finished' ? 'selected' : '' }}>Finished</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Current Images -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Current Images</label>
                        <div class="d-flex flex-wrap">
                            @foreach (explode(',', $tour->images) as $image)
                                <img src="{{ asset('storage/' . trim($image)) }}" class="img-thumbnail me-2" style="width: 150px; height: 100px;">
                            @endforeach
                        </div>
                    </div>

                    <!-- Upload New Images -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Upload New Images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update Tour</button>
                    <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let numberOfGuestsInput = document.getElementById('number_of_guests');
        let availableSeatsInput = document.getElementById('available_seats');

        if (numberOfGuestsInput && availableSeatsInput) {
            numberOfGuestsInput.addEventListener('input', function () {
                availableSeatsInput.value = numberOfGuestsInput.value;
            });
        }
    });
</script>
@endsection