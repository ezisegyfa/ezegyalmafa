<div class="form-group row {{ $errors->has('text') ? 'has-error' : '' }}">
	<label for="{{ $name }}" class="col-md-3 col-form-label">{{ $title ?? $name }}</label>

    <div class="col-md-6">
		<textarea class="form-control{{ $cssClass }}" name="{{ $name }}" cols="50" rows="10" id="{{ $name }}"{{ $minLength }}{{ $maxLength }}{{ $minValue }}{{ $maxValue }}{{ $required }}{{ $placeholder }}>{{ $value }}</textarea>
	</div>
</div>