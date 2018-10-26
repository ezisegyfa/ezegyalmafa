
@component('layouts.components.formInputTextRow', [
    'title' => __('view.image'),
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
    'title' => __('view.material_type'),
    'cssClass' => '',
    'name' => 'material_type',
	'value' => $material_type ??  old('material_type', optional($productType)->material_type) ,
    'multiple' => '',
    'fieldItems' => $getMaterialTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.process_type'),
    'cssClass' => '',
    'name' => 'process_type',
	'value' => $process_type ??  old('process_type', optional($productType)->process_type) ,
    'multiple' => '',
    'fieldItems' => $getProcessTypes
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.average_price'),
	'cssClass' => '',
	'name' => 'average_price',
	'type' => 'number',
	'value' => $average_price ??  old('average_price', optional($productType)->average_price) ,
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextAreaField', [
    'title' => __('view.description'),
	'cssClass' => '',
	'name' => 'description',
	'value' => $description ??  old('description', optional($productType)->description)
])
@endcomponent