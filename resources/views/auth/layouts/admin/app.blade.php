<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    <!-- Load Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @stack('css')

</head>
<body class="antialiased">
    @include('auth.layouts.admin.includes.header')
    @yield('content')
    @include('auth.layouts.admin.includes.footer')
    @stack('scripts')
</body>
</html>
