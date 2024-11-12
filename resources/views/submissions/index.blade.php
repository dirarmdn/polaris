@extends('layouts.app')

@section('title', 'Daftar Pengajuan')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white">
            <div>
                <!--
            Mobile filter dialog
      
            Off-canvas filters for mobile, show/hide based on off-canvas filters state.
          -->
                <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
                    <!--
              Off-canvas menu backdrop, show/hide based on off-canvas menu state.
      
              Entering: "transition-opacity ease-linear duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "transition-opacity ease-linear duration-300"
                From: "opacity-100"
                To: "opacity-0"
            -->
                    <div class="fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"></div>

                    <div class="fixed inset-0 z-40 flex">
                        <!--
                Off-canvas menu, show/hide based on off-canvas menu state.
      
                Entering: "transition ease-in-out duration-300 transform"
                  From: "translate-x-full"
                  To: "translate-x-0"
                Leaving: "transition ease-in-out duration-300 transform"
                  From: "translate-x-0"
                  To: "translate-x-full"
              -->
                        <div
                            class="relative ml-auto flex h-full w-full max-w-xs flex-col overflow-y-auto bg-white py-4 pb-12 shadow-xl">
                            <div class="flex items-center justify-between px-4">
                                <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                                <button type="button"
                                    class="-mr-2 flex h-10 w-10 items-center justify-center rounded-md bg-white p-2 text-gray-400">
                                    <span class="sr-only">Close menu</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Filters -->
                            <form class="mt-4 border-t border-gray-200">
                                <h3 class="sr-only">Categories</h3>
                                <ul role="list" class="px-2 py-3 font-medium text-gray-900">
                                    <li>
                                        <a href="#" class="block px-2 py-3">Totes</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-2 py-3">Backpacks</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-2 py-3">Travel Bags</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-2 py-3">Hip Bags</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-2 py-3">Laptop Sleeves</a>
                                    </li>
                                </ul>

                                <div class="border-t border-gray-200 px-4 py-6">
                                    <h3 class="-mx-2 -my-3 flow-root">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-mobile-0" aria-expanded="false">
                                            <span class="font-medium text-gray-900">Color</span>
                                            <span class="ml-6 flex items-center">
                                                <!-- Expand icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                                </svg>
                                                <!-- Collapse icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path fill-rule="evenodd"
                                                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h3>
                                    <!-- Filter section, show/hide based on section state. -->
                                    <div class="pt-6" id="filter-section-mobile-0">
                                        <div class="space-y-6">
                                            <div class="flex items-center">
                                                <input id="filter-mobile-color-0" name="color[]" value="white"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-color-0"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">White</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-color-1" name="color[]" value="beige"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-color-1"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Beige</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-color-2" name="color[]" value="blue"
                                                    type="checkbox" checked
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-color-2"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Blue</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-color-3" name="color[]" value="brown"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-color-3"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Brown</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-color-4" name="color[]" value="green"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-color-4"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Green</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-color-5" name="color[]" value="purple"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-color-5"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Purple</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-6">
                                    <h3 class="-mx-2 -my-3 flow-root">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-mobile-1" aria-expanded="false">
                                            <span class="font-medium text-gray-900">Category</span>
                                            <span class="ml-6 flex items-center">
                                                <!-- Expand icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                                </svg>
                                                <!-- Collapse icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path fill-rule="evenodd"
                                                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h3>
                                    <!-- Filter section, show/hide based on section state. -->
                                    <div class="pt-6" id="filter-section-mobile-1">
                                        <div class="space-y-6">
                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-0" name="category[]"
                                                    value="new-arrivals" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-0"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">New Arrivals</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-1" name="category[]" value="sale"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-1"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Sale</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-2" name="category[]" value="travel"
                                                    type="checkbox" checked
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-2"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Travel</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-3" name="category[]"
                                                    value="organization" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-3"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Organization</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-category-4" name="category[]"
                                                    value="accessories" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-category-4"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">Accessories</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-6">
                                    <h3 class="-mx-2 -my-3 flow-root">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex w-full items-center justify-between bg-white px-2 py-3 text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-mobile-2" aria-expanded="false">
                                            <span class="font-medium text-gray-900">Size</span>
                                            <span class="ml-6 flex items-center">
                                                <!-- Expand icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                                </svg>
                                                <!-- Collapse icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path fill-rule="evenodd"
                                                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h3>
                                    <!-- Filter section, show/hide based on section state. -->
                                    <div class="pt-6" id="filter-section-mobile-2">
                                        <div class="space-y-6">
                                            <div class="flex items-center">
                                                <input id="filter-mobile-size-0" name="size[]" value="2l"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-size-0"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">2L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-size-1" name="size[]" value="6l"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-size-1"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">6L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-size-2" name="size[]" value="12l"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-size-2"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">12L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-size-3" name="size[]" value="18l"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-size-3"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">18L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-size-4" name="size[]" value="20l"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-size-4"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">20L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-mobile-size-5" name="size[]" value="40l"
                                                    type="checkbox" checked
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-mobile-size-5"
                                                    class="ml-3 min-w-0 flex-1 text-gray-500">40L</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-5 w-2xl">
                        <h1 data-aos="fade-up" class="font-semibold text-2xl">Butuh Aplikasi?</h1>
                        <h2 data-aos="fade-up" data-aos-duration="300" class="text-xl">Ajukan Kebutuhan Anda terkait
                            aplikasi di organisasi Anda di sini</h2>
                    </div>
                    <div class="w-full mx-auto">
                        <label for="search"
                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="search"
                                class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Cari Data Pengajuan" required />
                            <button type="button" id="search-button"
                                class="text-white absolute end-0 bottom-0 bg-secondary-900 hover:bg-primary-900 focus:ring-4 focus:outline-none focus:ring-primary-900 font-medium rounded-lg text-sm px-7 py-2.5 dark:bg-blue-600 dark:hover:bg-primary-900 dark:focus:ring-primary-900">Cari</button>
                        </div>
                    </div>
                    <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-10">
                        <h2 class="text-sm md:text-base"><span id="pengajuan-count">{{ $submission->count() }}</span>
                            Pengajuan ditampilkan</h2>

                        <div class="flex items-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button type="button" id="sort-button" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                                        class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                        aria-expanded="false" aria-haspopup="true">
                                        Sort
                                        <svg class="-mr-1 ml-1 h-5 w-5 shrink-0 text-gray-400 group-hover:text-gray-500"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="absolute right-0 z-10 mt-2 w-44 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" id="dropdownHover" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none" aria-labelledby="dropdownHoverButton">
                                        <button id="sort-by-submission_title-asc" href="#" class="block text-left px-4 py-2 text-xs font-medium text-gray-500 hover:text-gray-900"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Judul Pengajuan (A-Z)</button>
                                        <button id="sort-by-submission_title-desc" href="#" class="block text-left px-4 py-2 text-xs font-medium text-gray-500 hover:text-gray-900"
                                            role="menuitem" tabindex="-1" id="menu-item-0">Judul Pengajuan (Z-A)</button>
                                        <button id="sort-by-created_at-desc" href="#" class="block px-4 py-2 text-xs text-gray-500 hover:text-gray-900" role="menuitem"
                                            tabindex="-1" id="menu-item-1">Terbaru</button>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                                <span class="sr-only">View grid</span>
                                <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                    data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M4.25 2A2.25 2.25 0 0 0 2 4.25v2.5A2.25 2.25 0 0 0 4.25 9h2.5A2.25 2.25 0 0 0 9 6.75v-2.5A2.25 2.25 0 0 0 6.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 2 13.25v2.5A2.25 2.25 0 0 0 4.25 18h2.5A2.25 2.25 0 0 0 9 15.75v-2.5A2.25 2.25 0 0 0 6.75 11h-2.5Zm9-9A2.25 2.25 0 0 0 11 4.25v2.5A2.25 2.25 0 0 0 13.25 9h2.5A2.25 2.25 0 0 0 18 6.75v-2.5A2.25 2.25 0 0 0 15.75 2h-2.5Zm0 9A2.25 2.25 0 0 0 11 13.25v2.5A2.25 2.25 0 0 0 13.25 18h2.5A2.25 2.25 0 0 0 18 15.75v-2.5A2.25 2.25 0 0 0 15.75 11h-2.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button type="button"
                                class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                                <span class="sr-only">Filters</span>
                                <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor"
                                    data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 0 1 .628.74v2.288a2.25 2.25 0 0 1-.659 1.59l-4.682 4.683a2.25 2.25 0 0 0-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 0 1 8 18.25v-5.757a2.25 2.25 0 0 0-.659-1.591L2.659 6.22A2.25 2.25 0 0 1 2 4.629V2.34a.75.75 0 0 1 .628-.74Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <section aria-labelledby="products-heading" class="pb-24 pt-6">
                        <h2 id="products-heading" class="sr-only">Products</h2>

                        <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                            <!-- Filters -->
                            <form class="hidden lg:block">
                                <h3 class="sr-only">Categories</h3>
                                <ul role="list"
                                    class="space-y-4 border-b border-gray-200 pb-6 text-sm font-medium text-gray-900">
                                    <li>
                                        <a href="#">Totes</a>
                                    </li>
                                    <li>
                                        <a href="#">Backpacks</a>
                                    </li>
                                    <li>
                                        <a href="#">Travel Bags</a>
                                    </li>
                                    <li>
                                        <a href="#">Hip Bags</a>
                                    </li>
                                    <li>
                                        <a href="#">Laptop Sleeves</a>
                                    </li>
                                </ul>

                                <div class="border-b border-gray-200 py-6">
                                    <h3 class="-my-3 flow-root">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-0" aria-expanded="false">
                                            <span class="font-medium text-gray-900">Color</span>
                                            <span class="ml-6 flex items-center">
                                                <!-- Expand icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                                </svg>
                                                <!-- Collapse icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path fill-rule="evenodd"
                                                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h3>
                                    <!-- Filter section, show/hide based on section state. -->
                                    <div class="pt-6" id="filter-section-0">
                                        <div class="space-y-4">
                                            <div class="flex items-center">
                                                <input id="filter-color-0" name="color[]" value="white" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-color-0"
                                                    class="ml-3 text-sm text-gray-600">White</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-color-1" name="color[]" value="beige" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-color-1"
                                                    class="ml-3 text-sm text-gray-600">Beige</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-color-2" name="color[]" value="blue" type="checkbox"
                                                    checked
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-color-2"
                                                    class="ml-3 text-sm text-gray-600">Blue</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-color-3" name="color[]" value="brown" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-color-3"
                                                    class="ml-3 text-sm text-gray-600">Brown</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-color-4" name="color[]" value="green" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-color-4"
                                                    class="ml-3 text-sm text-gray-600">Green</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-color-5" name="color[]" value="purple" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-color-5"
                                                    class="ml-3 text-sm text-gray-600">Purple</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b border-gray-200 py-6">
                                    <h3 class="-my-3 flow-root">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-1" aria-expanded="false">
                                            <span class="font-medium text-gray-900">Category</span>
                                            <span class="ml-6 flex items-center">
                                                <!-- Expand icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                                </svg>
                                                <!-- Collapse icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path fill-rule="evenodd"
                                                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h3>
                                    <!-- Filter section, show/hide based on section state. -->
                                    <div class="pt-6" id="filter-section-1">
                                        <div class="space-y-4">
                                            <div class="flex items-center">
                                                <input id="filter-category-0" name="category[]" value="new-arrivals"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-category-0" class="ml-3 text-sm text-gray-600">New
                                                    Arrivals</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-category-1" name="category[]" value="sale"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-category-1"
                                                    class="ml-3 text-sm text-gray-600">Sale</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-category-2" name="category[]" value="travel"
                                                    type="checkbox" checked
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-category-2"
                                                    class="ml-3 text-sm text-gray-600">Travel</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-category-3" name="category[]" value="organization"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-category-3"
                                                    class="ml-3 text-sm text-gray-600">Organization</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-category-4" name="category[]" value="accessories"
                                                    type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-category-4"
                                                    class="ml-3 text-sm text-gray-600">Accessories</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-b border-gray-200 py-6">
                                    <h3 class="-my-3 flow-root">
                                        <!-- Expand/collapse section button -->
                                        <button type="button"
                                            class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500"
                                            aria-controls="filter-section-2" aria-expanded="false">
                                            <span class="font-medium text-gray-900">Size</span>
                                            <span class="ml-6 flex items-center">
                                                <!-- Expand icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                                                </svg>
                                                <!-- Collapse icon, show/hide based on section open state. -->
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                    aria-hidden="true" data-slot="icon">
                                                    <path fill-rule="evenodd"
                                                        d="M4 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H4.75A.75.75 0 0 1 4 10Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </button>
                                    </h3>
                                    <!-- Filter section, show/hide based on section state. -->
                                    <div class="pt-6" id="filter-section-2">
                                        <div class="space-y-4">
                                            <div class="flex items-center">
                                                <input id="filter-size-0" name="size[]" value="2l" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-size-0" class="ml-3 text-sm text-gray-600">2L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-size-1" name="size[]" value="6l" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-size-1" class="ml-3 text-sm text-gray-600">6L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-size-2" name="size[]" value="12l" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-size-2" class="ml-3 text-sm text-gray-600">12L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-size-3" name="size[]" value="18l" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-size-3" class="ml-3 text-sm text-gray-600">18L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-size-4" name="size[]" value="20l" type="checkbox"
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-size-4" class="ml-3 text-sm text-gray-600">20L</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input id="filter-size-5" name="size[]" value="40l" type="checkbox"
                                                    checked
                                                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                                <label for="filter-size-5" class="ml-3 text-sm text-gray-600">40L</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Product grid -->
                            <div class="lg:col-span-3">

                                <div id="search-results" class="list-view">
                                    @if ($submission->count() == 0)
                                        <div class="text-center py-20 bg-gray-100 rounded-lg">
                                            <p class="text-gray-500">Tidak ada data pengajuan yang ditemukan.</p>
                                        </div>
                                    @else
                                        @include('components.list_view', ['pengajuan' => $submission])
                                    @endif
                                </div>
                                <div class="mb-10" data-aos="fade-up" data-aos-duration="700">
                                    {!! $submission->appends(['sort_by' => request('sort_by')])->links('vendor.pagination.custom') !!}
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
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

            const performSearch = () => {
                const query = $searchInput.val().trim();

                if (!query) {
                    resetSearch();
                    return;
                }

                $.ajax({
                    url: "{{ route('submissions.search') }}",
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

            $searchButton.on('click', performSearch);
            $searchInput.on('input', () => {
                if (!$searchInput.val().trim()) resetSearch();
            });
            $searchInput.on('keypress', (e) => {
                if (e.which == 13) performSearch();
            });

            // Sorting buttons
            $('#sort-by-submission_title-asc, #sort-by-submission_title-desc, #sort-by-created_at-desc').on('click', (e) => {
                const sortBy = e.currentTarget.id.split('-')[2];
                const sortDirection = e.currentTarget.id.split('-')[3];
                performSort(sortBy, sortDirection);
            });

            const performSort = (sortBy, sortDirection) => {
                const search = $searchInput.val().trim();

                $.ajax({
                    url: "{{ route('submissions.search') }}",
                    type: "GET",
                    data: {
                        'search': search,
                        'sort_by': sortBy,
                        'sort_direction': sortDirection
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
