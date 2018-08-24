<?php 
    $id = $id ?? $name;
    $hasError = ($errors and $errors->has($name));
?>
<div class="form-group row">
    <label for="{{ $id }}" class="col-sm-4 col-form-label text-md-right">{{ __($labelTextLanguageTitle) }}</label>

    <div class="col-md-6">
        <input id="{{ $id }}" type="{{ $type ?? $name }}" class="form-control{{ $hasError ? ' is-invalid' : '' }}" name="{{ $name }}" value="{{ isset($oldValue) ? old($oldValue) : '' }}" required>

        @component('layouts.components.errorMessage',[
            'errors' => $errors,
            'name' => $name
        ])
        @endcomponent
    </div>
</div>