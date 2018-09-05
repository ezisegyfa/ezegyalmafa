
@component('layouts.components.formInputTextAreaField', [
    'title' => __('view.Text'),
	'cssClass' => '',
	'name' => 'text',
	'value' =>  old('text', optional($buyerObservation)->text) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"'
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Score'),
	'cssClass' => '',
	'name' => 'score',
	'type' => 'number',
	'value' =>  old('score', optional($buyerObservation)->score) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Type'),
    'cssClass' => '',
    'name' => 'type',
	'value' =>  old('type', optional($buyerObservation)->type) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getObservationTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Buyer'),
    'cssClass' => '',
    'name' => 'buyer',
	'value' =>  old('buyer', optional($buyerObservation)->buyer) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getBuyers
])
@endcomponent
