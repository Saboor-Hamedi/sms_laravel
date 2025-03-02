@props(['active'])

@php
    // Define classes based on the active state
    $classes = $active ?? false ? 'menu-item active' : 'menu-item';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
