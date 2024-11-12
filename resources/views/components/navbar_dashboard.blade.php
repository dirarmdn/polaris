<nav class="bg-white border-gray-200 dark:bg-gray-900 px-10">
    <div class="flex items-center justify-between mx-auto p-4">
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse items-center">
            
            <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-lg cursor-pointer object-cover" src="{{ asset('images/Avatar.svg') }}" alt="User dropdown">

            <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                <div>{{ Auth::user()->name }}</div>
                <div class="font-medium truncate">{{ Auth::user()->email }}</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                <li>
                    <a href="{{ route('user.show', ['user' => auth()->user()]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                </li>
                </ul>
                <div class="py-1">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                    </form>
                </div>
            </div>
        
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="justify-between hidden w-full md:flex items-center md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col items-center font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <img class="max-h-16" src="{{ asset('images/Logo(2).png') }}" alt="" srcset="">
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="{{ Route::is('dashboard') ? 'block py-2 px-3 md:p-0 border-b-2 border-accent-light-500 font-bold' : 'block py-2 px-3 md:p-0 text-gray-900' }} hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-900 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                        aria-current="page">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('dashboard.submissions.index') }}"
                        class="{{ Route::is('dashboard.submissions.index') ? 'block py-2 px-3 md:p-0 border-b-2 border-accent-light-500 font-bold' : 'block py-2 px-3 md:p-0 text-gray-900' }} hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-900 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Pengajuan</a>
                </li>
                <li>
                    <a href="{{ route('organization.index') }}"
                        class="{{ Route::is('organization.index') ? 'block py-2 px-3 md:p-0 border-b-2 border-accent-light-500 font-bold' : 'block py-2 px-3 md:p-0 text-gray-900' }} hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-900 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Mitra</a>
                </li>
                @if (auth()->user()->role == 2)                    
                <li>
                    <a href="{{ route('admin') }}"
                        class="{{ Route::is('home.faq') ? 'block py-2 px-3 md:p-0 border-b-2 border-accent-light-500 font-bold' : 'block py-2 px-3 md:p-0 text-gray-900' }} hover:bg-gray-100 md:hover:bg-transparent md:hover:text-secondary-900 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Admin</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
