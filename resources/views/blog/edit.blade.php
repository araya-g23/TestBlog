@extends('layouts.main')

@section('content')
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('blog.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="title" value="{{ $post->title }}" required>
        <textarea name="description" required>{{ $post->description }}</textarea>
        <input type="file" name="image">

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">Update</button>
    </form>


    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-200 rounded">
            {{ session('success') }}
        </div>
    @endif

@endsection
