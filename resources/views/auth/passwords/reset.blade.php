@extends('layouts.webshop')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        @component('layouts.components.form.labeledFormInput', [
                            'formInfo' => new \App\Helpers\FormInfos\TextInput('email', '', '', 'email|maxLength:255')
                        ])
                        @endcomponent

                        @component('layouts.components.form.labeledFormInput',[
                            'formInfo' => new \App\Helpers\FormInfos\TextInput('password', '', '',)
                        ])
                        @endcomponent

                        @component('layouts.components.form.labeledFormInput',[
                            'formInfo' => new \App\Helpers\FormInfos\TextInput('password_confirmation', '', '', 'minLength:8|maxLength:32')
                        ])
                        @endcomponent

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
