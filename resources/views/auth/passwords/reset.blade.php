@extends('layouts.app')

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

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'email',
                            'labelTextLanguageTitle' => 'E-Mail Address',
                            'errors' => $errors,
                            'value' => old('email') ?? ''
                        ])
                        @endcomponent

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'password',
                            'labelTextLanguageTitle' => 'Password',
                            'errors' => $errors,
                            'value' => old('password') ?? ''
                        ])
                        @endcomponent

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'password_confirmation',
                            'id' => 'password-confirm',
                            'labelTextLanguageTitle' => 'Password confirmation',
                            'type' => 'password',
                            'errors' => $errors,
                            'value' => old('password_confirmation') ?? ''
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
