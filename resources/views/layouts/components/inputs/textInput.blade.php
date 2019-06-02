<?php 
    $hasError = ($errors and $errors->has($name));

    if (!isset($validationRules) || !is_array($validationRules))
        $validationRules = [];

    $required = (array_key_exists('required', $validationRules) && $validationRules['required']) ? ' required' : '';

    if (array_key_exists('numeric', $validationRules))
        $type = 'number';
    else if (array_key_exists('email', $validationRules))
        $type = 'email';
    else if (array_key_exists('password', $validationRules))
        $type = 'password';
    else
        $type = 'text';

    if (array_key_exists('max', $validationRules) && $type == 'numeric') 
        $maxAttribute = 'max=' . $validationRules['max'];
    else
        $maxAttribute = '';

    if (array_key_exists('max', $validationRules) && array_key_exists('string', $validationRules))
        $maxLengthAttribute = 'maxlength=' . $validationRules['max'];
    else if (array_key_exists('digits', $validationRules))
        $maxLengthAttribute = 'maxlength=' . $validationRules['digits'];
    else
        $maxLengthAttribute = '';

    if (array_key_exists('min', $validationRules) && array_key_exists('string', $validationRules))
        $minLengthAttribute = 'minlength=' . $validationRules['min'];
    else if (array_key_exists('digits', $validationRules))
        $minLengthAttribute = 'minlength=' . $validationRules['digits'];
    else
        $minLengthAttribute = '';

    if (empty($value)) {
        $oldValue = old($name);
        if (empty($oldValue))
            $valueAttribute = '';
        else
            $valueAttribute = 'value=' . $oldValue;
    }
    else
        $valueAttribute = 'value=' . $value;
?>
<input id="{{ $name }}" type="{{ $type }}" class="form-control{{ $hasError ? ' is-invalid' : '' }}" name="{{ $name }}" {{ $valueAttribute }} {{ $minLengthAttribute }} {{ $maxAttribute }} {{ $maxLengthAttribute }} {{ $required }}>