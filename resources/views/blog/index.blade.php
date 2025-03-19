@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">{{ $category ? $category->name : 'All' }} News</h1>

        @foreach ($posts as $post)
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-bold">{{ $post->title }}</h2>
                <p class="text-gray-700">{{ $post->content }}</p>
                <p class="text-sm text-gray-500">Posted on {{ $post->created_at->format('M d, Y') }}</p>
            </div>
        @endforeach
    </div>
@endsection
