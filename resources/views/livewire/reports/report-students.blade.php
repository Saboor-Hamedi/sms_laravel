<div>
    <h1>Report of Students </h1>
    @if ($reports->isNotEmpty())
        @foreach ($reports as $report)
            <p>{{ $report->lastname }} {{ $report->name }}</p>
        @endforeach
    @else
        <p>No reports found.</p>
    @endif
</div>
