<?php
	if (!empty($value) || (!empty($name) && !empty(old($name))))
		$checkedAttribute = 'checked';
	else 
		$checkedAttribute = '';
?>
<input type="checkbox" {{ getAttribute('name') }} {{ $checkedAttribute }}>