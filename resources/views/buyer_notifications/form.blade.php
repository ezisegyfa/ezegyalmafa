
@component('layouts.components.formInputTextAreaField', [
    'title' => 'Text',
	'cssClass' => '',
	'name' => 'text',
	'minLength' => '',
	'maxLength' => '',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter text here..."',
	'value' =>  old('text', optional($buyerNotification)->text) 
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Score',
	'cssClass' => '',
	'name' => 'score',
	'type' => 'number',
	'value' =>  old('score', optional($buyerNotification)->score) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="-2147483648"',
	'maxValue' => ' max="2147483647"',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter score here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'Type',
    'cssClass' => '',
    'name' => 'type',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter type here...',
    'fieldItems' => $getNotificationTypes,
    'value' => old('type', optional($buyerNotification)->type ?: '$key')
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'Buyer',
    'cssClass' => '',
    'name' => 'buyer',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter buyer here...',
    'fieldItems' => $getBuyers,
    'value' => old('buyer', optional($buyerNotification)->buyer ?: '$key')
])
@endcomponent

