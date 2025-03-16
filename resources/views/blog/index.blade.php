@extends('layouts.main')

@section('content')
    <h1>Football News</h1>
    @foreach($posts as $post)
        <h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
        <p>{{ Str::limit($post->content, 100) }}</p>
    @endforeach
@endsection
