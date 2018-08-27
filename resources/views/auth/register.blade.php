@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="register-form" aria-label="{{ __('Register') }}">
                        @csrf

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'name',
                            'labelTextLanguageTitle' => 'Name',
                            'oldValue' => 'name',
                            'errors' => $errors
                        ])
                        @endcomponent

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'email',
                            'labelTextLanguageTitle' => 'E-Mail Address',
                            'oldValue' => 'email',
                            'errors' => $errors
                        ])
                        @endcomponent

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'password',
                            'labelTextLanguageTitle' => 'Password',
                            'errors' => $errors
                        ])
                        @endcomponent

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'password_confirmation',
                            'id' => 'password-confirm',
                            'labelTextLanguageTitle' => 'Password confirmation',
                            'type' => 'password',
                            'errors' => $errors
                        ])
                        @endcomponent

                        @component('layouts.components.formInputTextRow',[
                            'name' => 'access_code',
                            'labelTextLanguageTitle' => 'Access code',
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
        </div>
    </div>
</div>
@endsection

@include('postDataFunctions')
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/helperMethods.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var form = $('#register-form')
        form.on('submit', function(e){
            e.preventDefault()
            
            var postData = getFormData(form)
            ajaxPostWithLog({
                url : '/register',
                data : postData,
                success : function(e){
                    get('/home')
                },
                error : function(jqXhr, json, errorThrown){
                    postData.errors = jqXhr.errors
                    post('/register', postData)
                }
            })
        })
    })
</script>
@endsection