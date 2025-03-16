<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Blog</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav>
    <a href="/">Home</a>
    <a href="/news">News</a>
    <a href="/teams">Teams</a>
    <a href="/fixtures">Fixtures</a>
    <a href="/contact">Contact</a>
</nav>

<div class="content">
    @yield('content')
</div>

<footer>
    <p>&copy; 2025 Football Blog</p>
</footer>
</body>
</html>
