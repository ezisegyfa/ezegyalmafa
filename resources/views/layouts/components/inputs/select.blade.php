<?php
	if (isset($validationRules) && $validationRules && array_key_exists('required', $validationRules) && $validationRules['required'])
		$requiredAttribute = 'required';
	else
		$requiredAttribute = '';
	if (!empty($name))
		$nameAttribute = 'id=' . $name . ' name=' . $name;
	else
		$nameAttribute = '';
	if (empty($value))
		$value = old($name);
?>
<select class="form-control mdb-select" {{ $nameAttribute }} {{ $requiredAttribute }}>
	@if (empty($value))
		<option value="" style="display: none;" disabled selected>@lang('view.SelectOption')</option>
	@endif
	@foreach ($options as $option)
	    <option value="{{ $option->id }}" {{ $value == $option->id ? 'selected' : ''  }}>
	    	{{ $option->label }}
	    </option>
	@endforeach
</select>