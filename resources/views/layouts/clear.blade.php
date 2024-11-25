<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/Logo-mini.png') }}" type="image/x-icon"/>
    <title>@yield('title')</title>
    @if (Route::currentRouteName() != 'dashboard.submissions.print')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endif
    @if (Route::currentRouteName() != 'dashboard.submissions.print')
        @vite('resources/js/app.js')
    @endif
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('sweetalert::alert')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>