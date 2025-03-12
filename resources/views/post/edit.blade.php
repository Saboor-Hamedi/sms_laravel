<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')
    
    <div class="main-content">
        <div>
            <a href="{{ route('post.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>
        @if(isset($errors) && $errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        {{-- form --}}
        <form action="{{ route('post.update', $post->slug ?? $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mt-2">
                <input type="text"
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    id="title" value="{{ old('title', $post->title) }}" name="title" placeholder="Title">
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('title')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            <div class="mt-2">
                <textarea type="text"
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    row="3" id="paragraph" name="paragraph" placeholder="Write something...">{{ old('paragraph', $post->paragraph) }}</textarea>
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('paragraph')
                        {{ $message }}
                    @enderror
                </small>
            </div>
            {{-- tag --}}

            <div class="mt-2">
                <input type="text"
                    class="w-full border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    id="tags" name="tags" value="{{ old('tags',$post->tags->pluck('name')->implode(','))}} "  placeholder="Tag" autofocus>
                <small class="p-0 mt-0 text-xs text-red-500">
                    @error('tags')
                        {{ $message }}
                    @enderror
                </small>
            </div>

            {{-- edn --}}
            <div class="mb-2">
                <label for="image" class="block mb-2 font-bold text-gray-700">Image</label>
                <input type="file" name="image" id="image"
                    class="w-full p-2 border rounded @error('image') border-red-500 @enderror">
                @error('image')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

            </div>
            {{-- check box --}}
            <div class="flex items-center justify-between mb-4 ">
                <div class="p-2">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image"
                            class="inline-block w-10 h-10 rounded-full size-6 ring-2 ring-white">
                    @endif
                </div>
                <div class="mr-2">
                    <input id="is_published" name="is_published" type="checkbox" value="1"
                        {{ $post->is_published ? 'checked' : '' }}
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
