<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Keep only these font/style links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <link rel="icon" href="{{ asset('image/Logo/OnlyLogo.png') }}">

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title', 'Kisantra')</title>
    <meta name="description" content="@yield('meta_description', 'Kisantra')">
    <meta name="keywords" content="@yield('meta_keywords', 'default, keywords')">

    <!-- SEO Meta Tags -->
    <meta name="author" content="Kisantra">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="@yield('title', 'Kisantra')">
    <meta property="og:description" content="@yield('meta_description', 'Kisantra')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
</head>

<body class="font-sans">
    @include('layouts.partials.navigation')

    <main>
        {{ $slot }}
    </main>

    @if(!request()->routeIs('home.index'))
        @include('layouts.partials.footer')
    @endif

    @filamentScripts
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    </script>
</body>

</html> 