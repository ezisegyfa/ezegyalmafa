
@component('layouts.components.formInputTextRow', [
    'title' => __('view.name'),
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
    'title' => __('view.email'),
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
    'title' => __('view.password'),
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
    'title' => __('view.remember_token'),
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

