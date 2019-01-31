@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/crm.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Bootstrap Sidebar</h3>
                </div>
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