
@component('layouts.components.formInputTextRow', [
    'title' => __('view.First Name'),
	'cssClass' => '',
	'name' => 'first_name',
	'type' => 'text',
	'value' => $first_name ??  old('first_name', optional($buyer)->first_name) ,
	'minLength' => '',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Last Name'),
	'cssClass' => '',
	'name' => 'last_name',
	'type' => 'text',
	'value' => $last_name ??  old('last_name', optional($buyer)->last_name) ,
	'minLength' => '',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Email'),
	'cssClass' => '',
	'name' => 'email',
	'type' => 'text',
	'value' => $email ??  old('email', optional($buyer)->email) ,
	'minLength' => '',
	'maxLength' => ' maxlength="255"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Phone Number'),
	'cssClass' => '',
	'name' => 'phone_number',
	'type' => 'text',
	'value' => $phone_number ??  old('phone_number', optional($buyer)->phone_number) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => ' min="0"',
	'maxValue' => ' max="10"',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextAreaField', [
    'title' => __('view.Adress'),
	'cssClass' => '',
	'name' => 'adress',
	'value' => $adress ??  old('adress', optional($buyer)->adress) ,
	'minLength' => '',
	'maxLength' => '',
	'minValue' => '',
	'maxValue' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Cnp'),
	'cssClass' => '',
	'name' => 'cnp',
	'type' => 'text',
	'value' => $cnp ??  old('cnp', optional($buyer)->cnp) ,
	'minLength' => '',
	'maxLength' => ' maxlength="13"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputTextRow', [
    'title' => __('view.Identity Seria Nr'),
	'cssClass' => '',
	'name' => 'identity_seria_nr',
	'type' => 'text',
	'value' => $identity_seria_nr ??  old('identity_seria_nr', optional($buyer)->identity_seria_nr) ,
	'minLength' => '',
	'maxLength' => ' maxlength="6"',
	'minValue' => '',
	'maxValue' => '',
	'step' => ''
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Settlement'),
    'cssClass' => '',
    'name' => 'settlement',
	'value' => $settlement ??  old('settlement', optional($buyer)->settlement) ,
    'multiple' => '',
    'fieldItems' => $getSettlements
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Identity Seria Type'),
    'cssClass' => '',
    'name' => 'identity_seria_type',
	'value' => $identity_seria_type ??  old('identity_seria_type', optional($buyer)->identity_seria_type) ,
    'multiple' => '',
    'fieldItems' => $getIdentityCardSeries
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Identity Card Type'),
    'cssClass' => '',
    'name' => 'identity_card_type',
	'value' => $identity_card_type ??  old('identity_card_type', optional($buyer)->identity_card_type) ,
    'multiple' => '',
    'fieldItems' => $getIdentityCardTypes
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Uploader'),
    'cssClass' => '',
    'name' => 'uploader',
	'value' => $uploader ??  old('uploader', optional($buyer)->uploader) ,
    'multiple' => '',
    'fieldItems' => $getUsers
])
@endcomponent

@component('layouts.components.formInputSelectMenuField', [
    'title' => __('view.Notification Type'),
    'cssClass' => '',
    'name' => 'notification_type',
	'value' => $notification_type ??  old('notification_type', optional($buyer)->notification_type) ,
    'multiple' => '',
    'fieldItems' => $getNotificationTypes
])
@endcomponent

