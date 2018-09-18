
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' => $name ??  old('name', optional($region)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Code'),
	'cssClass' => '',
	'name' => 'code',
	'type' => 'text',
	'value' => $code ??  old('code', optional($region)->code) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="5"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

