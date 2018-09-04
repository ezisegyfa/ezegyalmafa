
@component('layouts.components.formInputTextRow', [
    'title' => __('view.Name'),
	'cssClass' => '',
	'name' => 'name',
	'type' => 'text',
	'value' =>  old('name', optional($settlement)->name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.County'),
    'cssClass' => '',
    'name' => 'county',
	'value' =>  old('county', optional($settlement)->county) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getCounties
])
@endcomponent

