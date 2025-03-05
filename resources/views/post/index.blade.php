<x-app-layout>
 @include('components.header')
    <!-- Sidebar -->
    @include('components.sidebar')
    <div class="main-content">
        @foreach ($posts as  $post)
            <li>{{ $post->title }} by {{ $post->authorName() }}</li>
        @endforeach
    </div>
    {{-- footer --}}
   @include('components.footer')
</x-app-layout>