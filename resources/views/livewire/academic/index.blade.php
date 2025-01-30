<div>
    <ul>
        <li class="mb-2" onclick="toggleNestedList(event, this)">
            <a href="javascript:void(0)"
                class="flex items-center p-2 rounded hover:bg-gray-700 lg:text-[13px] md:text[11px] sm:text-[10px]">
                {{-- <x-heroicon-m-queue-list class="w-6 text-gray-500 text-[10px]" /> --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="hero__icons">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                </svg>

                <span class="ml-2">Lists of Academic Year</span>
            </a>
        </li>
        <ul class="hidden mt-2 ml-6 custom__scroll__x" style="overflow-y: auto; max-height: 100px;">
            @php
                $groupedScores = $scores->groupBy(function ($score) {
                    return $score->academic->year; // Group by academic year
                });
            @endphp
            @if ($scores->count() > 0)
                @foreach ($groupedScores as $year => $yearScores)
                    <li class="mb-2">
                        <a href="{{ route('academic.show', $year) }}"
                            class="flex items-center p-2 rounded hover:bg-gray-700 lg:text-[13px] md:text[11px] sm:text-[10px]"
                            wire:navigate='overview'>
                            <i class="fas fa-eye"></i>
                            <span class="ml-2">{{ $year ?? '' }}</span>
                        </a>
                    </li>
                @endforeach
            @endif
        </ul>
    </ul>

    <script>
        function toggleNestedList(event, button) {
            event.preventDefault();
            const nestedList = button.nextElementSibling;
            if (nestedList.classList.contains('hidden')) {
                nestedList.classList.remove('hidden');
            } else {
                nestedList.classList.add('hidden');
            }
        }
    </script>

    <style>
        .custom__scroll__x::-webkit-scrollbar {
            width: 2px;
            height: 5px;
        }

        .custom__scroll__x::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 10px;
        }

        .custom__scroll__x::-webkit-scrollbar-thumb {
            background: #000000;
            border-radius: 10px;
        }
    </style>
</div>
