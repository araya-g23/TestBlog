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
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">⚽ Blog</a>

            <!-- Hamburger -->
            <button class="md:hidden block" id="navToggle">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Nav Links -->
            <ul id="navMenu" class="hidden md:flex space-x-6 text-white">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('blog.index') }}">All News</a></li>
                <li><a href="{{ route('teams.index') }}">Teams</a></li>
                <li><a href="{{ route('matches.index') }}">Fixtures</a></li>
                <li><a href="{{ route('contact.show') }}">Contact</a></li>

                @auth
                    <li><a href="{{ route('blog.create') }}" class="text-green-400">Create Post</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>

        <!-- Dropdown Menu (Mobile) -->
        <div id="mobileMenu" class="md:hidden hidden mt-2 px-4">
            <ul class="space-y-2">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('blog.index') }}">All News</a></li>
                <li><a href="{{ route('teams.index') }}">Teams</a></li>
                <li><a href="{{ route('matches.index') }}">Fixtures</a></li>
                <li><a href="{{ route('contact.show') }}">Contact</a></li>
                @auth
                    <li><a href="{{ route('blog.create') }}" class="text-green-400">Create Post</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>

        <!-- Toggle Script -->
        <script>
            document.getElementById('navToggle').addEventListener('click', function () {
                document.getElementById('mobileMenu').classList.toggle('hidden');
            });
        </script>
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
