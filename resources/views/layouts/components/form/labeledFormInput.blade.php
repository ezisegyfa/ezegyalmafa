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
<div class="form-group row {{ $errors->has('text') ? 'has-error' : '' }}">
	@if (!empty($label))
	    <label {{ $labelForAttribute }} class="col-md-3 col-form-label text-right">{{ $label }}</label>
	@endif
	<div class="col-md-6">
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
</div>