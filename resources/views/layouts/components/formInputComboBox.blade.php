<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
    <label for="{{ $name }}" class="col-md-2 control-label">{{ $title ?? $name }}</label>

    <div class="col-md-6">
        <div class="col-sm-3">
            <select name="{{ $name }}" class="selectpicker">
                @foreach($selectableItems as $item)
                    <option>{{ $item }}</option>
                @endforeach
            </select>
        </div>
        @component('layouts.components.errorMessage',[
            'errors' => $errors,
            'name' => $name
        ])
        @endcomponent
    </div>
</div>