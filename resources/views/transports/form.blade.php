
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Quantity'),
	'cssClass' => '',
	'name' => 'quantity',
	'type' => 'number',
	'value' =>  old('quantity', optional($transport)->quantity) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Order'),
    'cssClass' => '',
    'name' => 'order',
	'value' =>  old('order', optional($transport)->order) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getOrders
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Uploader'),
    'cssClass' => '',
    'name' => 'uploader',
	'value' =>  old('uploader', optional($transport)->uploader) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getUsers
])
@endcomponent

