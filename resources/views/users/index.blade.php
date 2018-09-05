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
                <h4 class="mt-3 mb-3">@lang('view.Users')</h4>
            </div>
        </div>

    </div>
        
    @if(count($users) == 0)
        <div class="panel-body text-center">
            <h4>@lang('view.No Users available!')</h4>
        </div>
    @else
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>@lang('view.Name')</th>
                        <th>@lang('view.Email')</th>
                        <th>@lang('view.Password')</th>
                        <th>@lang('view.Remember Token')</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td> {{ $user->name}} </td>
                            <td> {{ $user->email}} </td>
                            <td> {{ $user->password}} </td>
                            <td> {{ $user->remember_token}} </td>

                            <td>
                                <a href="{{ route('users.user.show', $user->id ) }}" class="btn btn-info" title="Show User">
                                    <span class="glyphicon glyphicon-open" aria-hidden="true">@lang('view.Show')</span>
                                </a>
                                @if ($user->id != Auth::user()->id)
                                    <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" title="Delete User" onclick="return confirm(&quot;Delete User?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">@lang('view.Delete')</span>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="panel-footer">
        {!! $users->render() !!}
    </div>
    
    @endif

@endsection