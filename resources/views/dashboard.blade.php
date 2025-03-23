@extends('layouts.main')

@section('content')
    <div class="max-w-xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-md text-center">

        <!-- Profile Picture with Edit Icon -->
        <div class="relative w-32 h-32 mx-auto group mb-4">
            <img src="{{ asset('storage/' . $user->profile_picture) }}"
                 alt="Profile Picture"
                 class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-md">

            <!-- Hidden Upload Form -->
            <form id="profile-picture-form"
                  action="{{ route('user.profile-picture.update') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="file" name="profile_picture" accept="image/*"
                       onchange="document.getElementById('profile-picture-form').submit()"
                       class="absolute inset-0 opacity-0 cursor-pointer rounded-full">
            </form>

            <!-- Edit Icon Overlay -->
            <div class="absolute bottom-0 right-0 bg-white rounded-full p-1 shadow group-hover:scale-110 transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                     class="w-5 h-5 text-gray-700">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.232 5.232l3.536 3.536M9 13l6.536-6.536a2.5 2.5 0 113.536 3.536L12.5 16.5H9v-3.5z" />
                </svg>
            </div>
        </div>

        <!-- Welcome + Basic Info -->
        <h1 class="text-2xl font-bold text-gray-800 mb-2">👋 Welcome, {{ $user->name }}</h1>
        <p class="text-gray-600"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
        <p class="text-gray-600 mb-4"><span class="font-semibold">Joined:</span> {{ $user->created_at->format('d M Y') }}</p>

        <!-- Success Message -->
        @if (session('success'))
            <p class="text-green-600 font-semibold mb-4">{{ session('success') }}</p>
        @endif

        <!-- Profile Details -->
        <h2 class="text-lg font-semibold text-gray-800 mb-2">📋 Your Profile Details</h2>
        <ul class="space-y-1 text-gray-700 mb-6">
            <li><strong>Name:</strong> {{ $user->name }}</li>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Joined On:</strong> {{ $user->created_at->diffForHumans() }}</li>
        </ul>

        <!-- Logout -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                🔓 Logout
            </button>
        </form>
    </div>
@endsection
