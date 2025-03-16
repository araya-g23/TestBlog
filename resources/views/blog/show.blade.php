@extends('layouts.main')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}">Back to News</a>
@endsection
