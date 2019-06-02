<?php
	if (!empty($value) || (!empty($name) && !empty(old($name))))
		$checkedAttribute = 'checked';
	else 
		$checkedAttribute = '';
?>
<div class="form-group row {{ $errors->has('text') ? 'has-error' : '' }}">
    <div class="col-md-6 offset-md-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" {{ getAttribute('name') }} {{ $checkedAttribute }}> {{ $label ?? $name ?? '' }}
            </label>
        </div>
    </div>
</div>