<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Haven - @yield('title', 'Welcome')</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />  
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <main>
        @yield('content')
    </main>
</body>
</html>
