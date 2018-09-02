<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
            <div class="row w-100">
                @include('layouts.header')
            </div>

            <main class="row mt-3 mb-3">
                <div class="container w-100">
                    <div class="col-2">
                        @include('layouts.leftBar')
                    </div>
                    <div class="col-8"> 
                        @yield('content')
                    </div>
                    <div class="col-2">
                        @include('layouts.rightBar')
                    </div>
                </div>
            </main>

            <div class="row w-100 fixed-bottom">
                @include('layouts.footer')
            </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.redirect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/helperMethods.js') }}"></script>
    @yield('scripts')
</body>
</html>
