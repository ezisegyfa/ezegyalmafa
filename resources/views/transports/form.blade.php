
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Quantity'),
	'cssClass' => '',
	'name' => 'quantity',
	'type' => 'number',
	'value' => $quantity ??  old('quantity', optional($transport)->quantity) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Order'),
    'cssClass' => '',
    'name' => 'order',
	'value' => $order ??  old('order', optional($transport)->order) ,
    'multiple' => '',
    'fieldItems' => $getOrders
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Car'),
    'cssClass' => '',
    'name' => 'car',
	'value' => $car ??  old('car', optional($transport)->car) ,
    'multiple' => '',
    'fieldItems' => $getCars
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Driver'),
    'cssClass' => '',
    'name' => 'driver',
	'value' => $driver ??  old('driver', optional($transport)->driver) ,
    'multiple' => '',
    'fieldItems' => $getDrivers
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Stock'),
    'cssClass' => '',
    'name' => 'stock',
	'value' => $stock ??  old('stock', optional($transport)->stock) ,
    'multiple' => '',
    'fieldItems' => $getStockTransports
])
@endcomponent

