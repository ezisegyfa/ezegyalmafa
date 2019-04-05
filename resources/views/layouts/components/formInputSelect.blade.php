@extends('layouts.components.formInputComponent')
@section('inputContent')
	@component('layouts.components.select', [
		'name' => $name ?? null,
		'value' => $value ?? 0,
		'options' => $options ?? [],
		'validationRules' => $validationRules ?? []
	])
	@endcomponent
@overwrite