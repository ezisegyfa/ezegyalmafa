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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    @yield('styles')
</head>
<body>
    <div id="app">
        @yield('header')
        
        <div class="page-content">
            @yield('content')
        </div>

        @yield('footer')
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/helperMethods.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    @yield('scripts')
</body>