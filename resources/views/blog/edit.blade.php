@extends('layouts.main')

@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('blog.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $post->title }}" required>
        <textarea name="description" required>{{ $post->description }}</textarea>
        <input type="file" name="image">
        <button type="submit">Update</button>
    </form>
@endsection
