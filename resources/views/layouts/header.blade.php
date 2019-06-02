<nav class="navbar navbar-dark bg-dark justify-content-between">
    <!-- Left Side Of Navbar -->
    <ul class="nav-item">
        <a class="navbar-brand" href="{{ url('') }}">{{ config('app.name', '') }}</a>
        @yield('leftContent')
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav-item">
        @yield('rightContent')
    </ul>
</nav>

@yield('afterItems')