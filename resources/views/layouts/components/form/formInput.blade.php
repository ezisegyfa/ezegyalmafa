@switch($formInfo->getType())
	@case('textinput')
		@component('layouts.components.inputs.textInput', [
			'label' => $formInfo->label,
			'name' => $formInfo->id,
			'errors' => $errors,
			'value' => $formInfo->value ?? '',
			'validationRules' => $formInfo->getValidationRules()
		])
		@endcomponent
	@break
	@case('select')
		@component('layouts.components.inputs.select', [
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
		@component('layouts.components.inputs.textAreaInput', [
			'label' => $formInfo->label,
			'name' => $formInfo->id,
			'errors' => $errors,
			'value' => $formInfo->value ?? '',
			'validationRules' => $formInfo->getValidationRules()
		])
		@endcomponent
	@break
	@case('checkBox')
		@component('layouts.components.inputs.checkBox', [
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