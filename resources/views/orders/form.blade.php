
@component('layouts.components.formInputTextRow', [
        'title' => 'Quantity',
	'cssClass' => '',
	'name' => 'quantity',
	'type' => 'number',
	'value' =>  old('quantity', optional($order)->quantity) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter quantity here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'Buyer',
    'cssClass' => '',
    'name' => 'buyer',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter buyer here...',
    'fieldItems' => $getBuyers,
    'value' => old('buyer', optional($order)->buyer ?: '$key')
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'Product Type',
    'cssClass' => '',
    'name' => 'product_type',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter product type here...',
    'fieldItems' => $getProductTypes,
    'value' => old('product_type', optional($order)->product_type ?: '$key')
])
@endcomponent

