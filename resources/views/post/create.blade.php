<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
        <div>
            <a href="{{ route('post.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i> Back
            </a>
        </div>
        {{-- flash card  --}}
        @if (session('status'))
            <div class="flex items-center px-4 py-3 mt-1 text-sm font-bold text-white bg-blue-500" role="alert">
                <svg class="w-4 h-4 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                </svg>
                <p>{{ session('status') }}</p>
            </div>
        @endif
        {{-- form --}}
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <input type="text"
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    id="title" value="{{ old('title') }}" name="title" placeholder="Title">
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('title')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            <div class="mt-2">
                <textarea type="text"
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" row="3" id="paragraph" name="paragraph" placeholder="Write something...">{{ old('paragraph') }}</textarea>
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('paragraph')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            <div class="mt-2">
                <input type="file" id='image' name="image" >
                @error('image')
                    <small class="p-0 mt-0 text-xs text-red-500">{{ $message }}</small>
                @enderror
            </div>
            {{-- check box --}}
            <div class="mt-2">
                <div class="flex items-center mb-4">
                    <input id="is_published" name="is_published" type="checkbox" value="1"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="is_published"
                        class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Publish</label>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
        </form>
    </div>
    {{-- footer --}}
    @include('components.footer')
</x-app-layout>
