<div class="form-group row {{ $errors->has('text') ? 'has-error' : '' }}">
    <div class="col-md-6 offset-md-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="{{ $name }}" {{ $value ? 'checked' : '' }}> {{ $label ?? $name }}
            </label>
        </div>
    </div>
</div>