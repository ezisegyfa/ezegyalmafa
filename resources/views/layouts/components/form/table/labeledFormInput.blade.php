<?php
    if (isset($formInfo->id) && !empty($formInfo->id)) {
        $id = $formInfo->id;
        $labelForAttribute = 'for=' . $id;
    }
    else {
        $id = null;
        $labelForAttribute = '';
    }

    if (isset($formInfo->label) && !empty($formInfo->id))
        $label = $formInfo->label;
    else if (!empty($id))
        $label = $id;
    else
        $label = '';
?>
<div class="container">
			@if (!empty($label))
					<label {{ $labelForAttribute }} class="text-right">{{ $label }}</label>
			@endif
				@component('layouts.components.form.formInput', [
				    'formInfo' => $formInfo
				])
				@endcomponent
				@component('layouts.components.form.errorMessage',[
				    'errors' => $errors,
				    'name' => $id
				])
				@endcomponent
</div>