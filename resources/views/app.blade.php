<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Kisantra - Professional consulting services for business transformation, strategic planning, and organizational development. Expert consultants delivering innovative solutions for your business success.">
    <meta name="keywords" content="kisantra, consulting services, business consulting, strategic planning, business transformation, organizational development, management consulting, corporate consulting, business solutions, professional consulting">
    <meta name="author" content="Kisantra">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Kisantra - Professional Consulting Services">
    <meta property="og:description" content="Expert consulting services for business transformation, strategic planning, and organizational development.">
    <meta property="og:image" content="{{ asset('image/Logo/OnlyLogo.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="Kisantra - Professional Consulting Services">
    <meta property="twitter:description" content="Expert consulting services for business transformation, strategic planning, and organizational development.">
    <meta property="twitter:image" content="{{ asset('image/Logo/OnlyLogo.png') }}">

    <title inertia>Kisantra</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/Logo/OnlyLogo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet"> -->

    <!-- Scripts -->
    @viteReactRefresh
    @vite(['resources/css/app.css', 'resources/js/app.tsx'])
    @inertiaHead
</head>
<body class="antialiased">
    @inertia
</body>
</html>
