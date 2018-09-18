@extends('layouts.app')

@section('content')

@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="panel panel-default">

    <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('menu') }}" class="btn btn-primary" title="Return to menu">
            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.BackToMenu')</span>
        </a>
    </div>

    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-3 mb-3">@lang('view.Driver')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('drivers.driver.destroy', $driver->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('drivers.driver.index') }}" class="btn btn-primary" title="Show All Driver">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('drivers.driver.create') }}" class="btn btn-success" title="Create New Driver">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('drivers.driver.edit', $driver->id ) }}" class="btn btn-primary" title="Edit Driver">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Driver" onclick="return confirm(&quot;Delete Driver??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.First Name')</dt>
            <dd>{{ $driver->first_name}}</dd>
            <dt>@lang('view.Last Name')</dt>
            <dd>{{ $driver->last_name}}</dd>
            <dt>@lang('view.Cnp')</dt>
            <dd>{{ $driver->cnp}}</dd>
            <dt>@lang('view.Uploader')</dt>
            <dd><a href="{{ url('/users/show/' . optional($driver->getUser)->id) }}">{{ optional($driver->getUser)->id }}</a></dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $driver->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $driver->updated_at}}</dd>

        </dl>

    </div>
</div>

@endsection