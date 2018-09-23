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
            <h4 class="mt-3 mb-3">@lang('view.Order')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('orders.order.destroy', $order->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('orders.order.index') }}" class="btn btn-primary" title="Show All Order">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('orders.order.create') }}" class="btn btn-success" title="Create New Order">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('orders.order.edit', $order->id ) }}" class="btn btn-primary" title="Edit Order">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Order" onclick="return confirm(&quot;Delete Order??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Quantity')</dt>
            <dd>{{ $order->quantity}}</dd>
            <dt>@lang('view.Buyer')</dt>
            <dd><a href="{{ url('/buyers/show/' . optional($order->getBuyer)->id) }}">{{ optional($order->getBuyer)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Product Type')</dt>
            <dd><a href="{{ url('/productTypes/show/' . optional($order->getProductType)->id) }}">{{ optional($order->getProductType)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Uploader')</dt>
            <dd><a href="{{ url('/users/show/' . optional($order->getUser)->id) }}">{{ optional($order->getUser)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Settlement')</dt>
            <dd><a href="{{ url('/settlements/show/' . optional($order->getSettlement)->id) }}">{{ optional($order->getSettlement)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Price')</dt>
            <dd>{{ $order->price}}</dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $order->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $order->updated_at}}</dd>

        </dl>

    </div>
</div>

@endsection