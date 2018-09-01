@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

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

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Notification Types</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('notification_types.notification_type.create') }}" class="btn btn-success" title="Create New Notification Type">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>
            </div>

        </div>
        
        @if(count($notificationTypes) == 0)
            <div class="panel-body text-center">
                <h4>No Notification Types Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($notificationTypes as $notificationType)
                        <tr>
                            <td> {{ $notificationType->name}} </td>

                            <td>

                                <form method="POST" action="{!! route('notification_types.notification_type.destroy', $notificationType->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('notification_types.notification_type.show', $notificationType->id ) }}" class="btn btn-info" title="Show Notification Type">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('notification_types.notification_type.edit', $notificationType->id ) }}" class="btn btn-primary" title="Edit Notification Type">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Notification Type" onclick="return confirm(&quot;Delete Notification Type?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $notificationTypes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection