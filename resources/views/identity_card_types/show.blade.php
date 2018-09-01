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
            <h4 class="mt-5 mb-5">{{ isset($identityCardType->name) ? $identityCardType->name : 'Identity Card Type' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('identity_card_types.identity_card_type.destroy', $identityCardType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('identity_card_types.identity_card_type.index') }}" class="btn btn-primary" title="Show All Identity Card Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show all</span>
                    </a>

                    <a href="{{ route('identity_card_types.identity_card_type.create') }}" class="btn btn-success" title="Create New Identity Card Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="{{ route('identity_card_types.identity_card_type.edit', $identityCardType->id ) }}" class="btn btn-primary" title="Edit Identity Card Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Identity Card Type" onclick="return confirm(&quot;Delete Identity Card Type??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $identityCardType->name}}</dd>

        </dl>

    </div>
</div>

@endsection