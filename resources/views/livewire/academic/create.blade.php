<div>
    <link href="{{ asset('css/flatpickr.css') }}" rel="stylesheet">

    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <h1 class="ml-2 sm:text-md text-xl font-bold text-gray-800">New Academic Year</h1>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session()->has('success'))
                        <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500"
                            role="alert">
                            <p class="font-bold">Informational message</p>
                            <p class="text-sm">{{ session('success') }}.</p>
                        </div>
                    @endif
                    <form wire:submit.prevent='save'>
                        <div class="w-full">
                            {{-- <x-flatpickr wire:model="academic_year" id="academic_year" name="academic_year" /> --}}
                            <input type="text" wire:model="academic_year" id="academic_year" name="academic_year"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                class="form-control" placeholder="Academic Year">
                            @error('academic_year')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <button class="default-button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/flatpickr.js') }}"></script>

    <script>
        flatpickr("#academic_year", {
            // dateFormat: "Y",
            // dateFormat: "Y-m-d",
            // dateFormat: "Y-m-d H:i:S",
            dateFormat: "Y",
            minDate: "2021-01-01",
            // remove the dropdown for months
            monthSelectorType: "static",
            yearSelectorType: "static",
            // function(date) {
            //     return (date.getDay() === 0 || date.getDay() === 6);
            // }

            // flatpickr-calendar animate arrowTop arrowLeft open resize it
            onOpen: function(selectedDates, dateStr, instance) {
                document.querySelector(".flatpickr-calendar").classList.add("animate__animated",
                    "animate__fadeIn")
            },


        });
    </script>

</div>
