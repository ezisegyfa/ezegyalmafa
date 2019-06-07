@extends('layouts.webshop')

@section('webshopStyles')
  <link href="{{ asset('css/webshop/productDetails.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <!-- Image -->
            <div class="col-12 col-lg-6">
                <div class="card mb-3">
                    <div id="product_image_section" class="card-body">
                        <img class="img-fluid" src="{{ $productType->getMainImageLink() }}" />
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div id="product_details_section" class="card mb-3">
                    <div class="card-header">
                        <h1>{{ $productType->name }}</h1>
                    </div>
                    <div class="card-body">
                        @if ($productType->price)
                            <span class="price-new">$productType->price</span>
                        @endif
                        @if (count($productType->getSpecialityNames()) > 0)
                            <h2>{{ __('ProductDetails.Specialities') }}</h2>
                        @endif
                        @foreach ($productType->getSpecialityNames() as $speciality)
                            {{ $speciality }}
                            <br>
                        @endforeach
                        <br>
                        @if (count($productType->getPropertyNames()) > 0)
                            <h2>{{ __('ProductDetails.Properties') }}</h2>
                        @endif
                        @foreach ($productType->getPropertyNames() as $property)
                            {{ $property }}
                            <br>
                        @endforeach
                        @guest
                            <div id="guest_buy_button_container">
                                <a id="guest_buy_button" href="{{ url('user/login') }}" class="btn btn-success">
                                    @lang('productDetails.BUY')
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        @auth
            <form method="POST" action="{{ url('webshop/order_infos/store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div id="user_infos_section" class="card mb-3">
                            <div class="card-header">
                                <h1 class="text-center">@lang('productDetails.User infos')</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="region_id" class="col-sm-4 col-form-label text-md-right">{{ __('view.region') }}</label>

                                    <div class="col-md-6">
                                        <select id="region_id" class="form-control{{ $errors->has('region_id') ? ' is-invalid' : '' }}" name="region_id" value="{{ old('region_id') }}" required autofocus>
                                            <?php
                                                $user = \Auth::user();
                                                if (isset($user->settlement) && !empty($user->settlement))
                                                    $selectedRegionId = $user->settlement->region->id;
                                                else
                                                    $selectedRegionId = 0;
                                            ?>
                                            <option value="" disabled selected>@lang('Select your option')</option>
                                            @foreach ($regionOptions as $regionOption)
                                                <option value="{{ $regionOption->value }}" {{ $regionOption->value == $selectedRegionId ? 'selected' : '' }}>{{ $regionOption->label }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('region_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('region_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="location_id" class="col-sm-4 col-form-label text-md-right">{{ __('view.location') }}</label>

                                    <div class="col-md-6">
                                        <select id="location_id" class="form-control{{ $errors->has('location_id') ? ' is-invalid' : '' }}" name="location_id" value="{{ old('location_id') }}" required autofocus>
                                            <?php
                                                $user = \Auth::user();
                                                if (isset($user->settlement) && !empty($user->settlement))
                                                    $selectedLocationId = $user->settlement->id;
                                                else
                                                    $selectedLocationId = 0;
                                            ?>
                                            <option value="" disabled selected>@lang('Select your option')</option>
                                            @foreach ($locationOptions as $locationOption)
                                                <option value="{{ $locationOption->value }}" {{ $locationOption->value == $selectedLocationId ? 'selected' : '' }}>{{ $locationOption->label }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('location_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('location_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('view.address') }}</label>

                                    <div class="col-md-6">
                                        <?php
                                            $user = \Auth::user();
                                            if (isset($user->address) && !empty($user->address))
                                                $address = $user->address;
                                            else
                                                $address = old('address');
                                        ?>
                                        <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $address }}" required autofocus>

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="buy_product_section" class="card mb-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="mt-4">@lang('productDetails.Quantity')</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control" id="quantity" name="quantity" min="1" max="100" value="1">
                                        <div class="input-group-append">
                                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <input type="number" name="product_type_id" value="{{ $productType->id }}" hidden>
                                    <input type="number" name="sell_price" value="{{ $productType->price }}" hidden>
                                </div>
                                <div id="buy_button_container">
                                    <button id="buy_button" type="submit" class="btn btn-success">
                                        @lang('productDetails.BUY')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endauth

        @if ($productType->description)
            <div class="row">
                <!-- Description -->
                <div class="col-12">
                    <div class="card border-light mb-3">
                        <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Description</div>
                        <div class="card-body">
                            <p class="card-text">
                                {{ $productType->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('webshopScripts')
    <script src="{{ asset('js/webshop/productDetails.js') }}"></script>
@endsection