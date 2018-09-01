
@component('layouts.components.formInputTextRow', [
        'title' => 'Name',
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' =>  old('name', optional($user)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter name here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Email',
	'cssClass' => '',
	'name' => 'email',
	'type' => 'text',
	'value' =>  old('email', optional($user)->email) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter email here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Password',
	'cssClass' => '',
	'name' => 'password',
	'type' => 'text',
	'value' =>  old('password', optional($user)->password) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter password here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Remember Token',
	'cssClass' => '',
	'name' => 'remember_token',
	'type' => 'text',
	'value' =>  old('remember_token', optional($user)->remember_token) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="100"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter remember token here..."',
	'step' => ''
])
@endcomponent

