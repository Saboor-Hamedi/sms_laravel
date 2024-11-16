<x-app-layout>
    {{-- <livewire:header.header /> --}}

    <main class="flex h-screen">
        <livewire:sidebar.sidebar />
        <section class="flex flex-col flex-1 h-screen gap-2 p-2">
            <div class="flex-shrink-0">
                <livewire:header.header />
            </div>

            <div class="flex-1 overflow-auto rounded shadow scrollbar-thin scrollbar-thumb scrollbar-track"
                id="posts">
                <livewire:chat.chat />
            </div>

            <div class="flex-shrink-0">
                <div class="flex items-center justify-center p-2 rounded shadow">
                    <livewire:chat.create />
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('messageSent', function() {
                const chatBox = document.getElementById('posts');
                chatBox.scrollTop = chatBox.scrollHeight;
            });

            const chatBox = document.getElementById('posts');
            chatBox.scrollTop = chatBox.scrollHeight;
        });
    </script>
</x-app-layout>
