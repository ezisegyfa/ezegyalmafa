@extends('layouts.webshop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @component('layouts.components.form.cardForm', [
                'title' => __('register.Register'),
                'formInfos' => $registerFormInfos,
                'sendButtonTitle' => __('register.Register'),
                'route' => route('register')
            ])
            @endcomponent
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/webshop/location.js') }}"></script>
@endsection