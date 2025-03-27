<div class="relative search-container" x-data @click.away="$wire.showDropdown = false">
    <input 
        type="text" 
        wire:model.live.debounce.250ms="searchTerm" 
        placeholder="Search posts by title..."
        class="w-full px-4 py-2 border rounded-lg search-input"
        @focus="$wire.showDropdown = true"
    />

    @if($showDropdown)
        <ul class="absolute z-10 w-full mt-1 bg-white border rounded-lg shadow-lg search-dropdown">
            @forelse($results as $result)
                <li wire:key="result-{{ $result->id }}"
                    wire:click="selectPost({{ $result->id }})"
                    class="px-4 py-2 cursor-pointer hover:bg-gray-100">
                    {{ $result->title }}
                </li>
            @empty
                <li class="px-4 py-2 text-gray-500">
                    No results found for "{{ $searchTerm }}"
                </li>
            @endforelse
        </ul>
    @endif
</div>