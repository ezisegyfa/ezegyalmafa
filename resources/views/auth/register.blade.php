@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <form id="register-form" method="POST" action="/register" aria-label="{{ __('Register') }}">
                @csrf

                @component('layouts.components.formInputTextRow',[
                    'name' => 'name',
                    'labelTextLanguageTitle' => 'Name',
                    'value' => old('name') ?? '',
                    'errors' => $errors
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow',[
                    'name' => 'email',
                    'labelTextLanguageTitle' => 'E-Mail Address',
                    'value' => old('email') ?? '',
                    'errors' => $errors
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
                    'title' => 'password confirmation',
                    'name' => 'password_confirmation',
                    'id' => 'password-confirm',
                    'labelTextLanguageTitle' => 'Password confirmation',
                    'type' => 'password',
                    'errors' => $errors,
                    'value' => old('password_confirmation') ?? ''
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow',[
                    'title' => 'access code',
                    'name' => 'access_code',
                    'labelTextLanguageTitle' => 'Access code',
                    'errors' => $errors,
                    'value' => old('access_code') ?? ''
                ])
                @endcomponent

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection