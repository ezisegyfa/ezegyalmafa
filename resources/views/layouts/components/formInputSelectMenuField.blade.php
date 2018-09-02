<div class="form-group row {{ $errors->has('text') ? 'has-error' : '' }}">
	<label for="{{ $name }}" class="col-md-3 col-form-label">{{ $title ?? $name }}</label>

    <div class="col-md-6">
		<select class="form-control{{ $cssClass }}" id="{{ $name }}" name="{{ $name }}"{{ $multiple }}{{ $required }}>
			<option value="" style="display: none;" {{ $value == "" ? "selected" : "" }} disabled selected>{{ $placeholder }}</option>
			@foreach ($fieldItems as $key => $fieldItem)
			    <option value="{{ $key }}"{{ $value == $key ? 'selected' : ''  }}>
			    	{{ $fieldItem }}
			    </option>
			@endforeach
		</select>
	</div>
</div>