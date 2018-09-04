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
            <h4 class="mt-3 mb-3">@lang('view.Buyer Observation')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('buyer_observations.buyer_observation.destroy', $buyerObservation->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('buyer_observations.buyer_observation.index') }}" class="btn btn-primary" title="Show All Buyer Observation">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('buyer_observations.buyer_observation.create') }}" class="btn btn-success" title="Create New Buyer Observation">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('buyer_observations.buyer_observation.edit', $buyerObservation->id ) }}" class="btn btn-primary" title="Edit Buyer Observation">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Buyer Observation" onclick="return confirm(&quot;Delete Buyer Observation??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Text')</dt>
            <dd>{{ $buyerObservation->text}}</dd>
            <dt>@lang('view.Score')</dt>
            <dd>{{ $buyerObservation->score}}</dd>
            <dt>@lang('view.Type')</dt>
            <dd><a href="{{ url('/observationTypes/show/' . optional($buyerObservation->getObservationType)->id) }}">{{ optional($buyerObservation->getObservationType)->name }}</a></dd>
            <dt>@lang('view.Buyer')</dt>
            <dd><a href="{{ url('/buyers/show/' . optional($buyerObservation->getBuyer)->id) }}">{{ optional($buyerObservation->getBuyer)->email }}</a></dd>
            <dt>@lang('view.Uploader')</dt>
            <dd><a href="{{ url('/users/show/' . optional($buyerObservation->getUser)->id) }}">{{ optional($buyerObservation->getUser)->email }}</a></dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $buyerObservation->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $buyerObservation->updated_at}}</dd>

        </dl>

    </div>
</div>

@endsection