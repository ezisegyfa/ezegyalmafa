@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form id="login-form" method="POST" action="{{ url('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        @component('layouts.components.formInputTextRow', [
                            'name' => 'email',
                            'title' => 'E-Mail Address',
                            'errors' => $errors
                        ])
                        @endcomponent

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'password',
                            'title' => 'Password',
                            'errors' => $errors
                        ])
                        @endcomponent

                        @component('layouts.components.formInputCheckbox',[
                            'name' => 'remember',
                            'title' => 'Remember Me'
                        ])
                        @endcomponent

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection