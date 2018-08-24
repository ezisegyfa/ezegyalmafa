<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="{{ $name }}" {{ old($name) ? 'checked' : '' }}> {{ __($textLanguageTitle) }}
            </label>
        </div>
    </div>
</div>