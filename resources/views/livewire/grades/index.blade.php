<div>
    @section('title', 'Grades')

    <section class="py-2">
        <div class="p-2 mx-auto max-w-7xl">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg ">
                <div class="w-full p-4 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">Grades</h1>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        @foreach ($grades as $grade)
                            <h2>{{ $grade->name }}</h2>
                            {{ $grade->teacher->name }}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
