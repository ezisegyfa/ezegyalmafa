<div class="form-group row">
    <?php 
        $id = $id ?? $name;
        $hasError = ($errors and $errors->has($name));
    ?>
    <label for="{{ $id }}" class="col-sm-4 col-form-label text-md-right">{{ $labelText }}</label>

    <div class="col-md-6">
        <div class="col-sm-3">
            <select class="selectpicker">
                @foreach($menuItems as $menuItem)
                    <option>{{ $menuItem }}</option>
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