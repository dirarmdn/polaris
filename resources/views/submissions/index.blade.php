@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-10">
            <div class="text-center mb-5 w-2xl">
                <h1 data-aos="fade-up" class="font-semibold text-2xl">Butuh Aplikasi?</h1>
                <h2 data-aos="fade-up" data-aos-duration="300" class="text-xl">Ajukan Kebutuhan Anda terkait aplikasi di organisasi Anda di sini</h2>
            </div>

            <div class="w-full mx-auto">
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="search"
                        class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Data Pengajuan" required />
                    <button type="button" id="search-button"
                        class="text-white absolute end-0 bottom-0 bg-secondary-900 hover:bg-primary-900 focus:ring-4 focus:outline-none focus:ring-primary-900 font-medium rounded-lg text-sm px-7 py-2.5 dark:bg-blue-600 dark:hover:bg-primary-900 dark:focus:ring-primary-900">Cari</button>
                </div>
            </div>

            <div class="w-2xl flex justify-between items-center my-7">
                <h2><span id="pengajuan-count">{{ $pengajuan->count() }}</span> Pengajuan ditampilkan</h2>
                <div class="flex items-center gap-2">
                    <button id="sort-button" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                        class="text-dark-800 border border-gray-300 bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-xs px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">Sort by
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownHover"
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-xs text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li><button id="sort-by-judul_pengajuan"
                                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Judul</button>
                            </li>
                            <li><button id="sort-by-created_at"
                                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tanggal</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div id="search-results" class="list-view">
                @if ($pengajuan->count() == 0)
                    <div class="text-center py-20 bg-gray-100 rounded-lg">
                        <p class="text-gray-500">Tidak ada data pengajuan yang ditemukan.</p>
                    </div>
                @else
                    @include('components.list_view', ['pengajuan' => $pengajuan])
                @endif
            </div>
            <div class="mb-10" data-aos="fade-up" data-aos-duration="700">
                {!! $pengajuan->appends(['sort_by' => request('sort_by')])->links('vendor.pagination.custom') !!}
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            const $searchResults = $('#search-results');
            const $pengajuanCount = $('#pengajuan-count');
            const $searchInput = $('#search');
            const $searchButton = $('#search-button');
            const initialHtml = $searchResults.html();
            const initialCount = $pengajuanCount.text();

            // Search functionality
            const performSearch = () => {
                const query = $searchInput.val().trim();

                if (!query) {
                    resetSearch();
                    return;
                }

                $.ajax({
                    url: "{{ route('pengajuan.search') }}",
                    type: "GET",
                    data: {
                        'search': query
                    },
                    success: (data) => {
                        $searchResults.html(data.html);
                        $pengajuanCount.text(data.count);
                    },
                    error: (jqXHR, textStatus, errorThrown) => console.error("AJAX error: ", textStatus,
                        errorThrown)
                });
            };

            const resetSearch = () => {
                $searchResults.html(initialHtml);
                $pengajuanCount.text(initialCount);
            };

            // Attach events
            $searchButton.on('click', performSearch);
            $searchInput.on('input', () => {
                if (!$searchInput.val().trim()) resetSearch();
            });
            $searchInput.on('keypress', (e) => {
                if (e.which == 13) performSearch();
            });

            // Sorting buttons
            $('#sort-by-judul_pengajuan, #sort-by-created_at').on('click', (e) => {
                const sortBy = e.currentTarget.id.split('-by-')[1];
                performSort(sortBy);
            });

            const performSort = (sortBy) => {
                const search = $searchInput.val().trim();

                $.ajax({
                    url: "{{ route('pengajuan.search') }}",
                    type: "GET",
                    data: {
                        'search': search,
                        'sort_by': sortBy
                    },
                    success: (data) => {
                        $searchResults.html(data.html);
                        $pengajuanCount.text(data.count);

                        window.history.pushState("", "", `?search=${search}&sort_by=${sortBy}`);
                    },
                    error: (jqXHR, textStatus, errorThrown) => console.error("AJAX error: ", textStatus,
                        errorThrown)
                });
            };

        });
    </script>
@endsection
