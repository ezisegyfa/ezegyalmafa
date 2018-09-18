
@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Driver'),
    'cssClass' => '',
    'name' => 'driver',
	'value' => $driver ??  old('driver', optional($driverCar)->driver) ,
    'multiple' => '',
    'fieldItems' => $getDrivers
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Car'),
    'cssClass' => '',
    'name' => 'car',
	'value' => $car ??  old('car', optional($driverCar)->car) ,
    'multiple' => '',
    'fieldItems' => $getCars
])
@endcomponent

