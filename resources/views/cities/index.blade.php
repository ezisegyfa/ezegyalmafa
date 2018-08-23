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
                <h4 class="mt-5 mb-5">Cities</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('cities.city.create') }}" class="btn btn-success" title="Create New City">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($cities) == 0)
            <div class="panel-body text-center">
                <h4>No Cities Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>County</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($cities as $city)
                        <tr>
                            <td> {{ $city->name}} </td>
                            <td> <a href="{{ url('/counties/show/' . optional($city->getCounty)->id) }}">{{ optional($city->getCounty)->id }}</a> </td>

                            <td>

                                <form method="POST" action="{!! route('cities.city.destroy', $city->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('cities.city.show', $city->id ) }}" class="btn btn-info" title="Show City">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('cities.city.edit', $city->id ) }}" class="btn btn-primary" title="Edit City">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete City" onclick="return confirm(&quot;Delete City?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
            {!! $cities->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection