<x-front-layout>
    <x-front-header />
    <!-- Hero Section -->
    <x-hero title='Unlesh Your Curiosity' message='Discover the World of Knowledge and Inspiration' />
    <!-- Content Wrapper -->
    <div class="front-content-wrapper" id="posts">
        <!-- Left Sidebar -->
        <x-front-left-category />
        <!-- Main Content -->
        <div class="front-main-content">
            <div class="front-cards-container">
                @forelse ($frontPost as $post)
                    <article class="front-card">
                        <header class="front-card-header">
                            <div class="front-card-profile">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="No Image"
                                        class="front-profile-img">
                                @else
                                    <img src="{{ asset('storage/default/default-profile.png') }}" alt="Default Profile"
                                        class="front-profile-img">
                                @endif

                                <div class="front-card-author">
                                    <span
                                        class="front-author-name">{{ Str::ucfirst($post->user->name ?? 'Anonymous') }}</span>
                                    <span
                                        class="text-sm front-author-time">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                            @if (!empty($post->category->name))
                                <span class="front-card-category">
                                    <a href="#" class="front-link">{{ Str::ucfirst($post->category->name) }}</a>
                                </span>
                            @endif
                        </header>
                        <div class="front-card-image">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="No Image">
                            @else
                                <img src="{{ asset('storage/default/default-post-image.png') }}" alt="No Image">
                            @endif
                        </div>
                        <div class="front-card-content">
                            <h2 class="front-card-title">{{ Str::limit($post->title, 25, '...') }}</h2>
                            <p class="front-card-body">{{ Str::limit($post->paragraph, 120, '...') }}</p>
                        </div>
                        <footer class="front-card-footer">
                            <div class="front-card-meta">
                                <span class="front-card-tags">
                                    @foreach ($post->tags as $tag)
                                        <a href="#" class="front-tag">#{{ $tag->name ?? '' }}</a>
                                    @endforeach
                                </span>
                                <span class="front-card-stats">
                                    <i class="far fa-eye"></i> 1.2k
                                    <i class="far fa-heart"></i> 45
                                </span>
                            </div>
                            <div class="front-card-actions">
                                <a href="{{ route('front.show', $post->slug ?? $post->id) }}" class="default-button"
                                    style="padding: 8px !important; font-size: 12px"
                                    wire:navigate>
                                    Read More
                                </a>
                                @auth
                                    <div class="front-card-controls">
                                        @if ($post->user_id == Auth::user()->id)
                                            <a href="{{ route('post.edit', $post->slug ?? $post->id) }}"
                                                class="front-btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('post.destroy', $post->slug ?? $post->id) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="front-btn-delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        </footer>
                    </article>
                @empty
                    <p class="front-no-posts">No posts available.</p>
                @endforelse
            </div>

            <!-- Suggested Posts -->
            <x-recommended title='Recommended Reads' />
        </div>

        <!-- Right Sidebar -->
        <x-front-right-trend />
    </div>

    <!-- Footer -->
    <x-footer />

    @vite(['resources/js/app.js'])
    </body>
    <script>
        document.querySelector('.front-menu-toggle').addEventListener('click', () => {
            document.querySelector('.front-nav').classList.toggle('active');
        });
    </script>
</x-front-layout>
