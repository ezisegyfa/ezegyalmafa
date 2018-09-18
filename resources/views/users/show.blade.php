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
            <h4 class="mt-3 mb-3">@lang('view.User')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="Edit User">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete User" onclick="return confirm(&quot;Delete User??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.Name')</dt>
            <dd>{{ $user->name}}</dd>
            <dt>@lang('view.Email')</dt>
            <dd>{{ $user->email}}</dd>
            <dt>@lang('view.Password')</dt>
            <dd>{{ $user->password}}</dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $user->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $user->updated_at}}</dd>
            <dt>@lang('view.Remember Token')</dt>
            <dd>{{ $user->remember_token}}</dd>

        </dl>

    </div>
</div>

@endsection