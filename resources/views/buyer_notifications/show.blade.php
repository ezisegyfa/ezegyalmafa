@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Buyer Notification' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('buyer_notifications.buyer_notification.destroy', $buyerNotification->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('buyer_notifications.buyer_notification.index') }}" class="btn btn-primary" title="Show All Buyer Notification">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('buyer_notifications.buyer_notification.create') }}" class="btn btn-success" title="Create New Buyer Notification">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('buyer_notifications.buyer_notification.edit', $buyerNotification->id ) }}" class="btn btn-primary" title="Edit Buyer Notification">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Buyer Notification" onclick="return confirm(&quot;Delete Buyer Notification??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Text</dt>
            <dd>{{ $buyerNotification->text}}</dd>
            <dt>Score</dt>
            <dd>{{ $buyerNotification->score}}</dd>
            <dt>Type</dt>
            <dd><a href="{{ url('/notificationTypes/show/' . optional($buyerNotification->getNotificationType)->id) }}">{{ optional($buyerNotification->getNotificationType)->name }}</a></dd>
            <dt>Buyer</dt>
            <dd><a href="{{ url('/buyers/show/' . optional($buyerNotification->getBuyer)->id) }}">{{ optional($buyerNotification->getBuyer)->first_name }}</a></dd>

        </dl>

    </div>
</div>

@endsection