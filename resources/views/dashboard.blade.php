@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome, {{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>
        <p>Joined: {{ $user->created_at->format('d M Y') }}</p>

        <h3>Your Profile Details</h3>
        <ul>
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Joined On:</strong> {{ $user->created_at->diffForHumans() }}</li>
        </ul>

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection
