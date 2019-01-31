@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @component('layouts.components.form', [
                'formInfos' => $formInfos,
                'route' => url('login')
            ])
            @endcomponent
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        </div>
    </div>
</div>
@endsection