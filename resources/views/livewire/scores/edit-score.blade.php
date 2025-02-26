<div class="p-2">
    @section('title', 'Edit Score')
    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        <!-- Header -->
        <div class="flex items-center justify-between p-2 bg-gray-900 text-white lg:[22px] md:text-[18] sm:[14px]">
            <h5>Edit Score</h5>
        </div>

        <div class="flex flex-col gap-2 p-4">
            {{-- Flash message --}}
            @if (session()->has('success'))
                <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-[10px]">{{ session('success') }}.</p>
                </div>
            @endif

            <form wire:submit="edit">
                <!-- First Row -->
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="w-full">
                        <label for="assignment" class="block text-[10px]  text-gray-700 mb-1">Assignment
                            Score</label>
                        <input type="text" wire:model.live='assignment' id="assignment" name="assignment"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter Assignment Score">
                        @error('assignment')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="formative" class="block text-[10px]  text-gray-700 mb-1">Formative Test
                            Score</label>
                        <input type="text" wire:model.live='formative' id="formative" name="formative"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter Formative Test Score">
                        @error('formative')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Second Row -->
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="w-full">
                        <label for="midterm" class="block text-[10px]  text-gray-700 mb-1">Midterm Test
                            Score</label>
                        <input type="text" wire:model.live='midterm' id="midterm" name="midterm"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter Midterm Test Score">
                        @error('midterm')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="final" class="block text-[10px]  text-gray-700 mb-1">Final Test
                            Score</label>
                        <input type="text" wire:model.live='final' id="final" name="final"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter Final Test Score">
                        @error('final')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Average -->
                <div class="w-full">
                    <label for="average" class="block text-[10px]  text-gray-700 mb-1">Average</label>
                    <input type="text" wire:model.live='average' id="average" name="average"
                        class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter Average">
                    @error('average')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Report -->
                <div class="w-full mb-0">
                    <label for="report" class="block text-[10px]  text-gray-700 mb-1">Report</label>
                    <textarea wire:model.live='report' id="report" name="report"
                        class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter Report"></textarea>
                    @error('report')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex justify-start gap-2 ">
                    <button class="default-button rounded flex justify-center items-center" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        Update
                    </button>
                    <button class="default-button rounded flex justify-center items-center" type="button"
                        wire:click.prevent="cancel">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </section>
    </section>


    <script>
        document.querySelectorAll(
            'input[name="assignment"], input[name="formative"], input[name="midterm"], input[name="final"]').forEach(
            input => {
                input.addEventListener('input', calculateAverage);
            });

        function calculateAverage() {
            const assignment = parseFloat(document.querySelector('input[name="assignment"]').value) || 0;
            const formative = parseFloat(document.querySelector('input[name="formative"]').value) || 0;
            const midterm = parseFloat(document.querySelector('input[name="midterm"]').value) || 0;
            const final = parseFloat(document.querySelector('input[name="final"]').value) || 0;

            const totalScores = assignment + formative + midterm + final;
            const numberOfScores = [assignment, formative, midterm, final].filter(score => score > 0).length;

            const average = numberOfScores > 0 ? totalScores / numberOfScores : 0;

            document.querySelector('input[name="average"]').value = average.toFixed(2); // Update the average input
            // update average in the parent component
            @this.set('average', average.toFixed(2));
        }
    </script>
</div>
