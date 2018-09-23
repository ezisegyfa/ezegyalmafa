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
            <h4 class="mt-3 mb-3">@lang('view.Stock Transport')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('stock_transports.stock_transport.destroy', $stockTransport->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('stock_transports.stock_transport.index') }}" class="btn btn-primary" title="Show All Stock Transport">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('stock_transports.stock_transport.create') }}" class="btn btn-success" title="Create New Stock Transport">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('stock_transports.stock_transport.edit', $stockTransport->id ) }}" class="btn btn-primary" title="Edit Stock Transport">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Stock Transport" onclick="return confirm(&quot;Delete Stock Transport??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Quantity')</dt>
            <dd>{{ $stockTransport->quantity}}</dd>
            <dt>@lang('view.Product Type')</dt>
            <dd><a href="{{ url('/productTypes/show/' . optional($stockTransport->getProductType)->id) }}">{{ optional($stockTransport->getProductType)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Average Price')</dt>
            <dd>{{ $stockTransport->average_price}}</dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $stockTransport->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $stockTransport->updated_at}}</dd>
            <dt>@lang('view.Uploader')</dt>
            <dd><a href="{{ url('/users/show/' . optional($stockTransport->getUser)->id) }}">{{ optional($stockTransport->getUser)->getRenderValue() }}</a></dd>

        </dl>

    </div>
</div>

@endsection