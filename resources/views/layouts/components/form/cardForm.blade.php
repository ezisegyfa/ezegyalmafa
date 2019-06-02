<?php
	if (isset($id) && !empty($id))
		$idAttribute = 'id=' . $id;
	else
		$idAttribute = '';
?>
<div {{ $idAttribute }} class="card card-form">
	@if (isset($title) && !empty($title))
    	<div class="card-header">@lang($title)</div>
    @endif

    <div class="card-body">
        @component('layouts.components.form.form', [
        	'id' => $formId ?? '',
            'formInfos' => $formInfos,
            'sendButtonTitle' => $sendButtonTitle ?? __('Send'),
            'route' => $route
        ])
        @endcomponent
    </div>
</div>