@extends('layouts.main')

@section('content')
    <h1>Create a New News Post</h1>
    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="file" name="image">
        <button type="submit">Submit</button>
    </form>
@endsection
