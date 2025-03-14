<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
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
                            <span class="author-name">{{ Str::ucfirst($post->user->name ?? 'Anonymous') }}</span>
                            <span class="post-time">{{ $post->created_at }}</span>
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
                    <div class="card-text">
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
                            {{ Str::limit($post->paragraph, 100, '...') }}
                            <a href="{{ route('post.show', $post->slug ?? $post->id) }}"
                                class="text-blue-500 hover:underline">
                                Read more
                            </a>
                        </p>

                        <!-- Tags -->
                        <div class="card-tags">
                            @foreach ($post->tags as $tag)
                                <span class="tag">
                                    <a href="#" class="text-blue-500 hover:underline">
                                        #{{ $tag->name ?? '' }}
                                    </a>
                                </span>
                            @endforeach
                        </div>

                        <!-- Edit and Delete Buttons -->
                        <div class="card-actions">
                            <a href="{{ route('post.edit', $post->slug ?? $post->id) }}" class="default-button" >
                                <i class="mr-2 fas fa-edit"></i>Edit
                            </a>
                            <form action="{{ route('post.destroy', $post->slug ?? $post->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" default-button" style="background: rgba(255, 0, 0, 0.368)">
                                    <i class="mr-2 fas fa-trash"></i>Delete
                                </button>
                            </form>
                        </div>
                    </div>

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
    {{-- footer --}}
    @include('components.footer')
</x-app-layout>
