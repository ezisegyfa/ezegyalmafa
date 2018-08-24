
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">Quantity</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ old('quantity', optional($order)->quantity) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter quantity here...">
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('buyer') ? 'has-error' : '' }}">
    <label for="buyer" class="col-md-2 control-label">Buyer</label>
    <div class="col-md-10">
        <select class="form-control" id="buyer" name="buyer" required="true">
        	    <option value="" style="display: none;" {{ old('buyer', optional($order)->buyer ?: '') == '' ? 'selected' : '' }} disabled selected>Enter buyer here...</option>
        	@foreach ($getBuyers as $key => $getBuyer)
			    <option value="{{ $key }}" {{ old('buyer', optional($order)->buyer) == $key ? 'selected' : '' }}>
			    	{{ $getBuyer }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('buyer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_type') ? 'has-error' : '' }}">
    <label for="product_type" class="col-md-2 control-label">Product Type</label>
    <div class="col-md-10">
        <select class="form-control" id="product_type" name="product_type" required="true">
        	    <option value="" style="display: none;" {{ old('product_type', optional($order)->product_type ?: '') == '' ? 'selected' : '' }} disabled selected>Enter product type here...</option>
        	@foreach ($getProductTypes as $key => $getProductType)
			    <option value="{{ $key }}" {{ old('product_type', optional($order)->product_type) == $key ? 'selected' : '' }}>
			    	{{ $getProductType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('product_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

