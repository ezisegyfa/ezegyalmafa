
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($user)->first_name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter first name here...">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($user)->last_name) }}" minlength="1" maxlength="255" required="true" placeholder="Enter last name here...">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" maxlength="255" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
    <label for="phone_number" class="col-md-2 control-label">Phone Number</label>
    <div class="col-md-10">
        <input class="form-control" name="phone_number" type="text" id="phone_number" value="{{ old('phone_number', optional($user)->phone_number) }}" min="1" max="15" required="true" placeholder="Enter phone number here...">
        {!! $errors->first('phone_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('adress') ? 'has-error' : '' }}">
    <label for="adress" class="col-md-2 control-label">Adress</label>
    <div class="col-md-10">
        <textarea class="form-control" name="adress" cols="50" rows="10" id="adress" required="true" placeholder="Enter adress here...">{{ old('adress', optional($user)->adress) }}</textarea>
        {!! $errors->first('adress', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('cnp') ? 'has-error' : '' }}">
    <label for="cnp" class="col-md-2 control-label">Cnp</label>
    <div class="col-md-10">
        <input class="form-control" name="cnp" type="text" id="cnp" value="{{ old('cnp', optional($user)->cnp) }}" minlength="1" maxlength="10" required="true" placeholder="Enter cnp here...">
        {!! $errors->first('cnp', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('seria_nr') ? 'has-error' : '' }}">
    <label for="seria_nr" class="col-md-2 control-label">Seria Nr</label>
    <div class="col-md-10">
        <input class="form-control" name="seria_nr" type="text" id="seria_nr" value="{{ old('seria_nr', optional($user)->seria_nr) }}" minlength="1" maxlength="10" required="true" placeholder="Enter seria nr here...">
        {!! $errors->first('seria_nr', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    <label for="city" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <select class="form-control" id="city" name="city" required="true">
        	    <option value="" style="display: none;" {{ old('city', optional($user)->city ?: '') == '' ? 'selected' : '' }} disabled selected>Enter city here...</option>
        	@foreach ($getCities as $key => $getCity)
			    <option value="{{ $key }}" {{ old('city', optional($user)->city) == $key ? 'selected' : '' }}>
			    	{{ $getCity }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('seria') ? 'has-error' : '' }}">
    <label for="seria" class="col-md-2 control-label">Seria</label>
    <div class="col-md-10">
        <select class="form-control" id="seria" name="seria" required="true">
        	    <option value="" style="display: none;" {{ old('seria', optional($user)->seria ?: '') == '' ? 'selected' : '' }} disabled selected>Enter seria here...</option>
        	@foreach ($getIdentityCardSeries as $key => $getIdentityCardSeries)
			    <option value="{{ $key }}" {{ old('seria', optional($user)->seria) == $key ? 'selected' : '' }}>
			    	{{ $getIdentityCardSeries }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('seria', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('identity_card_type') ? 'has-error' : '' }}">
    <label for="identity_card_type" class="col-md-2 control-label">Identity Card Type</label>
    <div class="col-md-10">
        <select class="form-control" id="identity_card_type" name="identity_card_type" required="true">
        	    <option value="" style="display: none;" {{ old('identity_card_type', optional($user)->identity_card_type ?: '') == '' ? 'selected' : '' }} disabled selected>Enter identity card type here...</option>
        	@foreach ($getIdentityCardTypes as $key => $getIdentityCardType)
			    <option value="{{ $key }}" {{ old('identity_card_type', optional($user)->identity_card_type) == $key ? 'selected' : '' }}>
			    	{{ $getIdentityCardType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('identity_card_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

