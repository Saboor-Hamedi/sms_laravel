<section class="w-full p-2">
    <div class="mx-auto overflow-hidden bg-white rounded-md shadow-md ">
        <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-500">
            <h2 class="text-3xl font-bold text-center text-white">Reports</h2>
        </div>
        <div class="p-6">
            @if (session()->has('parent_message'))
                <div class="px-4 py-3 mb-6 text-blue-700 bg-blue-100 border-t border-b border-blue-500 rounded-lg"
                    role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-sm">{{ session('parent_message') }}.</p>
                    <p><a href="{{ route('user-profile.index') }}" class="text-blue-500 underline">Click here</a></p>
                </div>
            @endif

            @if ($reports->isNotEmpty())
                <div class="space-y-4">
                    @foreach ($reports as $parent)
                        <div class="p-4 border border-gray-200 rounded-lg shadow-sm bg-gray-50">
                            <h4 class="mb-2 text-lg font-semibold text-gray-800">Parent</h4>
                            <p><span class="font-medium text-gray-600">Name:</span> {{ $parent->lastname }}</p>
                            <p><span class="font-medium text-gray-600">Phone:</span> {{ $parent->phone }}</p>

                            @if ($parent->students->isNotEmpty())
                                <h4 class="mt-4 text-lg font-semibold text-gray-800">Students</h4>
                                <ul class="ml-4 list-disc">
                                    @foreach ($parent->students as $student)
                                        <li>
                                            <span class="font-medium text-gray-600">Name:</span>
                                            {{ $student->lastname }}
                                        </li>
                                        <li>
                                            <span class="font-medium text-gray-600">Phone:</span> {{ $student->phone }}
                                        </li>
                                        <li>
                                            <span class="font-medium text-gray-600">Details:</span>
                                            <a href="{{ route('parent.student-details', $student->id) }}" wire:navigate
                                                class="text-blue-500 underline">More Information</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="px-4 py-3 mt-4 text-red-700 bg-red-100 border-t border-b border-red-500 rounded-lg"
                                    role="alert">
                                    <p class="font-bold">Informational message</p>
                                    <p class="text-sm">{{ session('parent_message') }}</p>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $reports->links() }}
                </div>
            @else
                <div class="px-4 py-3 mt-4 text-red-700 bg-red-100 border-t border-b border-red-500 rounded-lg"
                    role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-sm">{{ session('parent_message') }}</p>
                </div>
            @endif
        </div>
    </div>
</section>
