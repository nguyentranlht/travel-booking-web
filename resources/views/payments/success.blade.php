@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h2 class="text-success">Payment Successful!</h2>
    <p>Your booking has been confirmed.</p>
    <a href="{{ route('tours.index') }}" class="btn btn-primary">Back to Tours</a>
</div>
@endsection
