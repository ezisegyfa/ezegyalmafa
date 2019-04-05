@extends('layouts.header')
@section('rightContent')
    <a id="header_search_button" class="btn btn-block center-position" data-toggle="collapse" href="#search_form_collapse" role="button" aria-expanded="false" aria-controls="search_form_collapse">
        <img id="header_search_button_image" src="{{ url('images/webshop/icons/search.png') }}"></img>
    </a>
@endsection

@section('afterItems')
	<div class="collapse" id="search_form_collapse">
		<nav id="search_form_collapse_mobile_navbar" class="nav navbar-nav ml-auto navbar-right navbar-dark bg-dark">
			asdf
		</nav>
	</div>
@endsection