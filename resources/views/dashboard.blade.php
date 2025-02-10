<x-app-layout>
    @section('title', 'Dashboard')
    <div class="py-2">
        <div class="mx-auto max-w-7xl">
            {{-- @can('admin')
                <livewire:card.details />
            @endcan --}}
            {{-- overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg --}}
            <div class=" ">
                @can('admin')
                    {{-- <livewire:card.details /> --}}
                    <livewire:scores.scores-admin />
                @endcan
                @can('teacher')
                    <livewire:scores.index />
                @endcan
                @can('parent')
                    <livewire:parent.student-parents />
                @endcan
            </div>

        </div>
    </div>
</x-app-layout>
