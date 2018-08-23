@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Order' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('orders.order.destroy', $order->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('orders.order.index') }}" class="btn btn-primary" title="Show All Order">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('orders.order.create') }}" class="btn btn-success" title="Create New Order">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('orders.order.edit', $order->id ) }}" class="btn btn-primary" title="Edit Order">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Order" onclick="return confirm(&quot;Delete Order??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Quantity</dt>
            <dd>{{ $order->quantity}}</dd>
            <dt>User</dt>
            <dd><a href="{{ url('/users/show/' . optional($order->getUser)->id) }}">{{ optional($order->getUser)->id }}</a></dd>
            <dt>Product Type</dt>
            <dd><a href="{{ url('/productTypes/show/' . optional($order->getProductType)->id) }}">{{ optional($order->getProductType)->id }}</a></dd>
            <dt>Created At</dt>
            <dd>{{ $order->created_at}}</dd>
            <dt>Updated At</dt>
            <dd>{{ $order->updated_at}}</dd>

        </dl>

    </div>
</div>

@endsection