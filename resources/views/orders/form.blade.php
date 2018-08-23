
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">Quantity</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ old('quantity', optional($order)->quantity) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter quantity here...">
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
    <label for="user" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user" name="user" required="true">
        	    <option value="" style="display: none;" {{ old('user', optional($order)->user ?: '') == '' ? 'selected' : '' }} disabled selected>Enter user here...</option>
        	@foreach ($getUsers as $key => $getUser)
			    <option value="{{ $key }}" {{ old('user', optional($order)->user) == $key ? 'selected' : '' }}>
			    	{{ $getUser }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
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

