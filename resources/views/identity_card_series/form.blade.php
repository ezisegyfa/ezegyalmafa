
@component('layouts.components.formInputTextRow', [
    'title' => __('view.name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' => $name ??  old('name', optional($identityCardSeries)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="10"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

