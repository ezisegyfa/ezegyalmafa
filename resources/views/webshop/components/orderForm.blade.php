@extends('layouts.webshop')

@section('content')
	@component('layouts.components.form', [
		'formInfos' => $formInfos,
        'route' => url(''),
        'sendButtonTitle' => 'BUY'
	])
	@endcomponent
@endsection