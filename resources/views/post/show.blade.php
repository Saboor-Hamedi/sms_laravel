<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
        <div class="pt-2 dark:bg-gray-900">
            <div class="flex justify-between max-w-screen-xl mx-auto ">
                <article
                    class="w-full max-w-2xl mx-auto  format-sm sm:format-base lg:format-lg format-blue prose dark:format-invert">
                    <div class="action-header">
                        <a href="{{ route('post.index') }}" class="default-button" style="font-size: 14px">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                    </div>
                    <div class="mb-4 lg:mb-6 not-format">
                        <address class="flex items-center mb-6 not-italic">
                            <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                @if ($post->image)
                                    <img class="w-16 h-16 mr-4 rounded-full"
                                        src="{{ asset('storage/' . $post->image) }}" alt="No Image">
                                @else
                                    <img class="w-16 h-16 mr-4 rounded-full"
                                        src="{{ asset('storage/default/default-profile.png') }}" alt="No Image">
                                @endif

                                <div>
                                    <a href="#" rel="author"
                                        class="text-xl font-bold text-gray-900 dark:text-white">
                                        {{ $post->authorName() }}
                                    </a>
                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        @if (!empty($post->category->name))
                                            <span class="front-card-category">
                                                <a href="#"
                                                    class="front-link">{{ Str::ucfirst($post->category->name) }}</a>
                                            </span>
                                        @endif
                                    </p>

                                    <p class="text-base text-gray-500 dark:text-gray-400">
                                        <time pubdate datetime="2022-02-08" title="February 8th, 2022">
                                            {{ $post->created_at->diffForHumans() }}
                                        </time>
                                    </p>
                                </div>
                            </div>
                        </address>
                        <h1
                            class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                            {{ Str::ucfirst($post->title ?? '') }}
                        </h1>
                    </div>
                    <x-markdown>
                        {!! $post->paragraph !!}
                    </x-markdown>
                    <div class="tags-cad">
                        <span>
                            @foreach ($post->tags as $tag)
                                <a href="#" class="text-blue-400">#{{ $tag->name ?? '' }}</a>
                            @endforeach
                        </span>
                    </div>

                    <div class="blog-actions">
                        <button class="like-btn">
                            <i class="fa-solid fa-heart" style="background-color: none; font-size: 12px;"></i>
                        </button>
                        @auth
                            @if ($post->auth())
                                <form action="{{ route('post.destroy', $post->slug ?? $post->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="delete-btn ">
                                        <i class=" fa-solid fa-trash" style="font-size: 12px; color: rgba(255, 0, 0, 0.449);"></i>
                                        Delete
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </article>
            </div>
        </div>
    </div>
    {{-- <x-footer /> --}}
    {{-- <script>
        document.querySelector('.front-menu-toggle').addEventListener('click', () => {
            document.querySelector('.front-nav').classList.toggle('active');
        });
    </script> --}}
</x-app-layout>
