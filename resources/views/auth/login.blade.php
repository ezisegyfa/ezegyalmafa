@extends('layouts.webshop')

@section('webshopStyles')
    <link href="{{ asset('css/webshop/login.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container h-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="login_card" class="card">
                <div class="card-header">{{ __('login.Login') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ url($baseUrl . '/login') }}" aria-label="{{ __('login.Login') }}">
                        @csrf

                        @component('layouts.components.form.labeledFormInput', [
                            'formInfo' => new \App\Helpers\FormInfos\TextInput('email', '', '', 'email|maxLength:255')
                        ])
                        @endcomponent

                        @component('layouts.components.form.labeledFormInput',[
                            'formInfo' => new \App\Helpers\FormInfos\TextInput('password', '', '', 'password')
                        ])
                        @endcomponent

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('login.Remember me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('login.Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('login.Forgot Your Password?') }}
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