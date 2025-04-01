@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Create New Tour</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.tours.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Title -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter tour title" required>
                    </div>

                    <!-- Destinations -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Destinations</label>
                        <input type="text" name="destinations" class="form-control" placeholder="Enter destinations" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Description -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter tour description" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Images -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Images</label>
                        <input type="file" name="images[]" class="form-control" multiple>
                    </div>

                    <!-- Number of Days -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Number of Days</label>
                        <input type="number" name="number_of_days" class="form-control" min="1" placeholder="Enter number of days" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Start Time -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Start Time</label>
                        <input type="datetime-local" name="start_time" class="form-control" required>
                    </div>

                    <!-- End Time -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">End Time</label>
                        <input type="datetime-local" name="end_time" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <!-- Schedule -->
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Schedule</label>
                        <textarea name="schedule" class="form-control" rows="3" placeholder="Enter tour schedule" required></textarea>
                    </div>
                </div>

                <div class="row">
                    <!-- Number of Guests -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Number of Guests</label>
                        <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" min="1" placeholder="Enter number of guests" required>
                    </div>

                    <!-- Available Seats -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Available Seats</label>
                        <input type="number" name="available_seats" id="available_seats" class="form-control" readonly>
                    </div>
                </div>

                <div class="row">
                    <!-- Status -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="active">Active</option>
                            <option value="canceled">Canceled</option>
                            <option value="finished">Finished</option>
                        </select>
                    </div>

                    <!-- Price -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="Enter price" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Create Tour</button>
            </form>
        </div>
    </div>
</div>
@endsection

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