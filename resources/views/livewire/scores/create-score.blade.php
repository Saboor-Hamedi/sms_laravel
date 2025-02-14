<div class="p-2">
    @section('title', 'Create Score')

    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        <!-- Header -->
        <div class="flex items-center justify-between p-2 bg-gray-900 ">
            <h5 class="text-white lg:[22px] md:text-[18] sm:[14px]">Create Score</h5>
        </div>
        <div class="flex flex-col gap-2 p-4">
            <!-- Status Message -->
            @if (session('status'))
                <div
                    class="p-3 mb-2 border rounded-lg
                {{ session('status.type') === 'success' ? 'bg-green-100 border-green-500 text-green-700' : '' }}
                {{ session('status.type') === 'error' ? 'bg-red-100 border-red-500 text-red-700' : '' }}">
                    <p class="font-bold">
                        {{ session('status.type') === 'success' ? '✓' : '!' }} {{ session('status.message') }}
                    </p>
                </div>
            @endif
            <!-- Form -->
            <form wire:submit.prevent="save">
                <!-- Assignment & Formative Fields -->
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="w-full">
                        <label for="assignment" class="block text-[10px] text-gray-700 ">Assignment Score</label>
                        <input id="assignment" type="text" wire:model="assignment" name="assignment"
                            class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter assignment score">
                        @error('assignment')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="formative" class="block text-[10px] text-gray-700 ">Formative Test
                            Score
                        </label>
                        <input id="formative" type="text" wire:model="formative" name="formative"
                            class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter formative test score">
                        @error('formative')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Mid-Term & Final Fields -->
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="w-full">
                        <label for="midterm" class="block text-[10px] text-gray-700 ">Mid-Term Test
                            Score</label>
                        <input id="midterm" type="text" wire:model="midterm" name="midterm"
                            class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter mid-term test score">
                        @error('midterm')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="final" class="block text-[10px] text-gray-700 ">Final Test Score</label>
                        <input id="final" type="text" wire:model="final" name="final"
                            class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter final test score">
                        @error('final')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Average & Academic Year Fields -->
                <div class="flex flex-col gap-4 md:flex-row">
                    <div class="w-full">
                        <label for="average" class="block text-[10px] text-gray-700 ">Average Score</label>
                        <input id="average" type="text" wire:model="average" name="average"
                            class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Enter average score">
                        @error('average')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="academic_year_id" class="block text-[10px] text-gray-700 ">Academic
                            Year</label>
                        <select id="academic_year_id" wire:model="academic_year_id" name="academic_year_id"
                            class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Select Year</option>
                            @foreach ($academic_years as $id => $year)
                                <option value="{{ $id }}">{{ $year }}</option>
                            @endforeach
                        </select>
                        @error('academic_year_id')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Report Field -->
                <div class="w-full">
                    <label for="report" class="block text-[10px] text-gray-700 ">Report</label>
                    <textarea id="report" wire:model="report" name="report"
                        class="w-full p-2 mt-1 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter report"></textarea>
                    @error('report')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-start gap-2">
                    <button class="flex items-center rounded default-button" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                        </svg>
                        Save
                    </button>
                    <button class="flex items-center rounded default-button" type="button" wire:click.prevent="cancel">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </section>

    <script>
        // calculate average on input change
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
