@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="p-10">
            <div class="text-center mb-5 w-2xl">
                <h1 class="font-semibold text-2xl">Butuh Aplikasi?</h1>
                <h2 class="text-xl">Ajukan Kebutuhan Anda terkait aplikasi di organisasi Anda di sini</h2>
            </div>

            <div class="w-full mx-auto">
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" id="search" class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Data Pengajuan" required />
                    <button type="button" id="search-button" class="text-white absolute end-0 bottom-0 bg-secondary-900 hover:bg-primary-900 focus:ring-4 focus:outline-none focus:ring-primary-900 font-medium rounded-lg text-sm px-7 py-2.5 dark:bg-blue-600 dark:hover:bg-primary-900 dark:focus:ring-primary-900">Cari</button>
                </div>
            </div>

            <div class="w-2xl flex justify-between items-center my-7">
                <h2><span id="pengajuan-count">{{ $pengajuan->count() }}</span> Pengajuan ditampilkan</h2>
                <div class="flex gap-2 items-center justify-center">
                        <button id="toggle-view" class="bg-gray-200 flex items-center rounded-lg text-gray-500 p-1">
                            <i id="view-icon" class="material-icons">grid_view</i>
                        </button>
                    <div class="flex items-center gap-2">

                        <button id="sort-button" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-dark-800 border border-gray-300 bg-white hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-xs px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Sort by <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>

                        <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-xs text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                                <li>
                                    <button id="sort-by-title" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Judul</button>
                                </li>
                                <li>
                                    <button id="sort-by-date" class="block w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Tanggal</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div id="search-results" class="list-view">
                @if($pengajuan->count() == 0)
                    <div class="text-center py-20 bg-gray-100 rounded-lg">
                        <p class="text-gray-500">Tidak ada data pengajuan yang ditemukan.</p>
                    </div>
                @else
                    @foreach($pengajuan as $p)
                        <div class="max-w-2xl flex mb-3 p-6 bg-primary-50 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div>
                                <div class="flex justify-center gap-3 items-center">
                                    <div>
                                        <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $p->judul_pengajuan }}</h5>
                                        <p class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $p->deskripsi_masalah }}</p>
                                    </div>
                                    <button type="button" class="text-white bg-dark-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Detail</button>
                                </div>

                                <div class="justify-between flex">
                                    <span class="bg-primary-800 opacity-70 text-white text-xs font-medium me-2 px-7 py-1 rounded-xl dark:bg-blue-900 dark:text-blue-300">{{ $p->platform }}</span>
                                    <p class="text-xs text-end">{{ $p->created_at->translatedFormat('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="flex flex-col items-center">
                <span class="text-sm text-gray-700 dark:text-gray-400">
                  Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span class="font-semibold text-gray-900 dark:text-white">10</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span> Entries
              </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                        </svg>
                        Prev
                    </button>
                    <button class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            let initialHtml = $('#search-results').html();
            let initialCount = $('#pengajuan-count').text();

            function performSearch() {
                let query = $('#search').val();
                let view = $('#toggle-view').hasClass('grid-view') ? 'grid' : 'list';
                console.log(view);

                if (query.trim() === '') {
                    resetSearch();
                    return;
                }

                $.ajax({
                    url: "{{ route('pengajuan.search') }}",
                    type: "GET",
                    data: {'search': query, 'view': view},
                    success: function(data) {
                        $('#search-results').html(data.html);
                        $('#pengajuan-count').text(data.count);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: ", textStatus, errorThrown);
                    }
                });

            }

            function resetSearch() {
                $('#search-results').html(initialHtml);
                $('#pengajuan-count').text(initialCount);
            }

            $('#search-button').on('click', function() {
                performSearch();
            });

            $('#search').on('keypress', function(e) {
                if(e.which == 13) {
                    e.preventDefault();
                    performSearch();
                }
            });

            $('#search').on('input', function() {
                if ($(this).val().trim() === '') {
                    resetSearch();
                }
            });

            // Toggle between grid and list view
            $('#toggle-view').on('click', function() {
                $(this).toggleClass('grid-view');
                let view = $(this).hasClass('grid-view') ? 'grid' : 'list';
                let query = $('#search').val();

                $.ajax({
                    url: "{{ route('pengajuan.search') }}",
                    type: "GET",
                    data: {'search': query, 'view': view},
                    success: function(data) {
                        $('#search-results').html(data.html);
                        $('#pengajuan-count').text(data.count);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: ", textStatus, errorThrown);
                    }
                });

                let icon = $('#view-icon');
                icon.text(view === 'grid' ? 'view_list' : 'grid_view');
            });

            $('#sort-by-title').on('click', function() {
                performSort('title');
            });

            $('#sort-by-date').on('click', function() {
                performSort('date');
            });

            function performSort(sortBy) {
                let query = $('#search').val(); // Ambil nilai pencarian saat ini
                let view = $('#toggle-view').hasClass('grid-view') ? 'grid' : 'list';

                $.ajax({
                    url: "{{ route('pengajuan.search') }}",
                    type: "GET",
                    data: {'search': query, 'view': view, 'sort_by': sortBy},
                    success: function (data) {
                        $('#search-results').html(data.html);
                        $('#pengajuan-count').text(data.count);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("AJAX error: ", textStatus, errorThrown);
                    }
                });
            }
        });
    </script>

@endsection
