<div class="p-2">
    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        <div class="flex items-center justify-between p-2 bg-gray-900 ">
            <h5 class="text-white lg:[22px] md:text-[18] sm:[14px]">New Academic Year</h5>
        </div>
        <div class="flex flex-col gap-2 p-4">
            {{-- show flash message --}}
            @if (session()->has('success'))
                <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-sm">{{ session('success') }}.</p>
                </div>
            @endif
            {{-- report's button  --}}
            @livewire('reports.scores')
            <div class="overflow-x-auto custom__scroll__x">
                <table class="w-full border border-collapse border-gray-300 table-auto">
                    <thead>
                        <tr class="text-xs text-center bg-gray-100">
                            <th class="px-4 py-2 border border-gray-300">Assignment</th>
                            <th class="px-4 py-2 border border-gray-300">Formative</th>
                            <th class="px-4 py-2 border border-gray-300">Mid-Term</th>
                            <th class="px-4 py-2 border border-gray-300">Final</th>
                            <th class="px-4 py-2 border border-gray-300">Average</th>
                            <th class="px-4 py-2 border border-gray-300">Year</th>
                            <th class="px-4 py-2 border border-gray-300">Report</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($scores as $score)
                            <tr class="text-center odd:bg-gray-100 even:bg-gray-200">
                                <td class="px-4 py-2 border border-gray-300">{{ $score->assignment }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->formative }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->midterm }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->final }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->average }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->academic->year ?? 'N/A' }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ Str::limit($score->report, 20, '...') }}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{ $scores->links() }}

    <style>
        .custom__scroll__x::-webkit-scrollbar {
            width: 2px;
            height: 5px;
        }

        .custom__scroll__x::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 10px;
        }

        .custom__scroll__x::-webkit-scrollbar-thumb {
            background: #000000;
            border-radius: 10px;
        }

        /* .custom__scroll__x::-webkit-scrollbar-thumb:hover {
            background: #2e2e2e;
        } */
    </style>
</div>
