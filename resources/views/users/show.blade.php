@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'User' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="Edit User">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete User" onclick="return confirm(&quot;Delete User??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>First Name</dt>
            <dd>{{ $user->first_name}}</dd>
            <dt>Last Name</dt>
            <dd>{{ $user->last_name}}</dd>
            <dt>Email</dt>
            <dd>{{ $user->email}}</dd>
            <dt>Phone Number</dt>
            <dd>{{ $user->phone_number}}</dd>
            <dt>Adress</dt>
            <dd>{{ $user->adress}}</dd>
            <dt>Cnp</dt>
            <dd>{{ $user->cnp}}</dd>
            <dt>Seria Nr</dt>
            <dd>{{ $user->seria_nr}}</dd>
            <dt>City</dt>
            <dd><a href="{{ url('/cities/show/' . optional($user->getCity)->id) }}">{{ optional($user->getCity)->name }}</a></dd>
            <dt>Seria</dt>
            <dd><a href="{{ url('/identityCardSeries/show/' . optional($user->getIdentityCardSeries)->id) }}">{{ optional($user->getIdentityCardSeries)->name }}</a></dd>
            <dt>Identity Card Type</dt>
            <dd><a href="{{ url('/identityCardTypes/show/' . optional($user->getIdentityCardType)->id) }}">{{ optional($user->getIdentityCardType)->name }}</a></dd>
            <dt>Created At</dt>
            <dd>{{ $user->created_at}}</dd>
            <dt>Updated At</dt>
            <dd>{{ $user->updated_at}}</dd>

        </dl>

    </div>
</div>

@endsection