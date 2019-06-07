@extends('layouts.webshop')

@section('webshopStyles')
  <link href="{{ asset('css/webshop/productList.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="container">
    @include('layouts.components.successMessage')
    <div class="row text-center text-lg-left">
      @foreach ($productTypes as $productType)
        <div class="col-lg-3 col-md-4 col-xs-6">
          <article class="col-item">
          <div class="photo">
            <div class="options-cart">
              <a href="{{ url('products/' . $productType->id) }}">
                <button class="btn btn-default" title="Add to cart">
                  <span class="fa fa-shopping-cart"></span>
                </button>
              </a>
            </div>
            <a href="{{ url('products/' . $productType->id) }}"> <img src="{{ $productType->getMainImageLink() }}" class="img-responsive" alt="Product Image" /> </a>
          </div>
          <div class="info">
            <h5>{{ $productType->name }}</h5>
            @if ($productType->price)
              <div class="price-details">
                <span class="price-new">${{ $productType->price }}</span>
              </div>
            @endif
          </div>
          </article>
        </div>
      @endforeach
    </div>
    <div id="product_list_pagination_row" class="row">
      <?php
        $searchData = Illuminate\Support\Facades\Input::get();
        unset($searchData['_token']);
      ?>
      {{ $productTypes->appends($searchData)->links() }}
    </div>
  </div>
@endsection

@section('webshopScripts')
    <script src="{{ asset('js/webshop/productList.js') }}"></script>
@endsection