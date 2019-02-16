@extends('layouts.webshop')

@section('styles')
    <link href="{{ asset('css/webshop/productList.css') }}" rel="stylesheet">
@endsection

@section('content')
	<!-- Page Content -->
    <div class="container">
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
        			<div class="row">
        				<div class="price-details col-md-6">
        					<h1>{{ $productType->name }}</h1>
                  @if ($productType->price)
        					  <span class="price-new">${{ $productType->price }}</span>
                  @endif
        				</div>
        			</div>
        		</div>
        	  </article>
	        </div>
      	@endforeach
        {{ $productTypes->links() }}
      </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/webshop/productList.js') }}"></script>
@endsection