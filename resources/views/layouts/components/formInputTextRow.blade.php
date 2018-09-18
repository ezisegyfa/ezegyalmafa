<?php 
    $hasError = ($errors and $errors->has($name));
?>
@extends('layouts.components.formInputComponent')
@section('inputContent')
    <input id="{{ $name }}" type="{{ $type ?? $name }}" class="form-control{{ $hasError ? ' is-invalid' : '' }}" name="{{ $name }}" value="{{ $value ?? old($name) ?? '' }}" placeholder="@lang('view.WriteTextHere')">
@overwrite