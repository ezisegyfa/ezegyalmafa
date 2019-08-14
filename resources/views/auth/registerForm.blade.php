<?php
	if (isset($id) && !empty($id))
		$idAttribute = 'id=' . $id;
	else
		$idAttribute = '';
?>
<div {{ $idAttribute }} class="card card-form">
	@if (isset($title) && !empty($title))
    	<div class="card-header">{{ $title }}</div>
    @endif

    <div class="card-body">
        <form {{ $idAttribute }} method="POST" action="{{ $route }}" class="w-100">
            @csrf

            @foreach ($formInfos as $formInfo)
                @component('layouts.components.form.labeledFormInput', [
                    'formInfo' => $formInfo
                ])
                @endcomponent
            @endforeach

            <div class="form-group row">
                <input type="checkbox" name="terms" class="ml-5 mr-2" required><span>@lang('register.I accept')&nbsp;</span><a href="{{ url('termsAndConditions') }}">@lang('register.Terms and conditions')</a>
            </div>

            <div class="form-group row">
                @component('layouts.components.inputs.button', [
                    'sendButtonTitle' => $sendButtonTitle ?? __('Send')
                ])
                @endcomponent
            </div>
        </form>
    </div>
</div>