<?php 
    $hasError = ($errors and $errors->has($name));
    $required = (array_key_exists('required', $validationRules) && $validationRules['required']) ? ' required' : '';
    if (array_key_exists('numeric', $validationRules))
        $type = 'number';
    else if (array_key_exists('email', $validationRules))
        $type = 'email';
    else if (array_key_exists('password', $validationRules))
        $type = 'password';
    else
        $type = 'text';
    if (array_key_exists('max', $validationRules)) {
    	if ($type == 'number')
    		$max = ' max="' . $validationRules['max'] . '"';
    	else
    		$max = ' maxLength="' . $validationRules['max'] . '"';
    }
    else
    	$max = '';
?>
@extends('layouts.components.formInputComponent')
@section('inputContent')
    <input id="{{ $name }}" type="{{ $type }}" class="form-control{{ $hasError ? ' is-invalid' : '' }}" name="{{ $name }}" value="{{ $value ?? old($name) ?? '' }}" {{ $max }}{{ $required }}>
@overwrite