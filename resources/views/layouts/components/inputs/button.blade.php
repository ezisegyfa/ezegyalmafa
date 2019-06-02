<?php
	if (empty($sendButtonTitle))
	    $sendButtonTitle = 'Send';
?>
<button {{ getAttribute('id') }} type="submit" class="btn btn-primary">
    {{ $sendButtonTitle }}
</button>