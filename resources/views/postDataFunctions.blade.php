<script type="text/javascript">
	function getFormData(form) {
		var formData = form.serializeArray()
		return mergeObjectElements(convertFormDataToAssociativeArray(formData))
	}

	function mergeObjectElements(formData) {
		var mergedFormData = []
		for (var key in formData) {
			var objectSeparatorPosition = key.indexOf('.')
			if (objectSeparatorPosition > 0) {
				objectToMergeName = key.substring(0, objectSeparatorPosition)
				if (!(objectToMergeName in mergedFormData))
					mergedFormData[objectToMergeName] = {}
				var propertyName = key.substring(objectSeparatorPosition + 1)
				mergedFormData[objectToMergeName][propertyName] = formData[key]
			}
			else
				mergedFormData[key] = formData[key]
		}
		return mergedFormData
	}

	function convertFormDataToAssociativeArray(formData) {
		var convertedFormData = []
		for (var i = 0; i < formData.length; ++i)
			convertedFormData[formData[i].name] = formData[i].value
		return convertedFormData
	}
</script>