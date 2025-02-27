<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-2xl p-6 mx-auto text-center">
            <h1 class="mb-4 text-4xl font-bold text-gray-800">Welcome to {{ config('app.name', 'Laravel') }}</h1>
            <p class="mb-6 text-lg text-gray-600">
                A place to explore, build, and enjoy. Get started with your journey today!
            </p>
            <div class="space-x-4">
                <a href="/register"
                    class="inline-block px-6 py-3 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    Register
                </a>
                <a href="/login"
                    class="inline-block px-6 py-3 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    Login
                </a>
                <a href="#"
                    class="inline-block px-6 py-3 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                    Learn More
                </a>
            </div>
        </div>
    </div>
    @vite(['resources/js/app.js'])
</body>

</html>
