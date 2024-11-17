<div>
    {{-- show flash message --}}
    @if (session()->has('success'))
        <div class="px-4 py-3 text-blue-700 bg-blue-100 border-t border-b border-blue-500" role="alert">
            <p class="font-bold">Informational message</p>
            <p class="text-sm">{{ session('success') }}.</p>
        </div>
    @endif
    <section class="flex flex-1 w-full gap-2 mt-2 mb-2">
        <table class="w-full border border-collapse border-gray-300 table-auto">
            <thead>
                <tr class="text-xs bg-gray-100">
                    <th class="px-4 py-2 text-left border border-gray-300">Assignment</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Formative</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Mid-Term</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Final</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Average</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Report</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Edit</th>
                    <th class="px-4 py-2 text-left border border-gray-300">Delete</th>
                </tr>
            </thead>
            <tbody class="text-xs">
                @foreach ($scores as $score)
                    <tr class="odd:bg-gray-100 even:bg-gray-200">
                        <td class="px-4 py-2 border border-gray-300">{{ $score->assignment }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $score->formative }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $score->midterm }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $score->final }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ $score->average }}</td>
                        <td class="px-4 py-2 border border-gray-300">{{ Str::limit($score->report, 20, '...') }}</td>
                        @role(['teacher', 'manager'])
                            <td class="px-4 py-2 border border-gray-300">
                                <a class="text-blue-500 hover:text-blue-700"
                                    href="{{ route('scores.edit', $score->id) }}">Edit</a>
                            </td>
                            <td class="px-4 py-2 border border-gray-300">
                                <button type="submit" class="default-button"
                                    wire:click="delete({{ $score->id }})">Delete</button>
                            </td>
                        @endrole
                    </tr>
                @endforeach
                <tr class="text-xs bg-gray-100">
                    @if ($scores->isNotEmpty() && $scores->first()->user_id == auth()->user()->id)
                        <th colspan="8" class="p-3 text-left border border-gray-300 ">
                            {{ Str::ucfirst(auth()->user()->name) }}
                        </th>
                    @else
                        <th colspan="8" class="p-3 text-left border border-gray-300 ">
                            {{ __('N/A') }}
                        </th>
                    @endif
                </tr>
            </tbody>
        </table>
    </section>
    {{ $scores->links() }}
</div>
