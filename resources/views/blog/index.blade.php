@extends('layouts.main')

@section('content')
    <h1>All News</h1>

    @foreach ($posts as $post)
        <div class="news-item">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
            <div class="news-title">{{ $post->title }}</div>
            <div class="news-description">{{ Str::limit($post->description, 100) }}</div>
            <p>Posted by: {{ $post->user->name }}</p>

            @if(Auth::check() && Auth::id() === $post->user_id)
                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</button>
                </form>
            @endif
        </div>
    @endforeach
@endsection
