@extends('layouts.app')

@section('content')

<main class="account-page">
    <div class="profile-header">
        <div class="profile-info">
            <h2>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h2>
            <p>{{ auth()->user()->email }}</p>
        </div>
    </div>
    <div class="account-tabs">
        <a href="{{ route('user.profile.edit') }}">
            <button class="text-dark btn btn-success">Settings</button>
        </a>
        <button class="text-dark btn btn-success">History</button>
    </div>
    <section class="account-details">
        <h3>Account</h3>
        <div class="info-box">
            <label>Name</label>
            <p>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name  }}</p>
        </div>
        <div class="info-box">
            <label>Email</label>
            <p>{{ auth()->user()->email }}</p>
        </div>
        <div class="info-box">
            <label>Password</label>
            <p>*****************</p>
        </div>
        <div class="info-box">
            <label>Phone number</label>
            <p>{{ auth()->user()->phone }}</p>
        </div>
        <div class="info-box">
            <label>Date of birth</label>
            <p>{{ auth()->user()->date_of_birth }}</p>
        </div>
    </section>
</main>

@endsection