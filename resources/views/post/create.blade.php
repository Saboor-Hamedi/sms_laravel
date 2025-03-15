<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
        <div class="action-header">
            <a href="{{ route('post.index') }}" class="default-button" style="font-size: 14px">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        {{-- flash card here --}}

        {{-- form --}}
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                {{-- category --}}
                <select name="category_id" id="category_id" class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    <option value="">Select Category</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </small>
            </div>
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
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    row="3" id="paragraph" name="paragraph" placeholder="Write something...">{{ old('paragraph') }}</textarea>
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('paragraph')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            {{-- tags --}}
            <div class="mt-2">
                <input type="text"
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    id="tags" name="tags" value="{{ old('tags') }}"  placeholder="Tag" autofocus>
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('tags')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            {{-- end --}}
            <div class="mt-2">
                <input type="file" id='image' name="image">
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
                <button type="submit" class="default-button" style="font-size: 14px">
                <i class="mr-2 fa-solid fa-floppy-disk"></i> Submit</button>
            </div>
        </form>
    </div>
    {{-- footer --}}
    @include('components.footer')
</x-app-layout>
