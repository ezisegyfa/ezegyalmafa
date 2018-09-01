
@component('layouts.components.formInputTextRow', [
        'title' => 'Quantity',
	'cssClass' => '',
	'name' => 'quantity',
	'type' => 'number',
	'value' =>  old('quantity', optional($transport)->quantity) ,
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
    'title' => 'Order',
    'cssClass' => '',
    'name' => 'order',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter order here...',
    'fieldItems' => $getOrders,
    'value' => old('order', optional($transport)->order ?: '$key')
])
@endcomponent

