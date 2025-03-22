@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 py-12 max-w-3xl">
        <h1 class="text-3xl font-bold text-center mb-6">📬 Contact Us</h1>
        <p class="text-center text-gray-600 mb-10">
            Have a question, suggestion, or just want to say hello? We'd love to hear from you.
        </p>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.submit') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-semibold text-gray-700">Your Name</label>
                <input type="text" name="name" id="name" required
                       class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold text-gray-700">Your Email</label>
                <input type="email" name="email" id="email" required
                       class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="message" class="block font-semibold text-gray-700">Your Message</label>
                <textarea name="message" id="message" rows="5" required
                          class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                📩 Send Message
            </button>
        </form>
    </div>
@endsection
