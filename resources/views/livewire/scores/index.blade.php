<div class="p-2">
    @section('title', 'Scores')
    <section class="flex flex-col gap-1 bg-white border border-gray-300 rounded-md shadow-md lg:max-w-full">
        <div class="flex items-center justify-between p-2 bg-gray-900 text-white lg:[22px] md:text-[18] sm:[14px]">
            <h5>Create Score</h5>
        </div>
        @livewire('reports.scores')
        @foreach ($groupedScores as $year => $yearScores)
            <h5 class="mb-2 ml-2 lg:text-[16px] md:text-[14px] sm:text-[12px] text-gray-900">
                Academic Year: {{ $year }}
            </h5>
            <div class="overflow-x-auto custom__scroll__x">
                <table class="w-full border border-collapse border-gray-300 table-auto ">
                    <thead>
                        <tr class="text-xs text-center bg-gray-100">
                            <th class="px-4 py-2 border border-gray-300">Assignment</th>
                            <th class="px-4 py-2 border border-gray-300">Formative</th>
                            <th class="px-4 py-2 border border-gray-300">Mid-Term</th>
                            <th class="px-4 py-2 border border-gray-300">Final</th>
                            <th class="px-4 py-2 border border-gray-300">Average</th>
                            <th class="px-4 py-2 border border-gray-300">Year</th>
                            <th class="px-4 py-2 border border-gray-300">Report</th>
                            @if ($scores->isNotEmpty() && $scores->first()->user_id == auth()->user()->id)
                                <th class="px-4 py-2 border border-gray-300 rounded">Edit</th>
                                <th class="px-4 py-2 border border-gray-300 rounded">Delete</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-xs">
                        @foreach ($yearScores as $score)
                            <tr class="text-center odd:bg-gray-100 even:bg-gray-200">
                                <td class="px-4 py-2 border border-gray-300">{{ $score->assignment }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->formative }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->midterm }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->final }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->average }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ $score->academic->year ?? 'N/A' }}</td>
                                <td class="px-4 py-2 border border-gray-300">{{ Str::limit($score->report, 20, '...') }}
                                </td>
                                <td class="px-2 py-2 border border-gray-300 ">
                                    <a class="default-button text-[10px] rounded" wire:navigate='scores.edit-score'
                                        href="{{ route('scores.edit-score', $score->id) }}">Edit</a>
                                </td>
                                <td class="px-2 py-2 border border-gray-300 ">
                                    <button type="submit" class="default-button text-[10px] rounded"
                                        wire:click="delete({{ $score->id }})"
                                        wire:confirm="Are you sure you want to delete this score?">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="text-xs bg-gray-100">
                            @if ($scores->isNotEmpty() && $scores->first()->user_id == auth()->user()->id)
                                <th colspan="9" class="p-3 text-left border border-gray-300 ">
                                    {{ Str::ucfirst(auth()->user()->name) }}
                                </th>
                            @else
                                <th colspan="9" class="p-3 text-left border border-gray-300 ">
                                    {{ __('N/A') }}
                                </th>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>
        @endforeach
    </section>
    {{ $scores->links() }}
</div>
