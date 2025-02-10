<div class="p-2">
    @section('title', 'Academic Year Scores')
    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        <div class="flex items-center justify-between p-2 bg-gray-900 text-white lg:[22px] md:text-[18] sm:[14px]">
            <h5>Academic Year Scores</h5>
        </div>
        <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="mb-2 ml-2 lg:text-[16px] md:text-[14px] sm:text-[12px] text-gray-900">Academic Year:
                        {{ $year }}
                    </h5>
                    @if ($scores->isNotEmpty())
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
                                        <th class="px-4 py-2 border border-gray-300">Edit</th>
                                        <th class="px-4 py-2 border border-gray-300">Delete</th>
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
                                            <td class="px-4 py-2 border border-gray-300">
                                                {{ $score->academic->year ?? 'N/A' }}</td>
                                            <td class="px-4 py-2 border border-gray-300">
                                                {{ Str::limit($score->report, 20, '...') }}</td>
                                            <td class="px-2 py-2 border border-gray-300 ">
                                                <a class="default-button text-[10px] rounded"
                                                    href="{{ route('scores.edit-score', $score->id) }}">Edit</a>
                                            </td>
                                            <td class="px-2 py-2 border border-gray-300 ">
                                                <button type="button" class="default-button text-[10px] rounded"
                                                    wire:click="delete({{ $score->id }})"
                                                    onclick="confirm('Are you sure you want to delete this score?') || event.stopImmediatePropagation()">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-2">
                            {{ $scores->links() }}
                        </div>
                    @else
                        <div class="py-4 text-center text-gray-700">
                            No scores found for Academic Year {{ $year }}.
                        </div>
                    @endif
                </div>
            </div>
        </div>

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
    </section>

</div>
