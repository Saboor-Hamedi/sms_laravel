<x-front-layout>
    <x-front-header />
    <!-- Start main -->
    <div class=" main">
        <div class="flex justify-between max-w-screen-xl mx-auto">
            <article
                class="w-full max-w-2xl mx-auto prose dark:prose-invert format format-sm sm:format-base lg:format-lg format-blue">
                <div class="p-2 mx-auto">
                    <a href="{{ route('welcome') }}" class="default-button"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <div class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm ">
                            @if ($post->image)
                                <img class="w-16 h-16 mr-4 rounded-full" src="{{ asset('storage/' . $post->image) }}"
                                    alt="No Image">
                            @else
                                <img class="w-16 h-16 mr-4 rounded-full"
                                    src="{{ asset('storage/default/default-profile.png') }}" alt="No Image">
                            @endif

                            <div>
                                <a href="#" rel="author" class="no-underline h4">
                                    {{ Str::ucfirst($post->authorName()) }}
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
                    <h3 class="h3">
                        {{ Str::ucfirst($post->title ?? '') }}
                    </h3>
                </div>
                <x-markdown>
                    {!! $post->paragraph !!}
                </x-markdown>
                <small class="post-tags">
                    @foreach ($post->tags as $tag)
                        <a href="#" class="text-blue-400">#{{ $tag->name ?? '' }}</a>
                    @endforeach
                </small>
                <div class="blog-actions">
                    <button class="like-btn">
                        <i class="fa-regular fa-heart" style="font-size: 12px;"></i>Like</button>
                    @auth
                        @if ($post->auth())
                            <form action="{{ route('post.destroy', $post->slug ?? $post->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn like-btn">
                                    <i class="fa-solid fa-trash"
                                        style="font-size: 12px; color: rgba(255, 0, 0, 0.449);"></i>Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </article>
        </div>
    </div>
    <aside aria-label="Related articles" class="py-8 lg:py-24 ">
        <div class="max-w-screen-xl px-4 mx-auto">
            @if (count($relatedPost) === 0)
                <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">No Related articles</h2>
            @else
                <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>
                <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($relatedPost as $item)
                        <article class="max-w-xs">
                            @if ($item->image)
                                <a href="{{ route('front.show', $item->slug ?? $item->id) }}">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="mb-5 rounded-lg"
                                        alt="No Image">
                                @else
                                    <img src="{{ asset('storage/default/default-post-image.png') }}"
                                        class="mb-5 rounded-lg" alt="No Image">
                                </a>
                            @endif
                                <small class="category">
                                    <a href="#">{{ Str::ucfirst($item->getCategory()) }}</a>
                                </small>
                            <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                                <a href="{{ route('front.show', $item->slug ?? $item->id) }}" wire:navigate>
                                    {{ Str::ucfirst($item->title ?? '') }}
                                </a>
                            </h2>
                            <p class="mb-4 text-gray-500 dark:text-gray-400">
                                {!! Str::limit($item->paragraph, 20, '...') !!}
                            </p>
                            <a href="{{ route('front.show', $item->slug ?? $item->id) }}"
                                class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                                Read in 2 minutes
                            </a>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </aside>
    {{-- End main --}}
    <x-footer />

    @vite(['resources/js/app.js'])

    <script>
        // document.querySelector('.front-menu-toggle').addEventListener('click', () => {
        //     document.querySelector('.front-nav').classList.toggle('active');
        // });
    </script>
</x-front-layout>
