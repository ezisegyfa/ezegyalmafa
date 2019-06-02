function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function checkVariableIsHtmlAttribute(variableToCheck) {
  var defaultValue = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;

  if (_typeof(variableToCheck) === 'object') {
    console.log('Value can\'t convert to html attribute.');
    console.log(variableToCheck);
    console.log(new Error().stack);
    return defaultValue;
  } else return checkVariableExists(variableToCheck, defaultValue);
}

function checkVariableExists(variableToCheck) {
  var defaultValue = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
  if (typeof variableToCheck === 'undefined' || variableToCheck === null) return defaultValue;else return variableToCheck;
}

function clone(objectToClone) {
  return jQuery.extend(true, {}, objectToClone);
} //This function work only with same parameter count functions


function mergeFunctions() {
  var notNullFuncs = new Array();

  for (var _len = arguments.length, funcs = new Array(_len), _key = 0; _key < _len; _key++) {
    funcs[_key] = arguments[_key];
  }

  funcs.forEach(function (func) {
    if (func) notNullFuncs.push(func);
  });
  return function () {
    for (var _len2 = arguments.length, args = new Array(_len2), _key2 = 0; _key2 < _len2; _key2++) {
      args[_key2] = arguments[_key2];
    }

    for (var i = 0; i < notNullFuncs.length; ++i) {
      notNullFuncs[i].apply(this, args);
    }
  };
}

function getCsrfToken() {
  return $('meta[name=csrf-token]').attr('content');
}

function upperFirstLetter(text) {
  return text.charAt(0).toUpperCase() + text.slice(1);
}

function axiosPostWithLog(settings) {
  axiosPost(extendSettingsWithPostLog(settings));
}

function axiosPost(settings) {
  var currentSettings = clone(settings);
  axios.post(currentSettings.url, currentSettings.data).then(settings.success)["catch"](settings.error);
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
} //Function for $.ajax error event.


function errorLog(jqXhr, json, errorThrown) {
  console.log('Request send failed!');
  console.log('Error: ' + JSON.stringify(jqXhr));
} //Function for $.ajax success event.


function successLog(e) {
  console.log('Request sended!');
}

function getUrlParams(url) {
  return JSON.parse('{"' + decodeURIComponent(url).replace(/"/g, '\\"').replace(/&/g, '","').replace(/=/g, '":"') + '"}');
}
