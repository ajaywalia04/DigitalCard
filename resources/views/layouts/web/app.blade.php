<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Create Your Digital Business Card') }}</title>
    <!-- Load Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @stack('css')
</head>
<body class="antialiased">
    @include('layouts.web.includes.header')
    @yield('content')
    @include('layouts.web.includes.footer')
</body>
</html>
