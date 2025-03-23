@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">👋 Welcome, {{ $user->name }}</h1>

        <div class="mb-6 space-y-2 text-gray-700">
            <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
            <p><span class="font-semibold">Joined:</span> {{ $user->created_at->format('d M Y') }}</p>
        </div>

        <h2 class="text-lg font-semibold text-gray-800 mb-2">📋 Your Profile Details</h2>
        <ul class="space-y-1 text-gray-700 mb-6">
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Joined On:</strong> {{ $user->created_at->diffForHumans() }}</li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                🔓 Logout
            </button>
        </form>
    </div>
@endsection
