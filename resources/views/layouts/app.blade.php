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

    <link href="{{ asset('DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables-1.10.18/css/dataTables.jqueryui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables-1.10.18/css/dataTables.foundation.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables-1.10.18/css/dataTables.semanticui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dataTables.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                @include('layouts.header')
            </div>

            <div class="row mt-3 mb-3">
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
    <script type="text/javascript" src="{{ asset('DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables-1.10.18/js/dataTables.jqueryui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables-1.10.18/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables-1.10.18/js/dataTables.foundation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables-1.10.18/js/dataTables.semanticui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dataTables.min.js') }}"></script>
    @include('layouts.dataTableInitializer')

    @yield('scripts')
</body>
</html>
