<?php
	if (isset($validationRules) && $validationRules && array_key_exists('required', $validationRules) && $validationRules['required'])
		$requiredAttribute = 'required';
	else
		$requiredAttribute = '';
	if (isset($name) && $name)
		$nameAttribute = 'ïd="$name" name="$name"';
	else
		$nameAttribute = '';
	if (!isset($value))
		$value = null;
?>
<select class="form-control" {{ $nameAttribute }} placeholder="@lang('view.SelectOption')" {{ $requiredAttribute }}>
	@if (!$value)
		<option value="" style="display: none;" disabled selected>@lang('view.SelectOption')</option>
	@endif
	@foreach ($options as $key => $option)
	    <option value="{{ $option->id }}" {{ $value === $key ? 'selected' : ''  }}>
	    	{{ $option->label }}
	    </option>
	@endforeach
</select>