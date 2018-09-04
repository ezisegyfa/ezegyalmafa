
@component('layouts.components.formInputTextRow', [
    'title' => __('view.First Name'),
	'cssClass' => '',
	'name' => 'first_name',
	'type' => 'text',
	'value' =>  old('first_name', optional($driver)->first_name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Last Name'),
	'cssClass' => '',
	'name' => 'last_name',
	'type' => 'text',
	'value' =>  old('last_name', optional($driver)->last_name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Cnp'),
	'cssClass' => '',
	'name' => 'cnp',
	'type' => 'text',
	'value' =>  old('cnp', optional($driver)->cnp) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="10"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Uploader'),
    'cssClass' => '',
    'name' => 'uploader',
	'value' =>  old('uploader', optional($driver)->uploader) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getUsers
])
@endcomponent

