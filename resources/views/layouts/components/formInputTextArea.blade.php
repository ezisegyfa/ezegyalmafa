<?php 
    $required = (array_key_exists('required', $validationRules) && $validationRules['required']) ? ' required' : '';
    $max = array_key_exists('max', $validationRules) ? ' maxLength="' . $validationRules['max'] . '"' : '';
?>
@extends('layouts.components.formInputComponent')
@section('inputContent')
	<textarea class="form-control" name="{{ $name }}" cols="50" rows="10" id="{{ $name }}"{{ $max }}>{{ $value ?? old($name) ?? '' }}</textarea>
@overwrite