<section class="w-full p-2">
    <div class="mx-auto overflow-hidden bg-white rounded-md shadow-md ">
        <div class="p-6 bg-gradient-to-r from-blue-500 to-purple-500">
            <h2 class="text-3xl font-bold text-center text-white">{{ Str::ucfirst($student->user->name) }} Profile</h2>
        </div>
        <div class="p-6">
            <div class="flex flex-col items-center mb-6 text-center md:flex-row md:text-left md:mb-0">
                <img class="object-cover w-24 h-24 mb-4 rounded-full shadow-lg md:mb-0 md:mr-6"
                    src="{{ $student->photo_url }}" alt="{{ $student->user->name }}">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800">{{ Str::ucfirst($student->user->name) }}
                        {{ Str::ucfirst($student->lastname) }}</h3>
                    <p class="text-gray-600">Student ID: {{ $student->user->email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <div class="col-span-2 p-4 rounded-lg bg-gray-50">
                    <h4 class="mb-2 text-lg font-semibold text-gray-700">Personal Information</h4>
                    <p><span class="font-medium text-gray-600">Birthdate:</span> {{ $student->birthdate }}</p>
                    <p><span class="font-medium text-gray-600">Phone:</span> {{ $student->phone }}</p>
                    <p><span class="font-medium text-gray-600">Country:</span> {{ $student->country }}</p>
                    <p><span class="font-medium text-gray-600">State:</span> {{ $student->state }}</p>
                </div>

                <div class="p-4 rounded-lg bg-gray-50 md:col-span-1">
                    <h4 class="mb-2 text-lg font-semibold text-gray-700">Address</h4>
                    <p class="text-gray-600">{{ $student->address }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4 mt-6 md:grid-cols-2">
                <div class="p-4 rounded-lg bg-gray-50">
                    <h4 class="mb-2 text-lg font-semibold text-gray-700">Description</h4>
                    <p class="text-gray-600">{{ $student->description }}</p>
                </div>

                <div class="flex items-center justify-center p-4 rounded-lg bg-gray-50">
                    <div>
                        <span class="mr-2 font-medium text-gray-700">Status:</span>
                        @if ($student->is_active)
                            <span
                                class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full">Active</span>
                        @else
                            <span
                                class="px-3 py-1 text-sm font-semibold text-red-800 bg-red-200 rounded-full">Inactive</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
