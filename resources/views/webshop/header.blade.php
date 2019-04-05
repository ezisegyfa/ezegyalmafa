@extends('layouts.header')
@section('rightContent')
    <a id="header_search_button" class="btn btn-block center-position" data-toggle="collapse" href="#search_form_collapse" role="button" aria-expanded="false" aria-controls="search_form_collapse">
        <img id="header_search_button_image" src="{{ url('images/webshop/icons/search.png') }}"></img>
    </a>
@endsection