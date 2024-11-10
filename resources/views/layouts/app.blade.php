<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragrance Guide</title>
    <!-- Include any CSS here -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
</head>
<body>
<header>
    <h1>Welcome to the Fragrance Guide</h1>
    <nav>
        <a href="{{ route('fragrances.index') }}">Home</a>
        <a href="{{ route('fragrances.create') }}">Add Fragrance</a>
        <a href="{{ route('fragrances.about') }}">About</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer style="text-align: center;">
    <p>Fragrance Guide by Muhammad Semab</p>
</footer>
</body>
</html>
