<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fragrance Guide</title>
    <!-- Include any CSS here -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>
    <h1>Welcome to the Fragrance Guide</h1>
    <nav>
        <a href="{{ route('fragrances.index') }}">Home</a>
        <a href="{{ route('fragrances.create') }}">Add Fragrance</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} Fragrance Guide</p>
</footer>
</body>
</html>
