<?php
	$required = (array_key_exists('required', $validationRules) && $validationRules['required']) ? ' required' : '';
?>
@extends('layouts.components.formInputComponent')
@section('inputContent')
	<select class="form-control" id="{{ $name }}" name="{{ $name }}" placeholder="@lang('view.SelectOption')"{{ $required }}>
		@if (!isset($value) && !old($name))
			<option value="" style="display: none;" disabled selected>@lang('view.SelectOption')</option>
		@endif
		@foreach ($options as $key => $option)
		    <option value="{{ $option->id }}"{{ ($value ?? old($name)) == $key ? 'selected' : ''  }}>
		    	{{ $option->label }}
		    </option>
		@endforeach
	</select>
@overwrite