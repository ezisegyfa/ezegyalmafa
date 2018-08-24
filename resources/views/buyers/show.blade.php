@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Buyer' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('buyers.buyer.destroy', $buyer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('buyers.buyer.index') }}" class="btn btn-primary" title="Show All Buyer">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('buyers.buyer.create') }}" class="btn btn-success" title="Create New Buyer">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('buyers.buyer.edit', $buyer->id ) }}" class="btn btn-primary" title="Edit Buyer">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Buyer" onclick="return confirm(&quot;Delete Buyer??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>First Name</dt>
            <dd>{{ $buyer->first_name}}</dd>
            <dt>Last Name</dt>
            <dd>{{ $buyer->last_name}}</dd>
            <dt>Email</dt>
            <dd>{{ $buyer->email}}</dd>
            <dt>Phone Number</dt>
            <dd>{{ $buyer->phone_number}}</dd>
            <dt>Adress</dt>
            <dd>{{ $buyer->adress}}</dd>
            <dt>Cnp</dt>
            <dd>{{ $buyer->cnp}}</dd>
            <dt>Seria Nr</dt>
            <dd>{{ $buyer->seria_nr}}</dd>
            <dt>City</dt>
            <dd><a href="{{ url('/cities/show/' . optional($buyer->getCity)->id) }}">{{ optional($buyer->getCity)->name }}</a></dd>
            <dt>Seria</dt>
            <dd><a href="{{ url('/identityCardSeries/show/' . optional($buyer->getIdentityCardSeries)->id) }}">{{ optional($buyer->getIdentityCardSeries)->name }}</a></dd>
            <dt>Identity Card Type</dt>
            <dd><a href="{{ url('/identityCardTypes/show/' . optional($buyer->getIdentityCardType)->id) }}">{{ optional($buyer->getIdentityCardType)->name }}</a></dd>

        </dl>

    </div>
</div>

@endsection