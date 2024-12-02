<x-app-layout>
    <div class="py-2">
        <div class="p-2 mx-auto max-w-7xl">
            <livewire:top-cards />
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->hasRole('admin'))
                        <livewire:scores.scores-admin />
                    @elseif (Auth::user()->hasRole('teacher'))
                        <livewire:scores.index />
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
