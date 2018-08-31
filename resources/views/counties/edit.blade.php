@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
  
        <div class="btn-group btn-group-sm pull-right" role="group">
            <a href="{{ route('menu') }}" class="btn btn-primary" title="Return to menu">
                <span class="glyphicon glyphicon-th-list" aria-hidden="true">Back to menu</span>
            </a>
        </div>

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($county->name) ? $county->name : 'County' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('counties.county.index') }}" class="btn btn-primary" title="Show All County">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show all</span>
                </a>

                <a href="{{ route('counties.county.create') }}" class="btn btn-success" title="Create New County">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
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

            <form method="POST" id="edit_county_form" name="edit_county_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('counties.form', [
                                        'county' => $county,
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

@include('postDataFunctions')
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/helperMethods.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var form = $('#edit_county_form')
        form.on('submit', function(e){
            e.preventDefault()

            var postData = getFormData(form)
            var redirectUrl = '{!! route('counties.county.update', $county->id) !!}'

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