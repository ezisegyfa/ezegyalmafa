<div class="form-group row {{ $errors->has('text') ? 'has-error' : '' }}">
	<label for="{{ $name }}" class="col-md-3 col-form-label">{{ $title ?? $name }}</label>
	
    <div class="col-md-6">
    	@yield('inputContent')
        @component('layouts.components.errorMessage',[
            'errors' => $errors,
            'name' => $name
        ])
        @endcomponent
	</div>
</div>