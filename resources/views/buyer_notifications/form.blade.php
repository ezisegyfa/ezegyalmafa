
<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
    <label for="text" class="col-md-2 control-label">Text</label>
    <div class="col-md-10">
        <textarea class="form-control" name="text" cols="50" rows="10" id="text" required="true" placeholder="Enter text here...">{{ old('text', optional($buyerNotification)->text) }}</textarea>
        {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
    <label for="score" class="col-md-2 control-label">Score</label>
    <div class="col-md-10">
        <input class="form-control" name="score" type="text" id="score" value="{{ old('score', optional($buyerNotification)->score) }}" minlength="1" required="true" placeholder="Enter score here...">
        {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" id="type" name="type" required="true">
        	    <option value="" style="display: none;" {{ old('type', optional($buyerNotification)->type ?: '') == '' ? 'selected' : '' }} disabled selected>Enter type here...</option>
        	@foreach ($getNotificationTypes as $key => $getNotificationType)
			    <option value="{{ $key }}" {{ old('type', optional($buyerNotification)->type) == $key ? 'selected' : '' }}>
			    	{{ $getNotificationType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('buyer') ? 'has-error' : '' }}">
    <label for="buyer" class="col-md-2 control-label">Buyer</label>
    <div class="col-md-10">
        <select class="form-control" id="buyer" name="buyer" required="true">
        	    <option value="" style="display: none;" {{ old('buyer', optional($buyerNotification)->buyer ?: '') == '' ? 'selected' : '' }} disabled selected>Enter buyer here...</option>
        	@foreach ($getBuyers as $key => $getBuyer)
			    <option value="{{ $key }}" {{ old('buyer', optional($buyerNotification)->buyer) == $key ? 'selected' : '' }}>
			    	{{ $getBuyer }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('buyer', '<p class="help-block">:message</p>') !!}
    </div>
</div>

