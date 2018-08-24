function clone(objectToClone) {
	return jQuery.extend(true, {}, objectToClone);
}

//This function work only with same parameter count functions
function mergeFunctions() {
	var notNullFuncs = new Array();

	for (var _len = arguments.length, funcs = Array(_len), _key = 0; _key < _len; _key++) {
		funcs[_key] = arguments[_key];
	}

	funcs.forEach(function (func) {
		if (func) notNullFuncs.push(func);
	});
	return function () {
		for (var _len2 = arguments.length, args = Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
			args[_key2] = arguments[_key2];
		}

		for (var i = 0; i < notNullFuncs.length; ++i) {
			notNullFuncs[i].apply(this, args);
		}
	};
}

function axiosPostWithLog(settings) {
	axiosPost(extendSettingsWithPostLog(settings));
}

function axiosPost(settings) {
	var currentSettings = clone(settings);
	axios.post(currentSettings.url, currentSettings.data).then(settings.success).catch(settings.error);
}

function ajaxPostWithLog(settings) {
	ajaxPost(extendSettingsWithPostLog(settings));
}

function ajaxPost(settings) {
	$.post(clone(settings));
}

function ajaxGetWithLog(settings) {
	ajaxGet(extendSettingsWithLog(settings));
}

function ajaxGet(settings) {
	$.get(clone(settings));
}

function extendSettingsWithPostLog(settings) {
	var currentSettings = extendSettingsWithLog(settings);
	currentSettings.error = mergeFunctions(function () {
		if (currentSettings.data) {
			console.log('Post data:');
			console.log(currentSettings.data);
		}
	}, currentSettings.error);
	return currentSettings;
}

function extendSettingsWithLog(settings) {
	var currentSettings = clone(settings);
	currentSettings.success = mergeFunctions(successLog, currentSettings.success);
	currentSettings.error = mergeFunctions(errorLog, currentSettings.error);
	return currentSettings;
}

function post(url, data) {
	$.redirect(url, data);
}

function get(url) {
	$.redirect(url, null, 'GET');
}

//Function for $.ajax error event.
function errorLog(jqXhr, json, errorThrown) {
	console.log('Request send failed!');
	console.log('Error: ' + JSON.stringify(jqXhr));
}

//Function for $.ajax success event.
function successLog(e) {
	console.log('Request sended!');
}

function getUrlParams(url) {
	return JSON.parse('{"' + decodeURIComponent(url).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"') + '"}');
}