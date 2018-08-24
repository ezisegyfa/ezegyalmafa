<script type="text/javascript">
	function getCurrentLoginPostData(){
		loginPostData = getCurrentUserPostData()
		loginPostData.remember_me = $('#remember_me').is(':checked')
		return loginPostData
	}

	function getCurrentRegisterPostData(){
		registerPostData = getCurrentUserPostData()
		registerPostData.password_confirmation = $('#password-confirm').val(),
	    registerPostData.name = $('#name').val()
		return registerPostData
	}

	function getCurrentUserPostData(){
		userPostData = getCurrentPostData()
		userPostData.email = $('#email').val()
		userPostData.password = $('#password').val()
		return userPostData
	}

	function getCurrentTipPostData(){
		tipPostData = getCurrentPostData()
		tipPostData.home_result = $('#home_result').val()
		tipPostData.away_result = $('#away_result').val()
		tipPostData.match = $('#match').val()
		return tipPostData
	}

	function getCurrentPostData(){
		return {
			headers : {
	            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
	        },
	        _token : $('input[name=_token]').val()
	    }
	}
</script>