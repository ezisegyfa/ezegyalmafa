@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="btn-group btn-group-sm pull-right" role="group">
            <a href="{{ route('menu') }}" class="btn btn-primary" title="Return to menu">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.BackToMenu')</span>
            </a>
        </div>

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-3 mb-3">@lang('view.Process Type')</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right mb-3" role="group">

                <a href="{{ route('process_types.process_type.index') }}" class="btn btn-primary" title="Show All Process Type">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                </a>

                <a href="{{ route('process_types.process_type.create') }}" class="btn btn-success" title="Create New Process Type">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
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

            <form method="POST" action="{{ route('process_types.process_type.update', $processType->id) }}" id="edit_process_type_form" name="edit_process_type_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('process_types.form', [
                                        'processType' => $processType,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="@lang('view.Update')">
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection