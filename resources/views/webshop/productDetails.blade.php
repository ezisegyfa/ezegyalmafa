@extends('layouts.webshop')

@section('content')
    <div class="container">
        <div class="row">
            <!-- Image -->
            <div class="col-12 col-lg-6">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <img class="img-fluid" src="{{ $productType->getMainImageLink() }}" />
                    </div>
                </div>
            </div>

            <!-- Add to cart -->
            <div class="col-12 col-lg-6 add_to_cart_block">
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        @if ($productType->price)
                            <span class="price-new">$productType->price</span>
                        @endif
                        @foreach ($productType->getSpecialities() as $speciality)
                            {{ $speciality }}
                            <br>
                        @endforeach
                        <br>
                        @foreach ($productType->getProperties() as $property)
                            {{ $property }}
                            <br>
                        @endforeach
                        <br>
                        <form method="get" action="cart.html">
                            <div class="form-group">
                                <label>Quantity </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus" data-field="">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control"  id="quantity" name="quantity" min="1" max="100" value="1">
                                    <div class="input-group-append">
                                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus" data-field="">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('orders/createWithBuyer/' . $productType->id) }}" class="btn btn-success btn-lg btn-block text-uppercase">
                                <i class="fa fa-shopping-cart"></i> Buy
                            </a>
                        </form>
                        <div class="product_rassurance">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-truck fa-2x"></i><br/>Fast delivery</li>
                                <li class="list-inline-item"><i class="fa fa-credit-card fa-2x"></i><br/>Secure payment</li>
                                <li class="list-inline-item"><i class="fa fa-phone fa-2x"></i><br/>+33 1 22 54 65 60</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

@section('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/webshop/productDetails.js') }}"></script>
@endsection