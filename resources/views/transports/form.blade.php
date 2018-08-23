
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">Quantity</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ old('quantity', optional($transport)->quantity) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter quantity here...">
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('order') ? 'has-error' : '' }}">
    <label for="order" class="col-md-2 control-label">Order</label>
    <div class="col-md-10">
        <select class="form-control" id="order" name="order" required="true">
        	    <option value="" style="display: none;" {{ old('order', optional($transport)->order ?: '') == '' ? 'selected' : '' }} disabled selected>Enter order here...</option>
        	@foreach ($getOrders as $key => $getOrder)
			    <option value="{{ $key }}" {{ old('order', optional($transport)->order) == $key ? 'selected' : '' }}>
			    	{{ $getOrder }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('order', '<p class="help-block">:message</p>') !!}
    </div>
</div>

