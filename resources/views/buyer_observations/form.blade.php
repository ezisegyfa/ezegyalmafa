
@component('layouts.components.formInputTextAreaField', [
    'title' => __('view.Text'),
	'cssClass' => '',
	'name' => 'text',
	'value' => $text ??  old('text', optional($buyerObservation)->text) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => '',
	'maxValue' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Score'),
	'cssClass' => '',
	'name' => 'score',
	'type' => 'number',
	'value' => $score ??  old('score', optional($buyerObservation)->score) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Type'),
    'cssClass' => '',
    'name' => 'type',
	'value' => $type ??  old('type', optional($buyerObservation)->type) ,
    'multiple' => '',
    'fieldItems' => $getObservationTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Buyer'),
    'cssClass' => '',
    'name' => 'buyer',
	'value' => $buyer ??  old('buyer', optional($buyerObservation)->buyer) ,
    'multiple' => '',
    'fieldItems' => $getBuyers
])
@endcomponent
