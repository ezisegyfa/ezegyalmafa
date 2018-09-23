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
            <h4 class="mt-3 mb-3">@lang('view.Transport')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('transports.transport.destroy', $transport->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('transports.transport.index') }}" class="btn btn-primary" title="Show All Transport">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('transports.transport.create') }}" class="btn btn-success" title="Create New Transport">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('transports.transport.edit', $transport->id ) }}" class="btn btn-primary" title="Edit Transport">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Transport" onclick="return confirm(&quot;Delete Transport??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Quantity')</dt>
            <dd>{{ $transport->quantity}}</dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $transport->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $transport->updated_at}}</dd>
            <dt>@lang('view.Order')</dt>
            <dd><a href="{{ url('/orders/show/' . optional($transport->getOrder)->id) }}">{{ optional($transport->getOrder)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Uploader')</dt>
            <dd><a href="{{ url('/users/show/' . optional($transport->getUser)->id) }}">{{ optional($transport->getUser)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Car')</dt>
            <dd><a href="{{ url('/cars/show/' . optional($transport->getCar)->id) }}">{{ optional($transport->getCar)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Driver')</dt>
            <dd><a href="{{ url('/drivers/show/' . optional($transport->getDriver)->id) }}">{{ optional($transport->getDriver)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Stock')</dt>
            <dd><a href="{{ url('/stockTransports/show/' . optional($transport->getStockTransport)->id) }}">{{ optional($transport->getStockTransport)->getRenderValue() }}</a></dd>

        </dl>

    </div>
</div>

@endsection