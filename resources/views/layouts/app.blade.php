<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/Logo-mini.png') }}" type="image/x-icon"/>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>
<body>
    <header>
        @include('components.navbar')
    </header>

    <div class="mx-auto overflow-hidden">
        @yield('content')
    </div>

    @include('components.footer')

    @vite('resources/js/app.js')
</body>
</html>
