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
            <h4 class="mt-3 mb-3">@lang('view.Observation Type')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('observation_types.observation_type.destroy', $observationType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('observation_types.observation_type.index') }}" class="btn btn-primary" title="Show All Observation Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('observation_types.observation_type.create') }}" class="btn btn-success" title="Create New Observation Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('observation_types.observation_type.edit', $observationType->id ) }}" class="btn btn-primary" title="Edit Observation Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Observation Type" onclick="return confirm(&quot;Delete Observation Type??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Name')</dt>
            <dd>{{ $observationType->getRenderValue()}}</dd>

        </dl>

    </div>
</div>

@endsection