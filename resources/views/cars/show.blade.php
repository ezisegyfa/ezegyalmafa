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
            <h4 class="mt-3 mb-3">@lang('view.Car')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('cars.car.destroy', $car->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('cars.car.index') }}" class="btn btn-primary" title="Show All Car">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('cars.car.create') }}" class="btn btn-success" title="Create New Car">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('cars.car.edit', $car->id ) }}" class="btn btn-primary" title="Edit Car">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Car" onclick="return confirm(&quot;Delete Car??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.License Plate Number')</dt>
            <dd>{{ $car->license_plate_number}}</dd>
            <dt>@lang('view.Type')</dt>
            <dd><a href="{{ url('/carTypes/show/' . optional($car->getCarType)->id) }}">{{ optional($car->getCarType)->name }}</a></dd>
            <dt>@lang('view.Uploader')</dt>
            <dd><a href="{{ url('/users/show/' . optional($car->getUser)->id) }}">{{ optional($car->getUser)->id }}</a></dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $car->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $car->updated_at}}</dd>

        </dl>

    </div>
</div>

@endsection