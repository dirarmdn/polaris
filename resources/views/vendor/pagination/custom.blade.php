@if ($paginator->hasPages())
    <div class="flex flex-col items-center">
        {{-- Showing Entries Information --}}
        <span class="text-sm text-gray-700 dark:text-gray-400">
            Showing
            <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
            Entries
        </span>

        {{-- Pagination Navigation --}}
        <div class="inline-flex mt-2 xs:mt-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-400 bg-gray-200 rounded-s cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    Prev
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() . '&sort_by=' . request('sort_by', 'submission_title') }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                    Prev
                </a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            @else
                <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-400 bg-gray-200 border-0 border-s border-gray-700 rounded-e cursor-not-allowed dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
            @endif
        </div>
    </div>
@endif
