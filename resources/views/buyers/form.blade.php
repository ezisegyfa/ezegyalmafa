
@component('layouts.components.formInputTextRow', [
        'title' => 'First Name',
	'cssClass' => '',
	'name' => 'first_name',
	'type' => 'text',
	'value' =>  old('first_name', optional($buyer)->first_name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter first name here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Last Name',
	'cssClass' => '',
	'name' => 'last_name',
	'type' => 'text',
	'value' =>  old('last_name', optional($buyer)->last_name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter last name here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Email',
	'cssClass' => '',
	'name' => 'email',
	'type' => 'text',
	'value' =>  old('email', optional($buyer)->email) ,
	'minLength' => '',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => '',
	'placeholder' => ' placeholder="Enter email here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Phone Number',
	'cssClass' => '',
	'name' => 'phone_number',
	'type' => 'text',
	'value' =>  old('phone_number', optional($buyer)->phone_number) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="1"',
	'maxValue' => ' max="15"',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter phone number here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextAreaField', [
    'title' => 'Adress',
	'cssClass' => '',
	'name' => 'adress',
	'minLength' => '',
	'maxLength' => '',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter adress here..."',
	'value' =>  old('adress', optional($buyer)->adress) 
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Cnp',
	'cssClass' => '',
	'name' => 'cnp',
	'type' => 'text',
	'value' =>  old('cnp', optional($buyer)->cnp) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="10"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter cnp here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
        'title' => 'Seria Nr',
	'cssClass' => '',
	'name' => 'seria_nr',
	'type' => 'text',
	'value' =>  old('seria_nr', optional($buyer)->seria_nr) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="10"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'placeholder' => ' placeholder="Enter seria nr here..."',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'City',
    'cssClass' => '',
    'name' => 'city',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter city here...',
    'fieldItems' => $getCities,
    'value' => old('city', optional($buyer)->city ?: '$key')
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'Seria',
    'cssClass' => '',
    'name' => 'seria',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter seria here...',
    'fieldItems' => $getIdentityCardSeries,
    'value' => old('seria', optional($buyer)->seria ?: '$key')
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => 'Identity Card Type',
    'cssClass' => '',
    'name' => 'identity_card_type',
    'multiple' => '',
    'required' => ' required="true"',
    'placeholder' => 'Enter identity card type here...',
    'fieldItems' => $getIdentityCardTypes,
    'value' => old('identity_card_type', optional($buyer)->identity_card_type ?: '$key')
])
@endcomponent

