<div class="max-w-2xl p-4 mx-auto">
    <form action="{{ route('post.store') }}" method="POST" class="space-y-4">
        @csrf
        <div class="space-y-2">
            <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title"
                class="block w-full px-4 py-2 border-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter your post title">
        </div>
        <button type="submit"
            class="inline-flex items-center justify-center px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Create
        </button>
    </form>
</div>
