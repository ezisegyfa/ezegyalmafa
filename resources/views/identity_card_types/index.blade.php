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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Identity Card Types</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('identity_card_types.identity_card_type.create') }}" class="btn btn-success" title="Create New Identity Card Type">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>
            </div>

        </div>
        
        @if(count($identityCardTypes) == 0)
            <div class="panel-body text-center">
                <h4>No Identity Card Types Available!</h4>
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
                    @foreach($identityCardTypes as $identityCardType)
                        <tr>
                            <td> {{ $identityCardType->name}} </td>

                            <td>

                                <form method="POST" action="{!! route('identity_card_types.identity_card_type.destroy', $identityCardType->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('identity_card_types.identity_card_type.show', $identityCardType->id ) }}" class="btn btn-info" title="Show Identity Card Type">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('identity_card_types.identity_card_type.edit', $identityCardType->id ) }}" class="btn btn-primary" title="Edit Identity Card Type">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Identity Card Type" onclick="return confirm(&quot;Delete Identity Card Type?&quot;)">
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
            {!! $identityCardTypes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection