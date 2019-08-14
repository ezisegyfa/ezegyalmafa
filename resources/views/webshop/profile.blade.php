@extends('layouts.webshop')

@section('webshopStyles')
    <link href="{{ asset('css/webshop/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-form">
                <div class="card-header">
                    @lang('profile.Profile')
                    <form method="POST" action="{{ url('gdpr/download') }}">
                        @csrf
                        <button type="submit" id="profile_export_button" class="btn btn-primary">@lang('profile.Export')</button>
                    </form>
                </div>

                <div class="card-body">
                    @component('layouts.components.form.form', [
                        'id' => $formId ?? '',
                        'formInfos' => $formInfos,
                        'sendButtonTitle' => __('profile.Edit'),
                        'route' =>  url('user/edit')
                    ])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/webshop/location.js') }}"></script>
@endsection