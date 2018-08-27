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
                <h4 class="mt-5 mb-5">Buyers</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('buyers.buyer.create') }}" class="btn btn-success" title="Create New Buyer">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>
            </div>

        </div>
        
        @if(count($buyers) == 0)
            <div class="panel-body text-center">
                <h4>No Buyers Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($buyers as $buyer)
                        <tr>
                            <td> {{ $buyer->first_name}} </td>
                            <td> {{ $buyer->last_name}} </td>
                            <td> {{ $buyer->email}} </td>
                            <td> {{ $buyer->phone_number}} </td>

                            <td>

                                <form method="POST" action="{!! route('buyers.buyer.destroy', $buyer->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('buyers.buyer.show', $buyer->id ) }}" class="btn btn-info" title="Show Buyer">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('buyers.buyer.edit', $buyer->id ) }}" class="btn btn-primary" title="Edit Buyer">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Buyer" onclick="return confirm(&quot;Delete Buyer?&quot;)">
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
            {!! $buyers->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection