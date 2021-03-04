<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">ToucanTech</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link @if(Route::current()->getName() == 'home') active @endif" aria-current="page" href="{{ route('home') }}">Home</a>
                <a class="nav-link @if(Route::current()->getName() == 'create_member') active @endif" href="{{ route('create_member') }}">New Member</a>
                <a class="nav-link @if(Route::current()->getName() == 'list_schools') active @endif" href="{{ route('list_schools') }}">List Schools</a>
                <a class="nav-link @if(Route::current()->getName() == 'notes') active @endif" href="{{ route('notes') }}">Notes</a>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
