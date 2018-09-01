<?php 
    $hasError = ($errors and $errors->has($name));
?>
<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
    <label for="{{ $name }}" class="col-md-2 control-label">{{ $title ?? $name }}</label>

    <div class="col-md-6">
        <input id="{{ $name }}" type="{{ $type ?? $name }}" class="form-control{{ $hasError ? ' is-invalid' : '' }}" name="{{ $name }}" value="{{ $value }}" required>

        @component('layouts.components.errorMessage',[
            'errors' => $errors,
            'name' => $name
        ])
        @endcomponent
    </div>
</div>