@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @component('layouts.components.form', [
                'formInfos' => $formInfos,
                'route' => url('register')
            ])
            @endcomponent
        </div>
    </div>
</div>
@endsection