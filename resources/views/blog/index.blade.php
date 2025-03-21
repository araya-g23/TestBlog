@extends('layouts.main')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">📰 All News</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <a href="{{ route('blog.show', $post->id) }}">
                        <img src="{{ asset('storage/' . $post->image) }}"
                             onerror="this.onerror=null; this.src='{{ asset('images/default.jpg') }}';"
                             alt="{{ $post->title }}"
                             class="w-full h-48 object-cover">
                    </a>
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">
                            <a href="{{ route('blog.show', $post->id) }}" class="text-blue-600 hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="text-gray-700 mt-2">
                            {{ Str::limit($post->description, 100) }}...
                        </p>

                        <!-- ✅ Edit & Delete Buttons (Only for Post Owner) -->
                        @if(Auth::check() && Auth::id() === $post->user_id)
                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('blog.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-700">
                                    ✏ Edit
                                </a>
                                <form action="{{ route('blog.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                        🗑 Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
