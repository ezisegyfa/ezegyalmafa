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
            <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back to menu</span>
        </a>
    </div>

    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($identityCardSeries->name) ? $identityCardSeries->name : 'Identity Card Series' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('identity_card_series.identity_card_series.destroy', $identityCardSeries->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('identity_card_series.identity_card_series.index') }}" class="btn btn-primary" title="Show All Identity Card Series">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show all</span>
                    </a>

                    <a href="{{ route('identity_card_series.identity_card_series.create') }}" class="btn btn-success" title="Create New Identity Card Series">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="{{ route('identity_card_series.identity_card_series.edit', $identityCardSeries->id ) }}" class="btn btn-primary" title="Edit Identity Card Series">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Identity Card Series" onclick="return confirm(&quot;Delete Identity Card Series??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $identityCardSeries->name}}</dd>

        </dl>

    </div>
</div>

@endsection