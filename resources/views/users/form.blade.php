
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' => $name ??  old('name', optional($user)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Email'),
	'cssClass' => '',
	'name' => 'email',
	'type' => 'text',
	'value' => $email ??  old('email', optional($user)->email) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Password'),
	'cssClass' => '',
	'name' => 'password',
	'type' => 'text',
	'value' => $password ??  old('password', optional($user)->password) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Remember Token'),
	'cssClass' => '',
	'name' => 'remember_token',
	'type' => 'text',
	'value' => $remember_token ??  old('remember_token', optional($user)->remember_token) ,
	'minLength' => '',
	'maxLength' => ' maxlength="100"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

