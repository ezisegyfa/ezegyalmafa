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

    <!-- dataTables -->
    <link href="{{ asset('css/dataTables/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.jqueryui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.foundation.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.semanticui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">


    @yield('header')
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                @include('layouts.header')
            </div>

            <div class="row mt-3 mb-3">
                @yield('content')
            </div>

            <div class="row fixed-bottom">
                @include('layouts.footer')
            </div>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.redirect.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/helperMethods.js') }}"></script>

    <!-- dataTables -->
    <script type="text/javascript" src="{{ asset('js/dataTables/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables/dataTables.jqueryui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables/dataTables.foundation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables/dataTables.semanticui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables/dataTables.min.js') }}"></script>
    @include('layouts.dataTableInitializer')

    @yield('scripts')
</body>
</html>
