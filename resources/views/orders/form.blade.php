
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Quantity'),
	'cssClass' => '',
	'name' => 'quantity',
	'type' => 'number',
	'value' =>  old('quantity', optional($order)->quantity) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Buyer'),
    'cssClass' => '',
    'name' => 'buyer',
	'value' =>  old('buyer', optional($order)->buyer) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getBuyers
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Product Type'),
    'cssClass' => '',
    'name' => 'product_type',
	'value' =>  old('product_type', optional($order)->product_type) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getProductTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Uploader'),
    'cssClass' => '',
    'name' => 'uploader',
	'value' =>  old('uploader', optional($order)->uploader) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getUsers
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.City'),
    'cssClass' => '',
    'name' => 'city',
	'value' =>  old('city', optional($order)->city) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getSettlements
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Price'),
	'cssClass' => '',
	'name' => 'price',
	'type' => 'number',
	'value' =>  old('price', optional($order)->price) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Car'),
    'cssClass' => '',
    'name' => 'car',
	'value' =>  old('car', optional($order)->car) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getCars
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Driver'),
    'cssClass' => '',
    'name' => 'driver',
	'value' =>  old('driver', optional($order)->driver) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getDrivers
])
@endcomponent

