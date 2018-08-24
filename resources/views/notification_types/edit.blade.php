@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($notificationType->name) ? $notificationType->name : 'Notification Type' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('notification_types.notification_type.index') }}" class="btn btn-primary" title="Show All Notification Type">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('notification_types.notification_type.create') }}" class="btn btn-success" title="Create New Notification Type">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" id="edit_notification_type_form" name="edit_notification_type_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('notification_types.form', [
                                        'notificationType' => $notificationType,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/helperMethods.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var form = $('#edit_notification_type_form')
        form.on('submit', function(e){
            e.preventDefault()

            var postData = form.serializeArray()
            var redirectUrl = '{!! route('notification_types.notification_type.update', $notificationType->id) !!}'

            ajaxPostWithLog({
                url : redirectUrl,
                data : postData,
                success : function(e){
                    get('/home')
                },
                error : function(jqXhr, json, errorThrown){
                    postData.errors = jqXhr.errors
                    post(redirectUrl, postData)
                }
            })
        })
    })
</script>
@endsection