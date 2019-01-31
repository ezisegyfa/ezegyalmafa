@if (isset($errors) && $errors->has($name))
    <div class="alert alert-danger">
        <strong>{{ $errors->first($name) }}</strong>
    </div>
@endif