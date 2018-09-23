@extends('layouts.app')

@section('content')

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

    <div class="panel panel-default">

        <a href="{{ route('menu') }}" class="btn btn-primary" title="Return to menu">
            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.BackToMenu')</span>
        </a>

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-3">@lang('view.Users')</h4>
            </div>

        </div>
        
        @component('layouts.components.dataTable', [
            'title' => 'Users',
            'columnNames' => $columnNames
        ])
        @endcomponent   
    
    </div>
@endsection