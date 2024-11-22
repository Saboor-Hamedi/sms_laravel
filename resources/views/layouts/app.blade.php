<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/scroll.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet">

    @livewireStyles
    {{-- @bukStyles(true) --}}
    @vite('resources/css/app.css')
</head>

<body>
    {{-- flex h-screen --}}
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @if (Auth::check())
            <livewire:layout.navigation />
        @endif
        <main>
            {{ $slot }}
        </main>
    </div>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/editor.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
    @livewireScripts
    {{-- @bukScripts(true) --}}
    @vite('resources/js/app.js')
</body>

</html>
