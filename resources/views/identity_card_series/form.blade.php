
@component('layouts.components.formInputTextRow', [
        'title' => 'Name',
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' =>  old('name', optional($identityCardSeries)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="10"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter name here..."',
	'step' => ''
])
@endcomponent

