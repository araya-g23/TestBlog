@extends('layouts.main')

@section('content')
    <h1>Welcome to the Football Blog</h1>
    <h2>Latest Posts</h2>
    @foreach($posts as $post)
        <h3><a href="/news/{{ $post->id }}">{{ $post->title }}</a></h3>
        <p>{{ Str::limit($post->content, 100) }}</p>
    @endforeach
@endsection
