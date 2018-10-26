@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
            <form id="register-form" method="POST" action="{{ url('register') }}" aria-label="{{ __('Register') }}">
                @csrf

                @component('layouts.components.formInputTextRow',[
                    'name' => 'name',
                    'title' => 'Name',
                    'errors' => $errors
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow',[
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

                @component('layouts.components.formInputTextRow',[
                    'title' => 'password confirmation',
                    'name' => 'password_confirmation',
                    'title' => 'Password confirmation',
                    'type' => 'password',
                    'errors' => $errors
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow',[
                    'title' => 'Access code',
                    'name' => 'access_code',
                    'errors' => $errors
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