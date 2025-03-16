@extends('layouts.main')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h2>Comments</h2>
    @foreach($post->comments as $comment)
        <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
    @endforeach

    @if(Auth::check())
        <h3>Add a Comment</h3>
        <form method="POST" action="{{ route('comments.store', $post->id) }}">
            @csrf
            <textarea name="content" required></textarea>
            <button type="submit">Submit</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Login</a> to comment</p>
    @endif
@endsection
