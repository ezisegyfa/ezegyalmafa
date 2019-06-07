<?php
    if (isset($id) && $id)
        $idAttribute = 'id=' . $id;
    else
        $idAttribute = '';
?>
<form {{ $idAttribute }} method="POST" action="{{ $route }}" class="w-100">
    @csrf

    @foreach ($formInfos as $formInfo)
        @component('layouts.components.form.labeledFormInput', [
            'formInfo' => $formInfo
        ])
        @endcomponent
    @endforeach

    <div class="form-group row">
        @component('layouts.components.inputs.button', [
            'sendButtonTitle' => $sendButtonTitle ?? __('Send')
        ])
        @endcomponent
    </div>
</form>