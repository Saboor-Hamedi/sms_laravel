<div>
    <h3 class="lg:text-2xl md:text-[14px] sm:text-[12px] text-gray-800 font-bold">Reports</h3>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($reports->isNotEmpty())
        @foreach ($reports as $parent)
            <div>
                <p>Parent: {{ $parent->lastname }} | Phone: {{ $parent->phone }}</p>
                @if ($parent->students->isNotEmpty())
                    <ul>
                        @foreach ($parent->students as $student)
                            <li>Student: {{ $student->lastname }} | Phone: {{ $student->phone }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>No students found for this parent.</p>
                @endif
            </div>
        @endforeach

        {{ $reports->links() }} <!-- Pagination links -->
    @else
        <p>No parent data available.</p>
    @endif


</div>
