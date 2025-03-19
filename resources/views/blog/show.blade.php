@extends('layouts.main')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-lg p-6 rounded-lg">
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover mb-4">
        <h1 class="text-3xl font-bold mb-2">{{ $post->title }}</h1>
        <p class="text-gray-700">{{ $post->description }}</p>
    </div>
@endsection
