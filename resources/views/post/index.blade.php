<x-app-layout>
 @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')

    <div class="main-content">
    <div>
        <a href="{{ route('post.create') }}" class="btn btn-primary">
        <i class="fa-solid fa-plus"></i>
             Create
        </a>
    </div>
        @foreach ($posts as  $post)
            <li>{{ $post->title }} by {{ $post->authorName() }}</li>
        @endforeach
    </div>
    {{-- footer --}}
   @include('components.footer')
</x-app-layout>