<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'JCM Fitness') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <meta property="og:title" content="{{ config('app.name', 'JCM Fitness') }}" />
        <meta property="og:description" content="Personalized training programs tailored just for you. Get started with JCM Fitness today!" />
        <meta property="og:image" content="https://jcmfitness.com/img/COLINM-t.jpg" />
        <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="630" />
        <meta property="og:url" content="https://jcmfitness.com" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="JCM Fitness" />

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="{{ config('app.name', 'JCM Fitness') }}" />
        <meta name="twitter:description"  content="Personalized training programs tailored just for you. Get started with JCM Fitness today!" />
        <meta name="twitter:image" content="https://jcmfitness.com/img/COLINM-t.jpg" />

        @routes
        @vite(['resources/js/app.ts'])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
