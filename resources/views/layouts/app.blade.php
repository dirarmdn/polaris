<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/Logo-mini.png') }}" type="image/x-icon"/>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <header>
        @include('components.navbar')
    </header>

    <div class="container mx-auto px-4 overflow-hidden">
        @yield('content')
    </div>

    @include('components.footer')
</body>
</html>
