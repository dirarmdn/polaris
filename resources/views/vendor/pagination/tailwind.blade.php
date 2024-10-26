<div class="flex justify-between">
    <span class="relative z-0 inline-flex shadow-sm rounded-md">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 text-gray-500 bg-gray-300 cursor-not-allowed">Previous</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-gray-500 text-white hover:bg-gray-600">Previous</a>
        @endif

        {{-- Pagination Links --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-4 py-2">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-gray-500 text-white">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-800 hover:bg-gray-300">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-gray-500 text-white hover:bg-gray-600">Next</a>
        @else
            <span class="px-4 py-2 text-gray-500 bg-gray-300 cursor-not-allowed">Next</span>
        @endif
    </span>
</div>
