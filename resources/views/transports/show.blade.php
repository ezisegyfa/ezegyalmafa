@extends('layouts.app')

@section('content')

<div class="panel panel-default">

    <div class="btn-group btn-group-sm pull-right" role="group">
        <a href="{{ route('menu') }}" class="btn btn-primary" title="Return to menu">
            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back to menu</span>
        </a>
    </div>

    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Transport' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('transports.transport.destroy', $transport->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('transports.transport.index') }}" class="btn btn-primary" title="Show All Transport">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('transports.transport.create') }}" class="btn btn-success" title="Create New Transport">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('transports.transport.edit', $transport->id ) }}" class="btn btn-primary" title="Edit Transport">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Transport" onclick="return confirm(&quot;Delete Transport??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Quantity</dt>
            <dd>{{ $transport->quantity}}</dd>
            <dt>Order</dt>
            <dd><a href="{{ url('/orders/show/' . optional($transport->getOrder)->id) }}">{{ optional($transport->getOrder)->quantity }}</a></dd>
            <dt>Created At</dt>
            <dd>{{ $transport->created_at}}</dd>
            <dt>Updated At</dt>
            <dd>{{ $transport->updated_at}}</dd>

        </dl>

    </div>
</div>

@endsection