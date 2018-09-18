
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Image'),
	'cssClass' => '',
	'name' => 'image',
	'type' => 'text',
	'value' => $image ??  old('image', optional($productType)->image) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="1"',
	'maxValue' => ' max="255"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Material Type'),
    'cssClass' => '',
    'name' => 'material_type',
	'value' => $material_type ??  old('material_type', optional($productType)->material_type) ,
    'multiple' => '',
    'fieldItems' => $getMaterialTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Process Type'),
    'cssClass' => '',
    'name' => 'process_type',
	'value' => $process_type ??  old('process_type', optional($productType)->process_type) ,
    'multiple' => '',
    'fieldItems' => $getProcessTypes
])
@endcomponent

