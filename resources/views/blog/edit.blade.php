@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center">✏ Edit Post</h1>

        <form method="POST" action="{{ route('blog.update', $post->id) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title Input -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                       required>
            </div>

            <!-- Description Input -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" rows="5"
                          class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent"
                          required>{{ $post->description }}</textarea>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Upload New Image (optional)</label>
                <input type="file" name="image"
                       class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">

                @if($post->image)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Current Image:</p>
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image"
                             class="w-full h-48 object-cover rounded-lg mt-2 shadow">
                    </div>
                @endif
            </div>

            <!-- Submit & Cancel Buttons -->
            <div class="flex justify-between">
                <a href="{{ route('blog.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
                    ✅ Update Post
                </button>
            </div>
        </form>
    </div>
@endsection
