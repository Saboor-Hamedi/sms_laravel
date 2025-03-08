<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
        <div class="">
            <a href="{{ route('post.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <div class="flex flex-col mt-2 ">
            <!-- Profile Section -->
            <div class="flex items-center p-3" style="background-color: var(--primary); color: var(--text-light);">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Profile"
                        class="w-12 h-12 rounded-full sm:w-14 sm:h-14 md:w-16 md:h-16">
                @else
                    <img src="{{ asset('storage/default/default-profile.png') }}" alt="Default Profile"
                        class="w-12 h-12 rounded-full sm:w-14 sm:h-14 md:w-16 md:h-16">
                @endif
                <span class="lg:text-[18px] ml-2 font-bold truncate  sm:text-[14px] md:text-[16px]">
                    {{ Str::ucfirst($post->user->name ?? 'Anonymous') }}
                </span>
            </div>

            <!-- Image Section -->
            <div class="flex-1 min-h-0 overflow-hidden">
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                        class="object-cover w-full h-full">
                @else
                    <img src="{{ asset('storage/default/default-post-image.png') }}" alt="No Image"
                        class="object-cover w-full h-full">
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
            <div class="p-3 text-right sm:p-4" style="background-color: var(--primary); color: var(--text-light);">
                <small class="text-sm sm:text-base md:text-lg">
                    Private: {{ $post->is_published ? 'Yes' : 'No' }}
                </small>
            </div>
        </div>
    </div>
    @include('components.footer')
</x-app-layout>
