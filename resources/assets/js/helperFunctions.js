function clone(objectToClone){
	return jQuery.extend(true, {}, objectToClone);
}

//This function work only with same parameter count functions
function mergeFunctions(...funcs){
	var notNullFuncs = new Array()
	funcs.forEach(function(func){
		if(func)
			notNullFuncs.push(func)
	})
	return function(...args){
		for(var i = 0; i < notNullFuncs.length; ++i)
			notNullFuncs[i].apply(this, args)
	}
}
