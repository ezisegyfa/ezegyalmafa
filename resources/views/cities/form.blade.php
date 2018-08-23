
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($city)->name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('county') ? 'has-error' : '' }}">
    <label for="county" class="col-md-2 control-label">County</label>
    <div class="col-md-10">
        <select class="form-control" id="county" name="county" required="true">
        	    <option value="" style="display: none;" {{ old('county', optional($city)->county ?: '') == '' ? 'selected' : '' }} disabled selected>Enter county here...</option>
        	@foreach ($getCounties as $key => $getCounty)
			    <option value="{{ $key }}" {{ old('county', optional($city)->county) == $key ? 'selected' : '' }}>
			    	{{ $getCounty }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('county', '<p class="help-block">:message</p>') !!}
    </div>
</div>

