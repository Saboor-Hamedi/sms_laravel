<div>
    <h3 class="lg:text-2xl md:text-[14px] sm:text-[12px] text-gray-800 font-bold">Reports</h3>
    @foreach ($reports as $report)
        {{ $report->lastname }}
        {{ $report->students()->lastname }}
        @foreach ($report->students as $student)
            {{ $student->lastname ?? 'Not Found' }}
        @endforeach
    @endforeach
</div>
