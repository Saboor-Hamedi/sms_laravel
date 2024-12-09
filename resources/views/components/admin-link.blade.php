@props(['active', 'disabled'])

@php
    $classes = $active
        ? 'text-white hover:bg-gray-500 transition duration-300 ease-in-out border-l-4 border-indigo-500 flex items-center p-2 text-sm font-medium leading-5 mb-1' // Active state
        : 'text-white  hover:bg-gray-700 transition duration-300 ease-in-out flex items-center p-2 mb-1 text-sm'; // Default and hover state
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>
