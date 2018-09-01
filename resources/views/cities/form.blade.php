
@component('layouts.components.formInputTextRow', [
        'title' => 'Name',
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' =>  old('name', optional($city)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter name here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'County',
    'cssClass' => '',
    'name' => 'county',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter county here...',
    'fieldItems' => $getCounties,
    'value' => old('county', optional($city)->county ?: '$key')
])
@endcomponent

