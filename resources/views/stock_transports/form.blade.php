
@component('layouts.components.formInputTextRow', [
    'title' => __('view.quantity'),
	'cssClass' => '',
	'name' => 'quantity',
	'type' => 'number',
	'value' => $quantity ??  old('quantity', optional($stockTransport)->quantity) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.product_type'),
    'cssClass' => '',
    'name' => 'product_type',
	'value' => $product_type ??  old('product_type', optional($stockTransport)->product_type) ,
    'multiple' => '',
    'fieldItems' => $getProductTypes
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.average_price'),
	'cssClass' => '',
	'name' => 'average_price',
	'type' => 'number',
	'value' => $average_price ??  old('average_price', optional($stockTransport)->average_price) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'step' => ''
])
@endcomponent
