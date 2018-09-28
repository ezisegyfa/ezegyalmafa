
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Quantity'),
	'cssClass' => '',
	'name' => 'quantity',
	'type' => 'number',
	'value' => $quantity ??  old('quantity', optional($order)->quantity) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Buyer'),
    'cssClass' => '',
    'name' => 'buyer',
	'value' => $buyer ??  old('buyer', optional($order)->buyer) ,
    'multiple' => '',
    'fieldItems' => $getBuyers
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Product Type'),
    'cssClass' => '',
    'name' => 'product_type',
	'value' => $product_type ??  old('product_type', optional($order)->product_type) ,
    'multiple' => '',
    'fieldItems' => $getProductTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Settlement'),
    'cssClass' => '',
    'name' => 'settlement',
	'value' => $settlement ??  old('settlement', optional($order)->settlement) ,
    'multiple' => '',
    'fieldItems' => $getSettlements
])
@endcomponent

@component('layouts.components.formInputTextAreaField', [
    'title' => __('view.address'),
	'cssClass' => '',
	'name' => 'address',
	'value' => $address ??  old('address', optional($order)->address) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => '',
	'maxValue' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Price'),
	'cssClass' => '',
	'name' => 'price',
	'type' => 'number',
	'value' => $price ??  old('price', optional($order)->price) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'step' => ''
])
@endcomponent

