<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')


    <div class="main-content">
        <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>
        <div x-data="{ count: 0 }">
            <button x-on:click="count++">Increment</button>

            <span x-text="count"></span>
        </div>
        <div class="action-header">
            <a href="{{ route('post.create') }}" class="default-button">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <div class="cards-container">
            @forelse ($posts as $post)
                <div class="card">
                    <!-- Profile Section -->
                    <div class="card-profile">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="No Image">
                        @else
                            <img src="{{ asset('storage/default/default-profile.png') }}" alt="Default Profile">
                        @endif
                        <div class="card-author">
                            <span class="author-name">{{ $post->authorName() }}</span>
                            <span class="post-time">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Image Section -->
                    <div class="card-image">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        @else
                            <img src="{{ asset('storage/default/default-post-image.png') }}" alt="No Image">
                        @endif
                    </div>

                    <!-- Text Section -->
                    <article class="prose card-text lg:prose-xl">
                        @if (!empty($post->category->name))
                            <small class="category">
                                Category:
                                <a href="#" class="text-blue-500 hover:underline">
                                    {{ Str::ucfirst($post->category->name) }}
                                </a>
                            </small>
                        @endif

                        <h2 class="card-title">{{ Str::limit($post->title, 20, '...') }}</h2>
                        <p class="card-body-paragraph">
                            {{ $post->cleanParagraph(Str::limit ($post->paragraph), 100, '...') }}
                            <a href="{{ route('post.show', $post->slug ?? $post->id) }}"
                               class="text-blue-500 hover:underline">
                                Read more
                            </a>
                        </p>
                        <!-- Tags -->
                        <div class="tags-cad">
                            <span>
                                @foreach ($post->tags as $tag)
                                    <a href="#" class="tag">#{{ $tag->name ?? '' }}</a>
                                @endforeach
                            </span>
                        </div>

                        <!-- Edit and Delete Buttons -->
                        <div class="blog-actions keep-action-bottom">
                            <a href="{{ route('post.edit', $post->slug ?? $post->id) }}"
                               class="edit-btn">
                                <i class="fas fa-edit" style="font-size: 12px;"></i>Edit
                            </a>
                            {{-- <button class="like-btn">
                                <i class="fa-regular fa-heart" style="font-size: 12px;"></i>Like</button> --}}
                            @auth
                                @if ($post->auth())
                                    <form action="{{ route('post.destroy', $post->slug ?? $post->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-btn like-btn">
                                            <i class=" fa-solid fa-trash"
                                               style="font-size: 12px; color: rgba(255, 0, 0, 0.449);"></i>Delete
                                        </button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </article>

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <small>Private: {{ $post->is_published ? 'Yes' : 'No' }}</small>
                    </div>
                </div>
            @empty
                <p>No posts found.</p>
            @endforelse
        </div>
        {{-- {{ $posts->links() }} --}}
        {{ $posts->onEachSide(5)->links() }}


    </div>
    {{-- <x-footer /> --}}
</x-app-layout>
