<div>
    <div class="py-2">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="py-4 bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">
                            Scores for Academic Year {{ $year }}
                        </h1>
                    </div>
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
                                                    href="{{ route('scores.edit', $score->id) }}">Edit</a>
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
</div>
