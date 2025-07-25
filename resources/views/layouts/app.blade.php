<?php 

$filter = request()->input('filter', 'default'); 

$title = 'Explora';

if (in_array($filter, ['projects', 'characters', 'backgrounds', 'makes'])) {
    $title = ucfirst($filter);
}
?>





<!DOCTYPE html>
<html class="overflow-x-hidden" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} | ScracthJr Tactile</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    @livewireStyles
    
    <style>
        .trix-button-group--file-tools {
            display: none !important;
        }
        
        [x-cloak] { display: none !important; }
		
		html, body {
            overflow-x: hidden;
        }
        
    </style>
</head>
<!-- Google tag (gtag.js) --> <script async src="https://www.googletagmanager.com/gtag/js?id=G-9RW974KFYB"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-9RW974KFYB'); </script>

<body class="overflow-x-hidden font-sans antialiased">

    <div class="mb-4 " style="min-height: calc(100vh - 200px)">
        @include('layouts.navigation')

        <main class="">
            {{ $slot }} <!-- Muestra el contenido original sin modificar -->
        </main>

        <footer>
            @include('layouts.footer')
        </footer>
    </div>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>

</body>

</html>
