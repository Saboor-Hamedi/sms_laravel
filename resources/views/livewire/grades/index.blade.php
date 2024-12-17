<div>
    @section('title', 'Grades')

    <section class="py-2">
        <div class="p-2 mx-auto max-w-7xl">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg ">
                <div class="w-full p-4 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">Grades</h1>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto custom__scroll__x">
                        <table class="w-full border border-collapse border-gray-300 table-auto ">
                            <thead>
                                <tr class="text-xs text-center bg-gray-100">
                                    {{-- <th class="px-4 py-2 border border-gray-300">Student Name</th> --}}
                                    <th class="px-4 py-2 border border-gray-300">Subject Name</th>
                                    <th class="px-4 py-2 border border-gray-300">Student Name</th>
                                    <th class="px-4 py-2 border border-gray-300">Final</th>
                                    <th class="px-4 py-2 border border-gray-300">Average</th>
                                    <th class="px-4 py-2 border border-gray-300">Year</th>
                                    <th class="px-4 py-2 border border-gray-300">Report</th>
                                </tr>
                            </thead>
                            @foreach ($grades as $grade)
                                <tr class="text-center odd:bg-gray-100 even:bg-gray-200">
                                    {{-- <td class="px-4 py-2 border border-gray-300">{{ $grade->teacher->name }}</td> --}}
                                    <td class="px-4 py-2 border border-gray-300">
                                        {{ Str::ucfirst($grade->subject_name) }}</td>
                                    @foreach ($grade->students as $student)
                                        <td class="px-4 py-2 border border-gray-300">{{ Str::ucfirst($student->name) }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
