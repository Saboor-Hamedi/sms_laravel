<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
        <div class="action-header">
            <a href="{{ route('post.create') }}" class="default-button" style="font-size: 14px">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <div class="flex flex-col mt-2 ">
            <!-- Profile Section -->
            <div class="card-profile">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Profile">
                @else
                    <img src="{{ asset('storage/default/default-profile.png') }}" alt="Default Profile">
                @endif
                <span>{{ Str::ucfirst($post->user->name ?? 'Anonymous') }}</span>
            </div>
            <!-- Image Section -->
            <div class="flex-1 min-h-0 overflow-hidden">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="object-cover w-full aspect-[4/3]"> <!-- 4:3 aspect ratio -->
                @else
                    <img src="{{ asset('storage/default/default-post-image.png') }}" alt="No Image"
                        class="object-cover w-full aspect-[4/3]"> <!-- 4:3 aspect ratio -->
                @endif
            </div>

            <!-- Text Section -->
            <div class="p-4 sm:p-6">
                <h2 class="mb-2 text-xl font-bold truncate sm:text-2xl md:text-3xl sm:mb-4 dark:text-gray-100">
                    {!! $post->title !!}
                </h2>
                <p class="text-base leading-relaxed sm:text-lg md:text-xl">
                    {!! $post->paragraph !!}
                </p>
            </div>
            <!-- Footer Section -->
            <div class="card-footer">
                <small class="text-muted">Private: {{ $post->is_published ? 'Yes' : 'No' }}</small>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>
