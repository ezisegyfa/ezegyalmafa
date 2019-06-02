<?php
    if (!isset($style) || !$style)
        $style = 'card';
?>
@switch ($style)
	@case ('card')
		@component('layouts.components.form.card.button', [
			'sendButtonTitle' => $sendButtonTitle ?? 'Send'
		])
		@endcomponent
	@break
	@case ('linear')
		@component('layouts.components.inputs.button', [
			'sendButtonTitle' => $sendButtonTitle ?? 'Send'
		])
		@endcomponent
	@break
@endswitch