@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="btn-group btn-group-sm pull-right" role="group">
            <a href="{{ route('menu') }}" class="btn btn-primary" title="Return to menu">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.BackToMenu')</span>
            </a>
        </div>

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-3 mb-3">@lang('view.Create new') @lang('view.Observation Type')</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right mb-3" role="group">
                <a href="{{ route('observation_types.observation_type.index') }}" class="btn btn-primary" title="Show All Observation Type">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('observation_types.observation_type.store') }}" accept-charset="UTF-8" id="create_observation_type_form" name="create_observation_type_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('observation_types.form', [
                                        'observationType' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="@lang('view.Add')">
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection