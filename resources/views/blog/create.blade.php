@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">📝 Create a New News Post</h1>

        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Title Field -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="title">Title</label>
                <input type="text" name="title" id="title"
                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                       placeholder="Enter post title" required>
            </div>

            <!-- Description Field -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="description">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-400"
                          placeholder="Write your post description..." required></textarea>
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="image">Image (optional)</label>
                <input type="file" name="image" id="image"
                       class="w-full text-gray-700 border border-gray-300 rounded px-3 py-2 focus:outline-none">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                        class="bg-blue-600 text-white font-semibold px-6 py-2 rounded hover:bg-blue-700 transition">
                    Submit Post
                </button>
            </div>
        </form>
    </div>
@endsection
