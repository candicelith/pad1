@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col items-center mt-4">
        <div class="flex flex-nowrap justify-center space-x-1 md:space-x-2 w-full overflow-hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-2 py-1 text-gray-400 bg-lightblue rounded-lg cursor-default text-sm md:text-lg">Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-2 py-1 text-cyan bg-none rounded-lg hover:bg-cyan-100 hover:text-white text-sm md:text-lg">
                    Previous
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-2 py-1 text-cyan bg-gray-200 rounded-lg cursor-default text-sm md:text-lg">{{ $element }}</span>
                @endif

                {{-- Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-2 py-1 text-white bg-cyan-100 rounded-lg text-sm md:text-lg">{{ $page }}</span>
                        @else
                            @if ($page == 1 || $page == $paginator->lastPage() || abs($page - $paginator->currentPage()) <= 1)
                                <a href="{{ $url }}" class="px-2 py-1 text-gray-700 bg-white rounded-lg hover:bg-cyan-100 hover:text-white text-sm md:text-lg">{{ $page }}</a>
                            @elseif (($page == 2 && $paginator->currentPage() > 3) || ($page == ($paginator->lastPage() - 1) && $paginator->currentPage() < ($paginator->lastPage() - 2)))
                                <span class="px-2 py-1 text-cyan bg-gray-200 rounded-lg cursor-default text-sm md:text-lg">...</span>
                            @endif
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-2 py-1 text-gray-700 bg-white rounded-lg hover:bg-gray-100 text-sm md:text-lg">
                    Next
                </a>
            @else
                <span class="px-2 py-1 text-gray-400 bg-lightblue rounded-lg cursor-default text-sm md:text-lg">Next</span>
            @endif
        </div>

        {{-- Optional smaller screen adjustments --}}
        <div class="flex justify-center mt-2">
            <span class="text-sm text-gray-400 hidden md:inline">Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>
            <span class="text-xs text-gray-400 md:hidden">Page {{ $paginator->currentPage() }} / {{ $paginator->lastPage() }}</span>
        </div>
    </nav>
@endif
