
<div class="form-group {{ $errors->has('text') ? 'has-error' : '' }}">
    <label for="text" class="col-md-2 control-label">Text</label>
    <div class="col-md-10">
        <textarea class="form-control" name="text" cols="50" rows="10" id="text" required="true" placeholder="Enter text here...">{{ old('text', optional($userNotification)->text) }}</textarea>
        {!! $errors->first('text', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
    <label for="score" class="col-md-2 control-label">Score</label>
    <div class="col-md-10">
        <input class="form-control" name="score" type="text" id="score" value="{{ old('score', optional($userNotification)->score) }}" minlength="1" required="true" placeholder="Enter score here...">
        {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <select class="form-control" id="type" name="type" required="true">
        	    <option value="" style="display: none;" {{ old('type', optional($userNotification)->type ?: '') == '' ? 'selected' : '' }} disabled selected>Enter type here...</option>
        	@foreach ($getNotificationTypes as $key => $getNotificationType)
			    <option value="{{ $key }}" {{ old('type', optional($userNotification)->type) == $key ? 'selected' : '' }}>
			    	{{ $getNotificationType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
    <label for="user" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user" name="user" required="true">
        	    <option value="" style="display: none;" {{ old('user', optional($userNotification)->user ?: '') == '' ? 'selected' : '' }} disabled selected>Enter user here...</option>
        	@foreach ($getUsers as $key => $getUser)
			    <option value="{{ $key }}" {{ old('user', optional($userNotification)->user) == $key ? 'selected' : '' }}>
			    	{{ $getUser }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
    </div>
</div>

