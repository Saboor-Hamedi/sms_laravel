<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scroll.css') }}" rel="stylesheet">
    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body class="h-screen overflow-auto">
    <!-- Header -->
    <main>
        {{ $slot }}
    </main>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
