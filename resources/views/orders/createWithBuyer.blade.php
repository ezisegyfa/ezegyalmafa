<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon" />
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row mt-3 mb-3">
                <div class="col-2">
                </div>
                <div class="col-8">
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

            <form method="POST" action="{{ route('orders.order.storeWithBuyer') }}" accept-charset="UTF-8" id="create_order_with_buyer_form" name="create_order_with_buyer_form" class="form-horizontal">
                {{ csrf_field() }}

                @component('layouts.components.formInputTextRow', [
                    'title' => __('view.first_name'),
                    'cssClass' => '',
                    'name' => 'buyer[first_name]',
                    'type' => 'text',
                    'value' => $first_name ??  old('first_name', isset($buyer) ? $buyer->first_name : '') ,
                    'maxLength' => ' maxlength="255"',
                    'step' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow', [
                    'title' => __('view.last_name'),
                    'cssClass' => '',
                    'name' => 'buyer[last_name]',
                    'type' => 'text',
                    'value' => $last_name ??  old('last_name', isset($buyer) ? $buyer->last_name : '') ,
                    'maxLength' => ' maxlength="255"',
                    'step' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow', [
                    'title' => __('view.email'),
                    'cssClass' => '',
                    'name' => 'buyer[email]',
                    'type' => 'text',
                    'value' => $email ??  old('email', isset($buyer) ? $buyer->email : '') ,
                    'minLength' => '',
                    'maxLength' => ' maxlength="255"',
                    'minValue' => '',
                    'maxValue' => '',
                    'step' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow', [
                    'title' => __('view.phone_number'),
                    'cssClass' => '',
                    'name' => 'buyer[phone_number]',
                    'type' => 'text',
                    'value' => $phone_number ??  old('phone_number', isset($buyer) ? $buyer->phone_number : '') ,
                    'minLength' => '',
                    'maxLength' => '',
                    'minValue' => ' min="0"',
                    'maxValue' => ' max="10"',
                    'step' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputTextAreaField', [
                    'title' => __('view.adress'),
                    'cssClass' => '',
                    'name' => 'buyer[adress]',
                    'value' => $adress ??  old('adress', isset($buyer) ? $buyer->adress : '') ,
                    'minLength' => '',
                    'maxLength' => '',
                    'minValue' => '',
                    'maxValue' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow', [
                    'title' => __('view.cnp'),
                    'cssClass' => '',
                    'name' => 'buyer[cnp]',
                    'type' => 'text',
                    'value' => $cnp ??  old('cnp', isset($buyer) ? $buyer->cnp : '') ,
                    'minLength' => '',
                    'maxLength' => ' maxlength="13"',
                    'minValue' => '',
                    'maxValue' => '',
                    'step' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputTextRow', [
                    'title' => __('view.identity_seria_nr'),
                    'cssClass' => '',
                    'name' => 'buyer[identity_seria_nr]',
                    'type' => 'text',
                    'value' => $identity_seria_nr ??  old('identity_seria_nr', isset($buyer) ? $buyer->identity_seria_nr : '') ,
                    'minLength' => '',
                    'maxLength' => ' maxlength="6"',
                    'minValue' => '',
                    'maxValue' => '',
                    'step' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputSelectMenuField', [
                    'title' => __('view.settlement'),
                    'cssClass' => '',
                    'name' => 'buyer[settlement]',
                    'value' => $settlement ??  old('settlement', isset($buyer) ? $buyer->settlement : '') ,
                    'multiple' => '',
                    'fieldItems' => $getSettlements
                ])
                @endcomponent

                @component('layouts.components.formInputSelectMenuField', [
                    'title' => __('view.identity_seria_type'),
                    'cssClass' => '',
                    'name' => 'buyer[identity_seria_type]',
                    'value' => $identity_seria_type ??  old('identity_seria_type', isset($buyer) ? $buyer->identity_seria_type : '') ,
                    'multiple' => '',
                    'fieldItems' => $getIdentityCardSeries
                ])
                @endcomponent

                @component('layouts.components.formInputSelectMenuField', [
                    'title' => __('view.identity_card_type'),
                    'cssClass' => '',
                    'name' => 'buyer[identity_card_type]',
                    'value' => $identity_card_type ??  old('identity_card_type', isset($buyer) ? $buyer->identity_card_type : '') ,
                    'multiple' => '',
                    'fieldItems' => $getIdentityCardTypes
                ])
                @endcomponent

                @component('layouts.components.formInputSelectMenuField', [
                    'title' => __('view.notification_type'),
                    'cssClass' => '',
                    'name' => 'buyer[notification_type]',
                    'value' => $notification_type ??  old('notification_type', isset($buyer) ? $buyer->notification_type : '') ,
                    'multiple' => '',
                    'fieldItems' => $getNotificationTypes
                ])
                @endcomponent


                @component('layouts.components.formInputTextRow', [
                    'title' => __('view.quantity'),
                    'cssClass' => '',
                    'name' => 'order[quantity]',
                    'type' => 'number',
                    'value' => $quantity ??  old('quantity', isset($order) ? $order->quantity : '') ,
                    'minLength' => '',
                    'maxLength' => '',
                    'minValue' => ' min="-2147483648"',
                    'maxValue' => ' max="2147483647"',
                    'step' => ''
                ])
                @endcomponent

                @component('layouts.components.formInputSelectMenuField', [
                    'title' => __('view.product_type'),
                    'cssClass' => '',
                    'name' => 'order[product_type]',
                    'value' => $product_type ??  old('product_type', isset($order) ? $order->product_type : '') ,
                    'multiple' => '',
                    'fieldItems' => $getProductTypes
                ])
                @endcomponent

                @component('layouts.components.formInputSelectMenuField', [
                    'title' => __('view.order_settlement'),
                    'cssClass' => '',
                    'name' => 'order[settlement]',
                    'value' => $settlement ??  old('settlement', isset($order) ? $order->settlement : '') ,
                    'multiple' => '',
                    'fieldItems' => $getSettlements
                ])
                @endcomponent

                @component('layouts.components.formInputTextAreaField', [
                    'title' => __('view.order_address'),
                    'cssClass' => '',
                    'name' => 'order[address]',
                    'value' => $address ??  old('address', isset($order) ? $order->address : '') ,
                    'minLength' => '',
                    'maxLength' => '',
                    'minValue' => '',
                    'maxValue' => ''
                ])
                @endcomponent

                <div class="form-group row {{ $errors->has('text') ? 'has-error' : '' }}">
                    <div class="col-md-6 offset-md-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="accept_data_using" {{ old("accept_data_using") ? 'checked' : '' }} required>
                                Elfogadom a <a href="{{ url('/privateDataProtectionDescription') }}">felhasználási feltételeket</a>
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
    </div>
    <div class="col-2">
    </div>
            </div>
        </div>
    </div>

    @include('cookieConsent::index')
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>