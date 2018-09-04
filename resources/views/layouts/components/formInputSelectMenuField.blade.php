@extends('layouts.components.formInputComponent')
@section('inputContent')
	<select class="form-control" id="{{ $name }}" name="{{ $name }}"{{ $multiple }}{{ $required }} placeholder="@lang('view.SelectOption')">
		@if (!isset($value) && !old($name))
			<option value="" style="display: none;" disabled selected>@lang('view.SelectOption')</option>
		@endif
		@foreach ($fieldItems as $key => $fieldItem)
		    <option value="{{ $key }}"{{ ($value ?? old($name)) == $key ? 'selected' : ''  }}>
		    	{{ $fieldItem }}
		    </option>
		@endforeach
	</select>
@overwrite