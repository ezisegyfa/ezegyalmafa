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
                <span class="glyphicon glyphicon-th-list" aria-hidden="true">@lang('view.BackToMenu')</span>
            </a>
        </div>

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-3 mb-3">@lang('view.Counties')</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right mb-3" role="group">
                <a href="{{ route('counties.county.create') }}" class="btn btn-success" title="Create New County">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">@lang('view.Create')</span>
                </a>
            </div>

        </div>
        
        @if(count($counties) == 0)
            <div class="panel-body text-center">
                <h4>@lang('view.No Counties available!')</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>@lang('view.Name')</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($counties as $county)
                        <tr>
                            <td> {{ $county->name}} </td>

                            <td>

                                <form method="POST" action="{!! route('counties.county.destroy', $county->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('counties.county.show', $county->id ) }}" class="btn btn-info" title="Show County">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">@lang('view.Show')</span>
                                        </a>
                                        <a href="{{ route('counties.county.edit', $county->id ) }}" class="btn btn-primary" title="Edit County">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">@lang('view.Edit')</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete County" onclick="return confirm(&quot;Delete County?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
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
            {!! $counties->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection