<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
	<label for="{{ $name }}" class="col-md-2 control-label">{{ $title ?? $name }}</label>
	<textarea class="form-control{{ $cssClass }}" name="{{ $name }}" cols="50" rows="10" id="{{ $name }}"{{ $minLength }}{{ $maxLength }}{{ $minValue }}{{ $maxValue }}{{ $required }}{{ $placeholder }}>{{ $value }}</textarea>
</div>