<x-custom-section title='New Academic Year'>
    <div class="p-2 text-gray-900 dark:text-gray-100">
        @if (session()->has('success'))
            <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                <p class="font-bold">Informational message</p>
                <p class="text-sm">{{ session('success') }}.</p>
            </div>
        @endif
        <form wire:submit='save'>
            <div class="w-full">
                <label for="academic_year" class="block text-[10px] text-gray-700 ">Academic Year</label>
                <input type="text" wire:model.live="academic_year" id="academic_year" name="academic_year"
                    class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    class="form-control" placeholder="Academic Year">
                @error('academic_year')
                    <small class="text-xs text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="mt-2">
                <button class="flex items-center justify-center rounded default-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                    </svg>
                    Save
                </button>
            </div>
        </form>
    </div>
    <script>
        function initializeFlatpickr() {
            const element = document.querySelector("#academic_year");
            if (element) {
                flatpickr(element, {
                    dateFormat: "Y",
                    minDate: "2021-01-01",
                    monthSelectorType: "static",
                    yearSelectorType: "static",
                    onOpen: function(selectedDates, dateStr, instance) {
                        document.querySelector(".flatpickr-calendar").classList.add(
                            "animate__animated",
                            "animate__fadeIn"
                        );
                    },
                });
            }
        }

        document.addEventListener('DOMContentLoaded', initializeFlatpickr);
        document.addEventListener('livewire:navigated', initializeFlatpickr);
    </script>
</x-custom-section>
