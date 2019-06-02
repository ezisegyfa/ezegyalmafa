@extends('layouts.webshop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            @component('layouts.components.form.cardForm', [
                'title' => __('profile.Profile'),
                'formInfos' => $formInfos,
                'sendButtonTitle' => __('profile.Edit'),
                'route' => url('user/edit')
            ])
            @endcomponent
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/webshop/location.js') }}"></script>
@endsection