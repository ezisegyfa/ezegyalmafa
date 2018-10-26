
@component('layouts.components.formInputTextRow', [
    'title' => __('view.first_name'),
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
    'title' => __('view.last_name'),
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
    'title' => __('view.cnp'),
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
