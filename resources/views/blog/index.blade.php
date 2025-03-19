@extends('layouts.main')

@section('content')
    <h1>All News</h1>
    @foreach($posts as $post)
        <div>
            <h2><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h2><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" style="width:200px; height:auto;">

            <p>{{ $post->description }}</p>
        </div>
    @endforeach
@endsection
