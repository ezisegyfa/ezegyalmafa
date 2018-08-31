@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">Menu</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="container">
                    <div class="row mt-3">
                        <a href="{{ route('users.user.index') }}" class="btn btn-success mr-2" title="Go to users">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Users</span>
                        </a>

                        <a href="{{ route('buyers.buyer.index') }}" class="btn btn-success mr-2" title="Go to buyers">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Buyers</span>
                        </a>

                        <a href="{{ route('buyer_notifications.buyer_notification.index') }}" class="btn btn-success mr-2" title="Go to buyer notifications">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Buyer notifications</span>
                        </a>

                        <a href="{{ route('orders.order.index') }}" class="btn btn-success mr-2" title="Go to orders">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Orders</span>
                        </a>

                        <a href="{{ route('transports.transport.index') }}" class="btn btn-success mr-2" title="Go to tranports">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Tranports</span>
                        </a>
                    </div>

                    <div class="row mt-3">
                        <a href="{{ route('cities.city.index') }}" class="btn btn-success mr-2" title="Go to cities">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Cities</span>
                        </a>

                        <a href="{{ route('counties.county.index') }}" class="btn btn-success mr-2" title="Go to counties">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Counties</span>
                        </a>
                    </div>

                    <div class="row mt-3">
                        <a href="{{ route('identity_card_series.identity_card_series.index') }}" class="btn btn-success mr-2" title="Go to identity card series">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Identity card series</span>
                        </a>

                        <a href="{{ route('identity_card_types.identity_card_type.index') }}" class="btn btn-success mr-2" title="Go to identity card types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Identity card types</span>
                        </a>

                        <a href="{{ route('notification_types.notification_type.index') }}" class="btn btn-success mr-2" title="Go to notification types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Notification types</span>
                        </a>

                        <a href="{{ route('product_types.product_type.index') }}" class="btn btn-success mr-2" title="Go to product types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Product types</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection