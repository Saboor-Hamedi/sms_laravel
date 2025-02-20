<div class="p-2">
    {{-- This is the section where all component goes inside --}}
    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        @if (!empty($title))
            <div class="flex items-center justify-between p-2 text-lg text-white bg-gray-900">
                <h5>{{ $title ?: '' }}</h5>
            </div>
        @endif
        {{ $slot }}
    </section>
</div>
