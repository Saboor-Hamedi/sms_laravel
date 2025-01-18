<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div class="max-w-full h-screen">
        <nav class="max-w-full bg-white shadow-sm border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="mx-auto max-w-full">
                <div class="flex justify-between h-16">
                    <livewire:header.fheader />
                </div>
            </div>
        </nav>

        <div
            class="mx-auto max-w-full sm:max-w-md mt-14 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded">
            {{ $slot }}
        </div>
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
