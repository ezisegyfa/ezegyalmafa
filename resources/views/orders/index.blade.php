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

        <div class="btn-group btn-group-sm pull-right" role="group">
            <a href="{{ route('menu') }}" class="btn btn-primary" title="Return to menu">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back to menu</span>
            </a>
        </div>

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Orders</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('orders.order.create') }}" class="btn btn-success" title="Create New Order">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>
            </div>

        </div>
        
        @if(count($orders) == 0)
            <div class="panel-body text-center">
                <h4>No Orders Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Buyer</th>
                            <th>Product Type</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td> {{ $order->quantity}} </td>
                            <td> <a href="{{ url('/buyers/show/' . optional($order->getBuyer)->id) }}">{{ optional($order->getBuyer)->first_name }}</a> </td>
                            <td> <a href="{{ url('/productTypes/show/' . optional($order->getProductType)->id) }}">{{ optional($order->getProductType)->name }}</a> </td>

                            <td>

                                <form method="POST" action="{!! route('orders.order.destroy', $order->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('orders.order.show', $order->id ) }}" class="btn btn-info" title="Show Order">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('orders.order.edit', $order->id ) }}" class="btn btn-primary" title="Edit Order">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Order" onclick="return confirm(&quot;Delete Order?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $orders->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection