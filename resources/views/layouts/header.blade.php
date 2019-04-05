<div class="mb-3">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="{{ url('') }}">{{ config('app.name', '') }}</a>
                @yield('leftContent')
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                @yield('rightContent')

                @include('layouts.components.loginLinks')
            </ul>
        </div>
    </nav>

    @yield('afterItems')
</div>