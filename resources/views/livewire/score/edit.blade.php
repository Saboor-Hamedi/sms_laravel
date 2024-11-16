<div>
    <main class="flex h-screen">
        {{-- <livewire:sidebar.sidebar /> --}}
        <section class="flex flex-col flex-1 h-screen gap-2 p-2">
            {{-- <div class="flex-shrink-0">
                <livewire:header.header />
            </div> --}}

            <div class="flex flex-col gap-4 p-4 border border-gray-300 rounded-md shadow-md lg:max-w-full">
                {{-- show flash message --}}
                @if (session()->has('success'))
                    <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                        <p class="font-bold">Informational message</p>
                        <p class="text-sm">{{ session('success') }}.</p>
                    </div>
                @endif

                <form class="flex flex-col gap-4" wire:submit.prevent="edit">
                    <div class="flex gap-4">
                        <div class="w-full">
                            <input type="text" wire:model='assignment' id="assignment" name="assignment"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="The Score of Assignment">
                            @error('assignment')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="w-full">
                            <input type="text" wire:model='formative' id="formative" name="formative"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="The Score for Formative Test">
                            @error('formative')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="w-full">
                            <input type="text" wire:model='midterm' id="midterm" name="midterm"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="The Score of Mid-Term Test">
                            @error('midterm')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="w-full">
                            <input type="text" wire:model='final' id="final" name="final"
                                class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="The Score of Final Test">
                            @error('final')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full">
                        <input type="text" wire:model='average' id="average" name="average"
                            class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="The Average">
                        @error('average')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="w-full">
                        <textarea wire:model='report' id="report" name="report"
                            class="w-full p-3 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Report"></textarea>
                        @error('report')
                            <small class="text-xs text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex justify-start">
                        <button class="px-4 py-2 rounded default-button" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

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
