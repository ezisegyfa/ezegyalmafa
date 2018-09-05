
@component('layouts.components.formInputTextRow', [
    'title' => __('view.First Name'),
	'cssClass' => '',
	'name' => 'first_name',
	'type' => 'text',
	'value' =>  old('first_name', optional($buyer)->first_name) ,
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
	'value' =>  old('last_name', optional($buyer)->last_name) ,
	'minLength' => ' minlength="1"',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => ' required="true"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Email'),
	'cssClass' => '',
	'name' => 'email',
	'type' => 'text',
	'value' =>  old('email', optional($buyer)->email) ,
	'minLength' => '',
	'maxLength' => ' maxlength="191"',
	'minValue' => '',
	'maxValue' => '',
	'required' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Phone Number'),
	'cssClass' => '',
	'name' => 'phone_number',
	'type' => 'text',
	'value' =>  old('phone_number', optional($buyer)->phone_number) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="0"',
	'maxValue' => ' max="10"',
	'required' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextAreaField', [
    'title' => __('view.Adress'),
	'cssClass' => '',
	'name' => 'adress',
	'value' =>  old('adress', optional($buyer)->adress) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => '',
	'maxValue' => '',
	'required' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Cnp'),
	'cssClass' => '',
	'name' => 'cnp',
	'type' => 'text',
	'value' =>  old('cnp', optional($buyer)->cnp) ,
	'minLength' => '',
	'maxLength' => ' maxlength="10"',
	'minValue' => '',
	'maxValue' => '',
	'required' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Identity Seria Nr'),
	'cssClass' => '',
	'name' => 'identity_seria_nr',
	'type' => 'text',
	'value' =>  old('identity_seria_nr', optional($buyer)->identity_seria_nr) ,
	'minLength' => '',
	'maxLength' => ' maxlength="6"',
	'minValue' => '',
	'maxValue' => '',
	'required' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Settlement'),
    'cssClass' => '',
    'name' => 'settlement',
	'value' =>  old('settlement', optional($buyer)->settlement) ,
    'multiple' => '',
    'required' => ' required="true"',
    'fieldItems' => $getSettlements
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Identity Seria Type'),
    'cssClass' => '',
    'name' => 'identity_seria_type',
	'value' =>  old('identity_seria_type', optional($buyer)->identity_seria_type) ,
    'multiple' => '',
    'required' => '',
    'fieldItems' => $getIdentityCardSeries
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Identity Card Type'),
    'cssClass' => '',
    'name' => 'identity_card_type',
	'value' =>  old('identity_card_type', optional($buyer)->identity_card_type) ,
    'multiple' => '',
    'required' => '',
    'fieldItems' => $getIdentityCardTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Notification Type'),
    'cssClass' => '',
    'name' => 'notification_type',
	'value' =>  old('notification_type', optional($buyer)->notification_type) ,
    'multiple' => '',
    'required' => '',
    'fieldItems' => $getNotificationTypes
])
@endcomponent

