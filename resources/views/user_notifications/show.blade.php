@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'User Notification' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('user_notifications.user_notification.destroy', $userNotification->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('user_notifications.user_notification.index') }}" class="btn btn-primary" title="Show All User Notification">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('user_notifications.user_notification.create') }}" class="btn btn-success" title="Create New User Notification">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('user_notifications.user_notification.edit', $userNotification->id ) }}" class="btn btn-primary" title="Edit User Notification">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete User Notification" onclick="return confirm(&quot;Delete User Notification??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Text</dt>
            <dd>{{ $userNotification->text}}</dd>
            <dt>Score</dt>
            <dd>{{ $userNotification->score}}</dd>
            <dt>Type</dt>
            <dd><a href="{{ url('/notificationTypes/show/' . optional($userNotification->getNotificationType)->id) }}">{{ optional($userNotification->getNotificationType)->name }}</a></dd>
            <dt>User</dt>
            <dd><a href="{{ url('/users/show/' . optional($userNotification->getUser)->id) }}">{{ optional($userNotification->getUser)->first_name }}</a></dd>

        </dl>

    </div>
</div>

@endsection