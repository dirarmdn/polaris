<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/Logo-mini.png') }}" type="image/x-icon"/>
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body>
    <header>
        @include('components.navbar_dashboard')
    </header>

    <div class="content pt-20">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @include('components.footer_dashboard')
    {{-- @if (Route::currentRouteName() != 'dashboard.submissions.index') --}}
        @vite('resources/js/app.js')
    {{-- @endif --}}
    @stack('scripts')
    @include('sweetalert::alert')

    <script>
        function navToogle() {
            var x = document.getElementById("nav-items");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        window.onscroll = function() {
            myFunction()
        };

        var navlist = document.querySelector("#nav-list");
        var sticky = navlist.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                navlist.classList.add("sticky")
            } else {
                navlist.classList.remove("sticky");
            }
        }
    </script>
</body>
</html>