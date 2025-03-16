@extends('layouts.app')

@section('content')
    <main class="sm:container sm:mx-auto sm:mt-10">
        <div class="w-full sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    About Us
                </header>

                <div class="w-full p-6">
                    <p class="text-gray-700">
                        Welcome to {{ config('app.name', 'Laravel') }}! We are dedicated to providing valuable content and services.
                    </p>
                    <p class="mt-4 text-gray-600">
                        Our mission is to help people grow, learn, and connect with valuable resources. We believe in quality, simplicity, and user-friendly experiences.
                    </p>
                    <p class="mt-4 text-gray-600">
                        Feel free to explore our platform and learn more about what we offer!
                    </p>

                    <div class="mt-6">
                        <a href="{{ url('/') }}" class="px-6 py-2 bg-teal-500 text-white rounded-lg shadow-md hover:bg-teal-600">
                            Back to Home
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
