<?php
    $hasError = ($errors and $errors->has($name));
?>
@if ($hasError)
    <span class="invalid-feedback">
        <strong>{{ $errors->first($name) }}</strong>
    </span>
@endif