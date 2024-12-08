<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'SMS') }} - @yield('title')</title>

    {{-- Custom CSS --}}
    <link href="{{ asset('css/dashboard__content.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scroll.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet">

    @livewireStyles
    @vite('resources/css/app.css')

    <style>

    </style>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    <livewire:sidebar.dashboard-sidebar />


    <main class="dashboard__content " id="dashboard__content">
        {{ $slot }}
    </main>

    {{-- Custom JavaScript --}}
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/admin_nested_menu.js') }}"></script>
    <script src="{{ asset('js/admin_sidebar.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>

    @livewireScripts
    @vite('resources/js/app.js')


</body>

</html>
