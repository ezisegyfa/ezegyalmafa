@extends('layouts.crm')

@section('crmContent')
    @component('layouts.components.form.cardForm', [
        'formInfos' => $formInfos,
        'route' => $route,
        'sendButtonTitle' => $sendButtonTitle
    ])
    @endcomponent
@overwrite