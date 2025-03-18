<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/front-page.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-button.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>

<body>
    <x-front-header />
    <main
        class
            ="flex flex-col items-center justify-center p-2 mt-6 bg-gray-50 dark:bg-gray-900">
        <div
            class="w-full p-4 px-6 py-4 overflow-hidden bg-white rounded-md shadow-md sm:max-w-md dark:bg-gray-800 ">
            {{ $slot }}
        </div>
    </main>
    @vite(['resources/js/app.js'])
    {{-- <script>
        document.querySelector('.front-menu-toggle').addEventListener('click', () => {
            document.querySelector('.front-nav').classList.toggle('active');
        });
    </script> --}}
</body>

</html>
