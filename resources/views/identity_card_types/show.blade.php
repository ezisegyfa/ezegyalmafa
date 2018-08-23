@extends('layouts.app')

@section('content')

<div class="panel panel-default">
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
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('identity_card_types.identity_card_type.create') }}" class="btn btn-success" title="Create New Identity Card Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('identity_card_types.identity_card_type.edit', $identityCardType->id ) }}" class="btn btn-primary" title="Edit Identity Card Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Identity Card Type" onclick="return confirm(&quot;Delete Identity Card Type??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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