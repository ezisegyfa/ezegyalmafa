@extends('layouts.app')
@section('styles')
    <link href="{{ asset('css/webshop/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/webshop/layout.css') }}" rel="stylesheet">
    @yield('webshopStyles')
@endsection
@section('header')
    @include('webshop.components.header')
@endsection
@section('footer')
    @include('webshop.components.footer')

    <!-- Modal image -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid" src="https://dummyimage.com/1200x1200/55595c/fff" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('js/webshop/layout.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/webshop/header.js') }}"></script>
    @yield('webshopScripts')
@endsection