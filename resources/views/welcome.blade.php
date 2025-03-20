<x-front-layout>
    <div class="front-container">
        <x-front-header />
        <div class="sidebar-wrapper">
            <aside class="sidebar">
                @auth
                    <div class="profile">
                        <img src="https://placehold.co/100x100" alt="John Doe's profile picture">
                        <h2>{{ Str::ucfirst(Auth::user()->name ?? '') }}</h2>
                        <p>Blogger & Writer</p>
                    </div>
                @endauth
                <div class="categories">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">Lifestyle</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">Travel</a></li>
                        <li><a href="#">Food</a></li>
                    </ul>
                </div>
                <div class="tags">
                    <h3>Tags</h3>
                    <ul>
                        <li><a href="#">#daily</a></li>
                        <li><a href="#">#life</a></li>
                        <li><a href="#">#blog</a></li>
                        <li><a href="#">#personal</a></li>
                    </ul>
                </div>
            </aside>
        </div>

        <main class="main-content">

            @forelse ($frontPost  as $post)
                <article class="blog-card">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="No Image" class="blog-image">
                    @else
                        <img src="{{ asset('storage/default/default-profile.png') }}" alt="Default Profile"
                            class="blog-image">
                    @endif
                    <div class="blog-content">
                        <h2>{{ $post->title }}</h2>
                        <div class="blog-meta">
                            <span>March 17, 2025</span>
                            <span>4 min read</span>
                            <span class="views">👁️ 900 views</span>
                        </div>
                        <p>
                            {{ Str::limit($post->cleanParagraph($post->paragraph), 50, '...') }}
                            <a class="show-more" href="{{ route('front.show', $post->slug ?? $post->id) }}">
                                Read More→
                            </a>
                        </p>
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
                    </div>
                </article>
            @empty
                <article class="blog-card">
                    <img src="https://placehold.co/600x400" class="blog-image" alt="Blog post image">
                    <div class="blog-content">
                        <h2>Day 2: Mountain Adventures</h2>
                        <div class="blog-meta">
                            <span>
                                {{ $post->created_at->now()->format('F d, Y') }}
                            </span>
                            <span>4 min read</span>
                        </div>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur...</p>
                    </div>
                </article>
            @endforelse
        </main>
    </div>
    <script src="{{ asset('assets/js/frontSidebar.js') }}"></script>
</x-front-layout>
