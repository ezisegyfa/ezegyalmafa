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
            <h4 class="mt-3 mb-3">@lang('view.Buyer')</h4>
        </span>

        <div class="pull-right mb-3">

            <form method="POST" action="{!! route('buyers.buyer.destroy', $buyer->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('buyers.buyer.index') }}" class="btn btn-primary" title="Show All Buyer">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.ShowAll')</span>
                    </a>

                    <a href="{{ route('buyers.buyer.create') }}" class="btn btn-success" title="Create New Buyer">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                    </a>
                    
                    <a href="{{ route('buyers.buyer.edit', $buyer->id ) }}" class="btn btn-primary" title="Edit Buyer">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Buyer" onclick="return confirm(&quot;Delete Buyer??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('view.First Name')</dt>
            <dd>{{ $buyer->first_name}}</dd>
            <dt>@lang('view.Last Name')</dt>
            <dd>{{ $buyer->last_name}}</dd>
            <dt>@lang('view.Email')</dt>
            <dd>{{ $buyer->email}}</dd>
            <dt>@lang('view.Phone Number')</dt>
            <dd>{{ $buyer->phone_number}}</dd>
            <dt>@lang('view.Adress')</dt>
            <dd>{{ $buyer->adress}}</dd>
            <dt>@lang('view.Cnp')</dt>
            <dd>{{ $buyer->cnp}}</dd>
            <dt>@lang('view.Identity Seria Nr')</dt>
            <dd>{{ $buyer->identity_seria_nr}}</dd>
            <dt>@lang('view.Settlement')</dt>
            <dd><a href="{{ url('/settlements/show/' . optional($buyer->getSettlement)->id) }}">{{ optional($buyer->getSettlement)->name }}</a></dd>
            <dt>@lang('view.Identity Seria Type')</dt>
            <dd><a href="{{ url('/identityCardSeries/show/' . optional($buyer->getIdentityCardSeries)->id) }}">{{ optional($buyer->getIdentityCardSeries)->name }}</a></dd>
            <dt>@lang('view.Identity Card Type')</dt>
            <dd><a href="{{ url('/identityCardTypes/show/' . optional($buyer->getIdentityCardType)->id) }}">{{ optional($buyer->getIdentityCardType)->name }}</a></dd>
            <dt>@lang('view.Uploader')</dt>
            <dd><a href="{{ url('/users/show/' . optional($buyer->getUser)->id) }}">{{ optional($buyer->getUser)->email }}</a></dd>
            <dt>@lang('view.Created At')</dt>
            <dd>{{ $buyer->created_at}}</dd>
            <dt>@lang('view.Updated At')</dt>
            <dd>{{ $buyer->updated_at}}</dd>
            <dt>@lang('view.Notification Type')</dt>
            <dd><a href="{{ url('/notificationTypes/show/' . optional($buyer->getNotificationType)->id) }}">{{ optional($buyer->getNotificationType)->name }}</a></dd>

        </dl>

    </div>
</div>

@endsection