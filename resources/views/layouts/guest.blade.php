<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <div>
        <nav class="max-w-full bg-white shadow-sm border-b border-gray-100 dark:bg-gray-800 dark:border-gray-700">
            <!-- Primary Navigation Menu -->
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')" wire:navigate='register'>
                                {{ __('Register') }}
                            </x-nav-link>
                            <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')" wire:navigate='login'>
                                {{ __('Back') }}
                            </x-nav-link>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <div
            class="mx-auto max-w-full sm:max-w-md  mt-10 px-6 py-4 bg-white  dark:bg-gray-800 shadow-md overflow-hidden rounded">
            {{ $slot }}
        </div>
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
