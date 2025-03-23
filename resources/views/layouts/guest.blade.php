<!-- guest.blade.php -->
<x-front-layout>
    <x-front-header />
    <div class="flex items-center justify-center h-full main">
        <div class="w-full p-4 px-6 py-4 overflow-hidden rounded-md shadow-md sm:max-w-md">
            {{ $slot }}
        </div>
    </div>
</x-front-layout>