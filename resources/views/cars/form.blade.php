
@component('layouts.components.formInputTextRow', [
    'title' => __('view.License Plate Number'),
	'cssClass' => '',
	'name' => 'license_plate_number',
	'type' => 'text',
	'value' =>  old('license_plate_number', optional($car)->license_plate_number) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="1"',
	'maxValue' => ' max="20"',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Type'),
    'cssClass' => '',
    'name' => 'type',
	'value' =>  old('type', optional($car)->type) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getCarTypes
])
@endcomponent
