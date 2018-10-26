
@component('layouts.components.formInputTextRow', [
    'title' => __('view.name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' => $name ??  old('name', optional($processType)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

