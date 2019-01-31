@extends('layouts.crm')

@section('crmContent')
    @component('layouts.components.form', [
        'formInfos' => $formInfos,
        'route' => url($tableName)
    ])
    @endcomponent
@overwrite