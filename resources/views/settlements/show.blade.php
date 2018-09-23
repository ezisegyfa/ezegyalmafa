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
            <h4 class="mt-3 mb-3">@lang('view.Settlement')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('settlements.settlement.destroy', $settlement->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('settlements.settlement.index') }}" class="btn btn-primary" title="Show All Settlement">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('settlements.settlement.create') }}" class="btn btn-success" title="Create New Settlement">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('settlements.settlement.edit', $settlement->id ) }}" class="btn btn-primary" title="Edit Settlement">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Settlement" onclick="return confirm(&quot;Delete Settlement??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Name')</dt>
            <dd>{{ $settlement->name}}</dd>
            <dt>@lang('view.Region')</dt>
            <dd><a href="{{ url('/regions/show/' . optional($settlement->getRegion)->id) }}">{{ optional($settlement->getRegion)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Post Code')</dt>
            <dd>{{ $settlement->post_code}}</dd>

        </dl>

    </div>
</div>

@endsection