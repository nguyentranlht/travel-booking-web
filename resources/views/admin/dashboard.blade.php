@extends('layouts.app')

@section('content')
    <p>admin dashboard</p>
    <a href="{{ route('admin.tours.index') }}">
        <button>Tours</button>
    </a>
@endsection