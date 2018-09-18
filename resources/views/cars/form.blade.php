
@component('layouts.components.formInputTextRow', [
    'title' => __('view.License Plate Number'),
	'cssClass' => '',
	'name' => 'license_plate_number',
	'type' => 'text',
	'value' => $license_plate_number ??  old('license_plate_number', optional($car)->license_plate_number) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="1"',
	'maxValue' => ' max="20"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Type'),
    'cssClass' => '',
    'name' => 'type',
	'value' => $type ??  old('type', optional($car)->type) ,
    'multiple' => '',
    'fieldItems' => $getCarTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Uploader'),
    'cssClass' => '',
    'name' => 'uploader',
	'value' => $uploader ??  old('uploader', optional($car)->uploader) ,
    'multiple' => '',
    'fieldItems' => $getUsers
])
@endcomponent

