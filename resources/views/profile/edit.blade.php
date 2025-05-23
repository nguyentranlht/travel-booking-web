@extends('layouts.app')

@section('content')
<div class="container">
 <!-- Back Button -->
    <div class="mb-4">
        <a href="javascript:history.back()" class="btn btn-outline-primary">
            <i class="fa-solid fa-arrow-left"></i> Back
        </a>
    </div>
    <h2 class="mb-4">Edit Profile</h2>

    
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">
            Profile updated successfully.
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="col-md-6">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <div class="row mb-5 pb-5">
        <div class="col-md-12">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
