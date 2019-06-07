function checkVariableIsHtmlAttribute(variableToCheck, defaultValue = null) {
	if (typeof variableToCheck === 'object') {
		console.log('Value can\'t convert to html attribute.')
		console.log(variableToCheck)
		console.log(new Error().stack)
		return defaultValue
	}
	else
		return checkVariableExists(variableToCheck, defaultValue)
}

function checkVariableExists(variableToCheck, defaultValue = null) {
	if (typeof variableToCheck === 'undefined' || variableToCheck === null)
		return defaultValue
	else
		return variableToCheck
}

function clone(objectToClone) {
	return jQuery.extend(true, {}, objectToClone);
}

//This function work only with same parameter count functions
function mergeFunctions(...funcs) {
	var notNullFuncs = new Array()
	funcs.forEach(function(func) {
		if(func)
			notNullFuncs.push(func)
	})
	return function(...args) {
		for(var i = 0; i < notNullFuncs.length; ++i)
			notNullFuncs[i].apply(this, args)
	}
}

function getCsrfToken() {
	return $('meta[name=csrf-token]').attr('content')
}

function upperFirstLetter(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
}

function getRequestParameterValue(name){
	var name = (new RegExp('[?&]'+encodeURIComponent(name)+'=([^&]*)')).exec(location.search)
	if (name)
    	return decodeURIComponent(name[1])
    else
    	return null
}