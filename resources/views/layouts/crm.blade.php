@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/crm.css') }}" rel="stylesheet">
    
    <!-- dataTables -->
    <link href="{{ asset('css/dataTables/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.jqueryui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.foundation.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.semanticui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables/dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <ul class="components">
                @foreach ($tableNames as $tableName)
                    <li>
                        <a href="{{ url($tableName) }}">{{ $tableName }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- Page Content -->
        <div id="content">
            <div class="panel panel-default">
                @if(Session::has('success_message'))
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok"></span>
                        {!! session('success_message') !!}

                        <button type="button" class="close" data-dismiss="alert" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                @endif

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                @yield('crmContent')
            </div>
        </div>
    </div>
@endsection