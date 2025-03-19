<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
<div id="app">

    <!-- ✅ Updated Navbar (Matches Other Pages) -->
    <nav class="bg-black text-white p-4">
        <ul class="flex justify-between items-center">
            <div class="flex space-x-6">
                <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
                <li><a href="{{ route('blog.index') }}" class="hover:underline">All News</a></li>
                <li><a href="{{ route('teams.index') }}" class="hover:underline">Teams</a></li>
                <li><a href="{{ route('matches.index') }}" class="hover:underline">Fixtures</a></li>
                <li><a href="{{ route('contact.show') }}" class="hover:underline">Contact</a></li>

                @if(Auth::check())
                    <li><a href="{{ route('blog.create') }}" class="hover:underline text-green-400">Create Post</a></li>
                @endif
            </div>

            <div class="flex space-x-6">
                @guest
                    <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
                @else
                    <li><a href="{{ route('dashboard') }}" class="hover:underline">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:underline">Logout</button>
                        </form>
                    </li>
                @endguest
            </div>
        </ul>
    </nav>

    <!-- ✅ Keeps Login Page Design -->
    <main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-10">
        @yield('content')
    </main>

    <!-- ✅ Updated Footer -->
    <footer class="text-center p-4 mt-6 bg-black text-white">
        <p>&copy; 2025 Football Blog</p>
    </footer>

</div>
</body>
</html>
