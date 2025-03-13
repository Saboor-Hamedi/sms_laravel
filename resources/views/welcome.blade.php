<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="{{ asset('assets/css/front-page.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="front-header">
        <div class="front-header-container">
            <div class="front-header-brand">
                <h1 class="front-header-title"><i class="fas fa-feather-alt"></i> BlogSphere</h1>
            <button class="front-menu-toggle"><i class="fas fa-bars"></i></button>
            </div>
            <nav class="front-nav">
                @if(!Auth::check())
                    <a href="{{ route('login') }}" class="front-nav-link">Login</a>
                    <a href="{{ route('register') }}" class="front-nav-link">Register</a>
                @endif
                <a href="#" class="front-nav-link">About</a>
                <a href="#" class="front-nav-link">Contact</a>
            </nav>
            <div class="front-header-actions">
                <input type="search" placeholder="Search..." class="front-search-input">
                <button class="front-theme-toggle"><i class="fas fa-moon"></i></button>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="front-page">
        <!-- Hero Section -->
        <section class="front-hero">
            <div class="front-hero-overlay"></div>
            <div class="front-hero-content">
                <h2 class="front-hero-title">Unleash Your Curiosity</h2>
                <p class="front-hero-subtitle">Explore stories that inspire and inform</p>
                <div class="front-hero-actions">
                    <a href="#posts" class="front-hero-btn primary">Start Reading</a>
                    <a href="#" class="front-hero-btn secondary">Subscribe</a>
                </div>
            </div>
        </section>

        <!-- Content Wrapper -->
        <div class="front-content-wrapper" id="posts">
            <!-- Left Sidebar -->
            <aside class="front-left-sidebar">
                <div class="front-left-sticky">
                    <div class="front-categories">
                        <h3 class="front-widget-title"><i class="fas fa-folder-open"></i> Categories</h3>
                        <ul class="front-category-list">
                            <li><a href="#" class="front-category-link">Technology <span>(12)</span></a></li>
                            <li><a href="#" class="front-category-link">Lifestyle <span>(8)</span></a></li>
                            <li><a href="#" class="front-category-link">Travel <span>(5)</span></a></li>
                        </ul>
                    </div>
                    <div class="front-newsletter">
                        <h3 class="front-widget-title"><i class="fas fa-envelope"></i> Newsletter</h3>
                        <form class="front-newsletter-form">
                            <input type="email" placeholder="Your email" class="front-newsletter-input">
                            <button type="submit" class="front-newsletter-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="front-main-content">
                <div class="front-cards-container">
                    @forelse ($posts as $post)
                        <article class="front-card">
                            <header class="front-card-header">
                                <div class="front-card-profile">
                                    <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('storage/default/default-profile.png') }}"
                                        alt="Profile" class="front-profile-img">
                                    <div class="front-card-author">
                                        <span class="front-author-name">{{ Str::ucfirst($post->user->name ?? 'Anonymous') }}</span>
                                        <span class="front-post-time">
                                            <i class="far fa-clock"></i> {{ $post->created_at->diffForHumans() }}
                                        </span>
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
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
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
                                    <a href="{{ route('post.show', $post->slug ?? $post->id) }}" class="front-btn-read">Read More</a>
                                    @auth
                                        <div class="front-card-controls">
                                            <a href="{{ route('post.edit', $post->slug ?? $post->id) }}" class="front-btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('post.destroy', $post->slug ?? $post->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="front-btn-delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
                <section class="front-suggested-posts">
                    <h3 class="front-suggested-title"><i class="fas fa-lightbulb"></i> Recommended Reads</h3>
                    <div class="front-suggested-container">
                        <!-- Add random post logic here -->
                        <div class="front-card front-suggested-card">
                            <!-- Similar structure -->
                        </div>
                    </div>
                </section>
            </main>

            <!-- Right Sidebar -->
            <aside class="front-right-sidebar">
                <div class="front-right-sticky">
                    <div class="front-trending">
                        <h3 class="front-widget-title"><i class="fas fa-fire"></i> Trending</h3>
                        <div class="front-trending-card">
                            <span class="front-trending-number">1</span>
                            <div class="front-trending-content">
                                <h4>Trending Post Title</h4>
                                <small><i class="far fa-eye"></i> 5k views</small>
                            </div>
                        </div>
                    </div>
                    <div class="front-social-widget">
                        <h3 class="front-widget-title"><i class="fas fa-share-alt"></i> Follow Us</h3>
                        <div class="front-social-links">
                            <a href="#" class="front-social-link twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="front-social-link facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="front-social-link instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- Footer -->
    <footer class="front-footer">
        <div class="front-footer-container">
            <div class="front-footer-section">
                <h3>BlogSphere</h3>
                <p>Crafting stories since {{ date('Y') }}</p>
            </div>
            <div class="front-footer-section">
                <h4>Quick Links</h4>
                <a href="#" class="front-footer-link">Home</a>
                <a href="#" class="front-footer-link">Privacy</a>
                <a href="#" class="front-footer-link">Contact</a>
            </div>
            <div class="front-footer-section">
                <h4>Connect</h4>
                <div class="front-footer-social">
                    <a href="#" class="front-social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="front-social-link"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="front-footer-bottom">
            <p>© {{ date('Y') }} BlogSphere. All rights reserved.</p>
        </div>
    </footer>

    @vite(['resources/js/app.js'])
</body>



<script>
document.querySelector('.front-menu-toggle').addEventListener('click', () => {
    document.querySelector('.front-nav').classList.toggle('active');
});

document.addEventListener('DOMContentLoaded', () => {
    console.log('Front page visible:', document.querySelector('.front-page').offsetHeight > 0);
});
</script>
</html>