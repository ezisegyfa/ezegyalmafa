
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' =>  old('name', optional($identityCardType)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="10"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

