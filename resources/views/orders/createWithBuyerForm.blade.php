@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Create New Order</h4>
            </span>

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form accept-charset="UTF-8" id="create_order_with_buyer_form" name="create_order_with_buyer_form" class="form-horizontal">
                {{ csrf_field() }}
                
                @component('layouts.components.formInputField', [
                    'title' => '[% field_title %]',
                    'cssClass' => '',
                    'name' => 'quantity',
                    'type' => 'number',
                    'value' => '{{ old('quantity', optional($order)->quantity) }}',
                    'minLength' => '',
                    'maxLength' => '',
                    'minValue' => ' min="-2147483648"',
                    'maxValue' => ' max="2147483647"',
                    'required' => ' required="true"',
                    'placeholder' => ' placeholder="Enter quantity here..."',
                    'step' => ''
                ])
                @endcomponent

                <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                    <label for="quantity" class="col-md-2 control-label">Quantity</label>
                    <div class="col-md-10">
                        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ old('quantity') }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter quantity here...">
                        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('product_type') ? 'has-error' : '' }}">
                    <label for="product_type" class="col-md-2 control-label">Product Type</label>
                    <div class="col-md-10">
                        <select class="form-control" id="product_type" name="product_type" required="true">
                                <option value="" style="display: none;" {{ old('product_type') == '' ? 'selected' : '' }} disabled selected>Enter product type here...</option>
                            @foreach ($getProductTypes as $key => $getProductType)
                                <option value="{{ $key }}" {{ old('product_type') == $key ? 'selected' : '' }}>
                                    {{ $getProductType }}
                                </option>
                            @endforeach
                        </select>
                        
                        {!! $errors->first('product_type', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.first_name') ? 'has-error' : '' }}">
                    <label for="buyer.first_name" class="col-md-2 control-label">First Name</label>
                    <div class="col-md-10">
                        <input class="form-control" name="buyer.first_name" type="text" id="buyer.first_name" value="{{ old('buyer.first_name') }}" minlength="1" maxlength="255" required="true" placeholder="Enter first name here...">
                        {!! $errors->first('buyer.first_name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.last_name') ? 'has-error' : '' }}">
                    <label for="buyer.last_name" class="col-md-2 control-label">Last Name</label>
                    <div class="col-md-10">
                        <input class="form-control" name="buyer.last_name" type="text" id="buyer.last_name" value="{{ old('buyer.last_name') }}" minlength="1" maxlength="255" required="true" placeholder="Enter last name here...">
                        {!! $errors->first('buyer.last_name', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.email') ? 'has-error' : '' }}">
                    <label for="buyer.email" class="col-md-2 control-label">Email</label>
                    <div class="col-md-10">
                        <input class="form-control" name="buyer.email" type="text" id="buyer.email" value="{{ old('buyer.email') }}" maxlength="255" placeholder="Enter email here...">
                        {!! $errors->first('buyer.email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.phone_number') ? 'has-error' : '' }}">
                    <label for="buyer.phone_number" class="col-md-2 control-label">Phone Number</label>
                    <div class="col-md-10">
                        <input class="form-control" name="buyer.phone_number" type="text" id="buyer.phone_number" value="{{ old('buyer.phone_number') }}" min="1" max="15" required="true" placeholder="Enter phone number here...">
                        {!! $errors->first('buyer.phone_number', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.adress') ? 'has-error' : '' }}">
                    <label for="buyer.adress" class="col-md-2 control-label">Adress</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="buyer.adress" cols="50" rows="10" id="buyer.adress" required="true" placeholder="Enter adress here...">{{ old('buyer.adress') }}</textarea>
                        {!! $errors->first('buyer.adress', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.cnp') ? 'has-error' : '' }}">
                    <label for="buyer.cnp" class="col-md-2 control-label">Cnp</label>
                    <div class="col-md-10">
                        <input class="form-control" name="buyer.cnp" type="text" id="buyer.cnp" value="{{ old('buyer.cnp') }}" minlength="1" maxlength="10" required="true" placeholder="Enter cnp here...">
                        {!! $errors->first('buyer.cnp', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.seria_nr') ? 'has-error' : '' }}">
                    <label for="buyer.seria_nr" class="col-md-2 control-label">Seria Nr</label>
                    <div class="col-md-10">
                        <input class="form-control" name="buyer.seria_nr" type="text" id="buyer.seria_nr" value="{{ old('buyer.seria_nr') }}" minlength="1" maxlength="10" required="true" placeholder="Enter seria nr here...">
                        {!! $errors->first('buyer.seria_nr', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.city') ? 'has-error' : '' }}">
                    <label for="buyer.city" class="col-md-2 control-label">City</label>
                    <div class="col-md-10">
                        <select class="form-control" id="buyer.city" name="buyer.city" required="true">
                            <option value="" style="display: none;" {{ old('buyer.city') == '' ? 'selected' : '' }} disabled selected>Enter city here...</option>
                            @foreach ($getCities as $key => $getCity)
                                <option value="{{ $key }}" {{ old('buyer.city') == $key ? 'selected' : '' }}>
                                    {{ $getCity }}
                                </option>
                            @endforeach
                        </select>
                        
                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.seria') ? 'has-error' : '' }}">
                    <label for="seria" class="col-md-2 control-label">Seria</label>
                    <div class="col-md-10">
                        <select class="form-control" id="buyer.seria" name="buyer.seria" required="true">
                                <option value="" style="display: none;" {{ old('buyer.seria') == '' ? 'selected' : '' }} disabled selected>Enter seria here...</option>
                            @foreach ($getIdentityCardSeries as $key => $getIdentityCardSeries)
                                <option value="{{ $key }}" {{ old('buyer.seria') == $key ? 'selected' : '' }}>
                                    {{ $getIdentityCardSeries }}
                                </option>
                            @endforeach
                        </select>
                        
                        {!! $errors->first('buyer.seria', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('buyer.identity_card_type') ? 'has-error' : '' }}">
                    <label for="buyer.identity_card_type" class="col-md-2 control-label">Identity Card Type</label>
                    <div class="col-md-10">
                        <select class="form-control" id="buyer.identity_card_type" name="buyer.identity_card_type" required="true">
                                <option value="" style="display: none;" {{ old('buyer.identity_card_type') == '' ? 'selected' : '' }} disabled selected>Enter identity card type here...</option>
                            @foreach ($getIdentityCardTypes as $key => $getIdentityCardType)
                                <option value="{{ $key }}" {{ old('buyer.identity_card_type') == $key ? 'selected' : '' }}>
                                    {{ $getIdentityCardType }}
                                </option>
                            @endforeach
                        </select>
                        
                        {!! $errors->first('buyer.identity_card_type', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember_me" id="remember_me" {{ old('remember_me') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection

@include('postDataFunctions')
@section('scripts')
<script type="text/javascript" src="{{ URL::asset('js/helperMethods.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var form = $('#create_order_with_buyer_form')
        form.on('submit', function(e){
            e.preventDefault()

            var postData = getFormData(form)
            var redirectUrl = '{!! route('orders.order.storeWithBuyer') !!}'

            ajaxPostWithLog({
                url : redirectUrl,
                data : postData,
                success : function(e){
                    get('/home')
                },
                error : function(jqXhr, json, errorThrown){
                    postData.errors = jqXhr.errors
                    post(redirectUrl, postData)
                }
            })
        })
    })
</script>
@endsection
