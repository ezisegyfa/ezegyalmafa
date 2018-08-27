<script type="text/javascript">
	function getFormData(form) {
		var formData = form.serializeArray()
		return convertFormDataToAssociativeArray(formData)
	}

	function convertFormDataToAssociativeArray(formData) {
		var convertedFormData = []
		for (var i = 0; i < formData.length; ++i)
			convertedFormData[formData[i].name] = formData[i].value
		return convertedFormData
	}
</script>