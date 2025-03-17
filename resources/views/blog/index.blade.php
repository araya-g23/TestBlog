@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4">Latest News</h2>

        @foreach($posts as $post)
            <div class="border-b pb-4 mb-4">
                <h3 class="text-lg font-bold">
                    <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                </h3>
                <p class="text-sm text-gray-500">By {{ $post->user->name }} | {{ $post->category->name }}</p>
                <p class="mt-2">{{ Str::limit($post->content, 150) }}</p>
            </div>
        @endforeach
    </div>
@endsection
