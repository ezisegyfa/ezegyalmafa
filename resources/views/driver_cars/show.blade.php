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
            <h4 class="mt-3 mb-3">@lang('view.Driver Car')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('driver_cars.driver_car.destroy', $driverCar->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('driver_cars.driver_car.index') }}" class="btn btn-primary" title="Show All Driver Car">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('driver_cars.driver_car.create') }}" class="btn btn-success" title="Create New Driver Car">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('driver_cars.driver_car.edit', $driverCar->id ) }}" class="btn btn-primary" title="Edit Driver Car">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Driver Car" onclick="return confirm(&quot;Delete Driver Car??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Driver')</dt>
            <dd><a href="{{ url('/drivers/show/' . optional($driverCar->getDriver)->id) }}">{{ optional($driverCar->getDriver)->getRenderValue() }}</a></dd>
            <dt>@lang('view.Car')</dt>
            <dd><a href="{{ url('/cars/show/' . optional($driverCar->getCar)->id) }}">{{ optional($driverCar->getCar)->getRenderValue() }}</a></dd>

        </dl>

    </div>
</div>

@endsection