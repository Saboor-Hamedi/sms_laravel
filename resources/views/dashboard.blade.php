<x-app-layout>
    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- show flash message --}}
                    @if (session()->has('success'))
                        <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                            <p class="font-bold">Informational message</p>
                            <p class="text-sm">{{ session('success') }}.</p>
                        </div>
                    @endif
                    <livewire:score.index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
