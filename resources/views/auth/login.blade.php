@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form id="login-form" aria-label="{{ __('Login') }}">
                        @csrf

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

                        @component('layouts.components.formInputCheckbox',[
                            'name' => 'remember',
                            'textLanguageTitle' => 'Remember Me'
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

@include('postDataFunctions')
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        var form = $('#login-form')
        form.on('submit', function(e){
            e.preventDefault()

            postData = getFormData(form)
            ajaxPostWithLog({
                url : '/login',
                data : postData,
                success : function(e) {
                    get('/home')
                },
                error : function(jqXhr, json, errorThrown) {
                    postData.errors = jqXhr.errors
                    post('/login', postData)
                }
            })
        })
    })
</script>
@endsection