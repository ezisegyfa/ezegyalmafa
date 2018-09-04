
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' =>  old('name', optional($user)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Email'),
	'cssClass' => '',
	'name' => 'email',
	'type' => 'text',
	'value' =>  old('email', optional($user)->email) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Password'),
	'cssClass' => '',
	'name' => 'password',
	'type' => 'text',
	'value' =>  old('password', optional($user)->password) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Remember Token'),
	'cssClass' => '',
	'name' => 'remember_token',
	'type' => 'text',
	'value' =>  old('remember_token', optional($user)->remember_token) ,
	'minLength' => '',
	'maxLength' => ' maxlength="100"',
	'minValue' => '',
	'maxValue' => '',
	'required' => '',
	'step' => ''
])
@endcomponent

