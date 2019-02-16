@extends('layouts.crm')

@section('crmContent')
    @component('layouts.components.form', [
        'formInfos' => $formInfos,
        'route' => url($tableName),
        'sendButtonTitle' => $sendButtonTitle
    ])
    @endcomponent
@overwrite