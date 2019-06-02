<?php
	if (Session::has('success_message'))
		$successMessage = session('success_message');
?>
@if(isset($successMessage) && !empty($successMessage))
    <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span>
        {!! $successMessage !!}

        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>
@endif