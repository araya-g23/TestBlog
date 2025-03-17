@extends('layouts.main')

@section('content')
    <h1>Posts in {{ $category->name }}</h1>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
    {{ $posts->links() }}
@endsection
