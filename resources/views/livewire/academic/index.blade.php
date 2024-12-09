<div>
    <ul>
        <li class="mb-2" onclick="toggleNestedList(event, this)">
            <a href="javascript:void(0)"
                class="flex items-center p-2 rounded hover:bg-gray-700 lg:text-[13px] md:text[11px] sm:text-[10px]">
                <x-heroicon-m-queue-list class="w-6 text-gray-500 text-[10px]" />
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
