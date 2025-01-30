<div>
    <section class="flex flex-col flex-1 gap-2 p-2">
        <div class="flex flex-col gap-4 p-4 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
            <div class="py-4 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">New Score</h1>
            </div>
            @if (session('status'))
                <div
                    class="p-3 mb-2 border rounded-lg
                    {{ session('status.type') === 'success' ? 'bg-green-100 border-green-500 text-green-700' : '' }}
                        {{ session('status.type') === 'error' ? 'bg-red-100 border-red-500 text-red-700' : '' }}">
                    <p class="font-bold">{{ session('status.type') === 'success' ? '✓' : '!' }}
                        {{ session('status.message') }}
                    </p>
                </div>
            @endif

            <form class="flex flex-col gap-4" wire:submit.prevent="save">
                <div class="flex gap-4">
                    <div class="w-full">
                        <input type="text" wire:model='assignment' name="assignment"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="The Score of Assignment">
                        @error('assignment')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="text" wire:model='formative' name="formative"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="The Score for Formative Test">
                        @error('formative')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="w-full">
                        <input type="text" wire:model='midterm' name="midterm"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="The Score of Mid-Term Test">
                        @error('midterm')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <input type="text" wire:model='final' name="final"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="The Score of Final Test">
                        @error('final')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="w-full">
                        <input type="text" wire:model='average' name="average"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="The Average">
                        @error('average')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="w-full">
                        <select wire:model="academic_year_id" id="academic_year_id" name="academic_year_id"
                            class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
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

                <div class="w-full">
                    <textarea wire:model='report' name="report"
                        class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Report">
                        </textarea>
                    @error('report')
                        <small class="text-xs text-red-600">{{ $message }}</small>
                    @enderror

                </div>
                <div class="flex justify-start">
                    <button class="flex items-center rounded default-button" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="hero__icons">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                        </svg>
                        Save

                    </button>
                    <button class="flex items-center ml-2 rounded default-button " type="submit"
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
