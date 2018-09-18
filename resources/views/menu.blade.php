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
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Users')</span>
                        </a>

                        <a href="{{ route('buyers.buyer.index') }}" class="btn btn-success mr-2" title="Go to buyers">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Buyers')</span>
                        </a>

                        <a href="{{ route('buyer_observations.buyer_observation.index') }}" class="btn btn-success mr-2" title="Go to buyer observations">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Buyer Observations')</span>
                        </a>

                        <a href="{{ route('orders.order.index') }}" class="btn btn-success mr-2" title="Go to orders">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Orders')</span>
                        </a>

                        <a href="{{ route('transports.transport.index') }}" class="btn btn-success mr-2" title="Go to transports">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Transports')</span>
                        </a>

                        <a href="{{ route('stock_transports.stock_transport.index') }}" class="btn btn-success mr-2" title="Go to Stock Transports">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Stock Transports')</span>
                        </a>
                    </div>

                    <div class="row mt-3">
                        <a href="{{ route('settlements.settlement.index') }}" class="btn btn-success mr-2" title="Go to settlements">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Settlements')</span>
                        </a>

                        <a href="{{ route('regions.region.index') }}" class="btn btn-success mr-2" title="Go to regions">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Region')</span>
                        </a>

                        <a href="{{ route('cars.car.index') }}" class="btn btn-success mr-2" title="Go to cars">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Cars')</span>
                        </a>

                        <a href="{{ route('drivers.driver.index') }}" class="btn btn-success mr-2" title="Go to drivers">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Drivers')</span>
                        </a>

                    </div>

                    <div class="row mt-3">
                        <a href="{{ route('identity_card_series.identity_card_series.index') }}" class="btn btn-success mr-2" title="Go to identity card series">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Identity Card Series')</span>
                        </a>

                        <a href="{{ route('identity_card_types.identity_card_type.index') }}" class="btn btn-success mr-2" title="Go to identity card types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Identity Card Types')</span>
                        </a>

                        <a href="{{ route('notification_types.notification_type.index') }}" class="btn btn-success mr-2" title="Go to notification types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Notification Types')</span>
                        </a>
                    </div>

                    <div class="row mt-3">
                        <a href="{{ route('product_types.product_type.index') }}" class="btn btn-success mr-2" title="Go to product types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Product Types')</span>
                        </a>

                        <a href="{{ route('material_types.material_type.index') }}" class="btn btn-success mr-2" title="Go to material types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Material Types')</span>
                        </a>

                        <a href="{{ route('process_types.process_type.index') }}" class="btn btn-success mr-2" title="Go to process types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Process Types')</span>
                        </a>

                        <a href="{{ route('car_types.car_type.index') }}" class="btn btn-success mr-2" title="Go to car types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Car Types')</span>
                        </a>

                        <a href="{{ route('observation_types.observation_type.index') }}" class="btn btn-success mr-2" title="Go to observation types">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.Observation Types')</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection