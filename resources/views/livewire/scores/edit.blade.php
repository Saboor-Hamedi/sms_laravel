<div>
    @section('title', 'Edit Score')
    <section class="w-full">
        <div class="flex flex-col flex-1  gap-2 p-2">
            <div class="flex flex-col gap-4 p-4 border rounded-sm shadow-sm lg:max-w-full bg-white">
                {{-- Flash message --}}
                @if (session()->has('success'))
                    <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                        <p class="font-bold">Informational message</p>
                        <p class="text-sm">{{ session('success') }}.</p>
                    </div>
                @endif

                <form class="flex flex-col gap-4" wire:submit.prevent="edit">
                    <!-- First Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label for="assignment" class="block text-sm font-medium text-gray-700 mb-1">Assignment
                                Score</label>
                            <input type="text" wire:model='assignment' id="assignment" name="assignment"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter Assignment Score">
                            @error('assignment')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="formative" class="block text-sm font-medium text-gray-700 mb-1">Formative Test
                                Score</label>
                            <input type="text" wire:model='formative' id="formative" name="formative"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter Formative Test Score">
                            @error('formative')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="w-full">
                            <label for="midterm" class="block text-sm font-medium text-gray-700 mb-1">Midterm Test
                                Score</label>
                            <input type="text" wire:model='midterm' id="midterm" name="midterm"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter Midterm Test Score">
                            @error('midterm')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="final" class="block text-sm font-medium text-gray-700 mb-1">Final Test
                                Score</label>
                            <input type="text" wire:model='final' id="final" name="final"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Enter Final Test Score">
                            @error('final')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Average -->
                    <div class="w-full">
                        <label for="average" class="block text-sm font-medium text-gray-700 mb-1">Average</label>
                        <input type="text" wire:model='average' id="average" name="average"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter Average">
                        @error('average')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Report -->
                    <div class="w-full">
                        <label for="report" class="block text-sm font-medium text-gray-700 mb-1">Report</label>
                        <textarea wire:model='report' id="report" name="report"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter Report"></textarea>
                        @error('report')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-start gap-2">
                        <button class="default-button rounded" type="submit">
                            Submit
                        </button>
                        <button class="default-button rounded" type="button" wire:click.prevent="cancel">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
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
