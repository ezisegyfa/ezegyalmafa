@extends('layouts.header')
@section('rightContent')
    <form id="search_form" method="GET" action="{{ url('/') . '/' }}" class="w-100">
	    @csrf

	    @foreach (getHeaderSearchFormInfos() as $formInfo)
	    	<input id="{{ $formInfo->id }}" name="{{ $formInfo->id }}" value="{{ old($formInfo->id) }}" hidden>
	    @endforeach

	    <div id="header_search_container">
	    	<a id="header_search_advanced_button" class="btn center-position header-button" data-toggle="collapse" href="#search_form_collapse" role="button" aria-expanded="false" aria-controls="search_form_collapse">
		        <img id="header_search_advanced_button_image" src="{{ url('images/webshop/icons/filter.png') }}"></img>
		    </a>
		    @component('layouts.components.inputs.textInput', [
				'name' => 'searched_text'
			])
			@endcomponent
			<button id="header_search_submit_button" type="submit" class="btn center-position header-button">
		        <img id="header_search_button_image" src="{{ url('images/webshop/icons/search.png') }}"></img>
		    </button>
		</div>
	</form>
	
    @include('layouts.components.loginLinks', [
        'baseUrl' => 'user'
    ])
@endsection

@section('afterItems')
	<div class="collapse" id="search_form_collapse">
		<nav id="search_form_collapse_navbar" class="nav navbar-nav ml-auto navbar-right navbar-dark bg-dark">
			<div class="d-flex justify-content-end">
			    @foreach (getHeaderSearchFormInfos() as $formInfo)
		    		<?php
		    			$formInfo->id .= '_collapse_input';
		    		?>
			        @component('layouts.components.form.table.labeledFormInput', [
			            'formInfo' => $formInfo
			        ])
			        @endcomponent
			    @endforeach
			</div>
		</nav>
	</div>
@endsection