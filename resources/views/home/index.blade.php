@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Home page</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a href="{{ url('/dashboard') }}" class="btn btn-lg btn-warning me-2">Dashboard</a>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection