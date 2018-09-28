@extends('layouts.components.formInputComponent')
@section('inputContent')
	<textarea class="form-control" name="{{ $name }}" cols="50" rows="10" id="{{ $name }}"{{ $minLength ?? '' }}{{ $maxLength ?? '' }} placeholder="@lang('view.WriteTextHere')">{{ $value ?? old($name) ?? '' }}</textarea>
@overwrite