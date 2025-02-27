<x-custom-section title="Grades">
    @section('title', 'Grades')
    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg ">

        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="overflow-x-auto custom__scroll__x">
                @if ($grades->isNotEmpty())
                    <table class="w-full border border-collapse border-gray-300 table-auto ">
                        <thead>
                            <tr class="text-xs text-center bg-gray-100">
                                {{-- <th class="px-4 py-2 border border-gray-300">Student Name</th> --}}
                                <th class="px-4 py-2 border border-gray-300">Subject Name</th>
                                <th class="px-4 py-2 border border-gray-300">Student Name</th>
                                <th class="px-4 py-2 border border-gray-300">Academic Year</th>

                            </tr>
                        </thead>
                        @foreach ($grades as $grade)
                            <tr class="text-center odd:bg-gray-100 even:bg-gray-200">
                                {{-- <td class="px-4 py-2 border border-gray-300">{{ $grade->teacher->name }}</td> --}}
                                <td class="px-4 py-2 border border-gray-300">
                                    {{ Str::ucfirst($grade->subject_name) }}
                                </td>

                                @foreach ($grade->students as $student)
                                    <td class="px-4 py-2 border border-gray-300">
                                        {{ Str::ucfirst($student->lastname) }}
                                    </td>
                                @endforeach

                                <td class="px-4 py-2 border border-gray-300">
                                    {{ optional($grade->academic)->year }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="mt-2">
                        {{ $grades->links() }}
                    </div>
                @else
                    <p class="text-center">No grades found.</p>
                @endif
            </div>
        </div>
    </div>
</x-custom-section>
