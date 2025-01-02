<x-app-layout>
    @section('title', 'Dashboard')
    <div class="py-2">
        <div class="p-2 mx-auto max-w-7xl">
            @can('admin')
                <livewire:card.details />
            @endcan
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg ">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @can('admin')
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
    </div>
</x-app-layout>
