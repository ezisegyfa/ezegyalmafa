
@component('layouts.components.formInputTextRow', [
    'title' => __('view.First Name'),
	'cssClass' => '',
	'name' => 'first_name',
	'type' => 'text',
	'value' => $first_name ??  old('first_name', optional($driver)->first_name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Last Name'),
	'cssClass' => '',
	'name' => 'last_name',
	'type' => 'text',
	'value' => $last_name ??  old('last_name', optional($driver)->last_name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Cnp'),
	'cssClass' => '',
	'name' => 'cnp',
	'type' => 'text',
	'value' => $cnp ??  old('cnp', optional($driver)->cnp) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="13"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent
