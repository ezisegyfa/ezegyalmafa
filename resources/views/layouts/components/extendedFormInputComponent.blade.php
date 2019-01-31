@switch($formInfo->getType())
	@case('input')
		@component('layouts.components.formInputTextRow', [
			'label' => $formInfo->label,
			'name' => $formInfo->id,
			'errors' => $errors,
			'value' => $formInfo->value ?? '',
			'validationRules' => $formInfo->getValidationRules()
		])
		@endcomponent
	@break
	@case('select')
		@component('layouts.components.formInputSelect', [
			'label' => $formInfo->label,
			'name' => $formInfo->id,
			'errors' => $errors,
			'value' => $formInfo->value ?? '',
			'options' => $formInfo->options,
			'validationRules' => $formInfo->getValidationRules()
		])
		@endcomponent
	@break
	@case('textArea')
		@component('layouts.components.formInputTextArea', [
			'label' => $formInfo->label,
			'name' => $formInfo->id,
			'errors' => $errors,
			'value' => $formInfo->value ?? '',
			'validationRules' => $formInfo->getValidationRules()
		])
		@endcomponent
	@break
	@case('checkBox')
		@component('layouts.components.formInputCheckBox', [
			'label' => $formInfo->label,
			'name' => $formInfo->id,
			'errors' => $errors,
			'value' => $formInfo->value,
			'validationRules' => $formInfo->getValidationRules()
		])
		@endcomponent
	@break
	@default
		Error: Unexpected input type!
	@enddefault
@endswitch