<?php
	if (empty($sendButtonTitle))
	    $sendButtonTitle = __('Send');
?>
<button {{ getAttribute('id') }} type="submit" class="btn btn-primary">
    {{ $sendButtonTitle }}
</button>