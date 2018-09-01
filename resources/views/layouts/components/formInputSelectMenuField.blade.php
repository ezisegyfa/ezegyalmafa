<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
	<label for="{{ $name }}" class="col-md-2 control-label">{{ $title ?? $name }}</label>
	<select class="form-control{{ $cssClass }}" id="{{ $name }}" name="{{ $name }}"{{ $multiple }}{{ $required }}>
		<option value="" style="display: none;" {{ $value == "" ? "selected" : "" }} disabled selected>{{ $placeholder }}</option>
		@foreach ($fieldItems as $key => $fieldItem)
		    <option value="{{ $key }}"{{ $value == $key ? 'selected' : ''  }}>
		    	{{ $fieldItem }}
		    </option>
		@endforeach
	</select>
</div>