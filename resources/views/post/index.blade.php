<x-app-layout>
    @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
        <div class="action-header">
            <a href="{{ route('post.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
            </a>
        </div>
        <div class="cards-container">
            @forelse ($posts as $post)
                <div class="card">
                    <!-- Profile Section -->
                    <div class="card-profile">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Profile">
                        @else
                            <img src="{{ asset('storage/default/default-profile.png') }}" alt="Default Profile">
                        @endif
                        <span>{{ $post->user->name ?? 'Anonymous' }}</span>
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
                        <h2>{{ Str::limit($post->title, 20, '...') }}</h2>
                        <p>
                            {{ Str::limit($post->paragraph, 20, '...') }}
                            <a href="{{ route('post.show', $post->slug ?? $post->id) }}"
                                class="text-sm text-blue-500 hover:underline">Show</a>
                        </p>
                        <x-splade-toggle>
                        <div v-show="toggled">{{ $post->title }}</div>
                    
                        <div v-show="!toggled">
                            <p>{{ $post->paragraph }}</p>
                            <button @click="toggle">Expand</button>
                        </div>
                        </x-splade-toggle>
                    </div>
                   {{-- delete --}}
                    <form action="{{ route('post.destroy', $post->slug ?? $post->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mb-2 ml-4 text-sm text-red-500 hover:underline">
                            Delete
                        </button>
                    </form>
                    {{-- card footer  --}}
                    <div class="card-footer">
                        <small class="text-muted">Private: {{ $post->is_published ? 'Yes' : 'No' }}</small>
                    </div>
                </div>
            @empty
                <p>No posts found.</p>
            @endforelse
        </div>
    </div>
    {{-- footer --}}
    @include('components.footer')
</x-app-layout>
