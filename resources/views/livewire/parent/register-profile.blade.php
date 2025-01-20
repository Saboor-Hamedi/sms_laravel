<div class="border-b border-gray-200">
    @if ($parents->isEmpty())
        <p class="text-gray-600 mb-4">No parent records found. <a href="{{ route('dashboard') }}"
                class="text-blue-500 underline">Create Profile</a></p>
    @else
        <div class="">
            @foreach ($parents as $parent)
                <div class="">
                    <h3 class="text-xl font-bold text-gray-800">{{ Str::ucfirst($parent->user->name ?? '') }}
                        {{ Str::ucfirst($parent->lastname) }}</h3>
                    <p class="text-sm text-gray-600">Phone: {{ $parent->phone }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
