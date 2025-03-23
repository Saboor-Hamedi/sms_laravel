<x-front-layout>

{{-- HEADER --}}

<x-front-header />

{{-- HERO --}}
<x-hero />
<div class="main">

<div class="container">

{{-- BLOG SECTION --}}

<div class="blog">

    <h2 class="h2">Latest Blog Post</h2>

    <div class="blog-card-group">

        @foreach ($frontPosts as $post)
            <div class="blog-card">
                <div class="blog-card-banner">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                            alt="Building microservices with Dropwizard, MongoDB & Docker"
                            class="blog-banner-img">
                    @else
                        <img src="{{ asset('storage/default/default-post-image.png') }}"
                            alt="Building microservices with Dropwizard, MongoDB & Docker"
                            class="blog-banner-img">
                    @endif
                </div>


                <div class="blog-content-wrapper">
                    <button class="blog-topic text-tiny">Database</button>
                    <h3 class="h3">
                        <a href="{{ route('front.show', $post->slug ?? $post->id) }}">
                            {{ Str::ucfirst($post->title ?? '') }}
                        </a>
                    </h3>
                    <small class="category">
                        <a href="#">{{ Str::ucfirst($post->getCategory()) }}</a>
                    </small>
                    <p class="blog-text">
                        {{ $post->cleanParagraph(Str::limit($post->paragraph, 100, '...')) }}
                    </p>
                    <small class="post-tags">
                        @foreach ($post->tags as $tag)
                            <a href="#" class="text-blue-400">#{{ $tag->name ?? '' }}</a>
                        @endforeach
                    </small>
                    <div class="wrapper-flex">

                        <div class="profile-wrapper">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}"
                                    alt="Building microservices with Dropwizard, MongoDB & Docker"
                                    class="blog-banner-img">
                            @else
                                <img src="{{ asset('storage/default/default-post-image.png') }}"
                                    alt="Building microservices with Dropwizard, MongoDB & Docker"
                                    class="blog-banner-img">
                            @endif
                        </div>

                        <div class="wrapper">
                            <a href="#" class="h4">{{ Str::ucfirst($post->authorName()) }}</a>
                            <p class="text-sm">
                                <time
                                    datetime="2022-01-17">{{ $post->created_at->now()->format('d M Y') }}</time>
                                <span class="separator"></span>
                                <ion-icon name="time-outline"></ion-icon>
                                <time datetime="PT3M">12 min</time>
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        @endforeach
    </div>
    <button class="btn load-more">Load More</button>
</div>





<!--
- ASIDE
-->

<div class="aside">

    <div class="topics">

        <h2 class="h2">Topics</h2>

        <a href="#" class="topic-btn">
            <div class="icon-box">
                <ion-icon name="server-outline"></ion-icon>
            </div>

            <p>Database</p>
        </a>

        <a href="#" class="topic-btn">
            <div class="icon-box">
                <ion-icon name="accessibility-outline"></ion-icon>
            </div>

            <p>Accessibility</p>
        </a>

        <a href="#" class="topic-btn">
            <div class="icon-box">
                <ion-icon name="rocket-outline"></ion-icon>
            </div>

            <p>Web Performance</p>
        </a>

    </div>

    <div class="tags">
        <h2 class="h2">Tags</h2>
        <div class="wrapper">
            <button class="hashtag">#mongodb</button>
            <button class="hashtag">#nodejs</button>
            <button class="hashtag">#a11y</button>
            <button class="hashtag">#mobility</button>
            <button class="hashtag">#inclusion</button>
            <button class="hashtag">#webperf</button>
            <button class="hashtag">#optimize</button>
            <button class="hashtag">#performance</button>
        </div>
    </div>
    <div class="contact">
        <h2 class="h2">Let's Talk</h2>
        <div class="wrapper">
            <p>
                Do you want to learn more about how I can help your company overcome problems? Let us have a
                conversation.
            </p>

            <ul class="social-link">

                <li>
                    <a href="#" class="icon-box discord">
                        <ion-icon name="logo-discord"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="icon-box twitter">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="icon-box facebook">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

    </div>

    <div class="newsletter">

        <h2 class="h2">Newsletter</h2>

        <div class="wrapper">

            <p>
                Subscribe to our newsletter to be among the first to keep up with the latest updates.
            </p>

            <form action="#">
                <input type="email" name="email" placeholder="Email Address" required>

                <button type="submit" class="btn btn-primary">Subscribe</button>
            </form>

        </div>

    </div>

</div>

</div>

</div>

<x-footer />

</x-front-layout>
