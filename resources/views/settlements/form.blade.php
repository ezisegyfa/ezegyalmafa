
@component('layouts.components.formInputTextRow', [
    'title' => __('view.name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' => $name ??  old('name', optional($settlement)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.region'),
    'cssClass' => '',
    'name' => 'region',
	'value' => $region ??  old('region', optional($settlement)->region) ,
    'multiple' => '',
    'fieldItems' => $getRegions
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.post_code'),
	'cssClass' => '',
	'name' => 'post_code',
	'type' => 'number',
	'value' => $post_code ??  old('post_code', optional($settlement)->post_code) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'step' => ''
])
@endcomponent

