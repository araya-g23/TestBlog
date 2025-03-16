@extends('layouts.main')

@section('content')
    <h1>Contact Us</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
@endsection
