/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/jquery.redirect.js":
/*!************************************************!*\
  !*** ./resources/assets/js/jquery.redirect.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*
jQuery Redirect v1.1.3

Copyright (c) 2013-2018 Miguel Galante
Copyright (c) 2011-2013 Nemanja Avramovic, www.avramovic.info

Licensed under CC BY-SA 4.0 License: http://creativecommons.org/licenses/by-sa/4.0/

This means everyone is allowed to:

Share - copy and redistribute the material in any medium or format
Adapt - remix, transform, and build upon the material for any purpose, even commercially.
Under following conditions:

Attribution - You must give appropriate credit, provide a link to the license, and indicate if changes were made. You may do so in any reasonable manner, but not in any way that suggests the licensor endorses you or your use.
ShareAlike - If you remix, transform, or build upon the material, you must distribute your contributions under the same license as the original.
*/
;

(function ($) {
  'use strict'; //Defaults configuration

  var defaults = {
    url: null,
    values: null,
    method: "POST",
    target: null,
    traditional: false,
    redirectTop: false
  };
  /**
  * jQuery Redirect
  * @param {string} url - Url of the redirection
  * @param {Object} values - (optional) An object with the data to send. If not present will look for values as QueryString in the target url.
  * @param {string} method - (optional) The HTTP verb can be GET or POST (defaults to POST)
  * @param {string} target - (optional) The target of the form. "_blank" will open the url in a new window.
  * @param {boolean} traditional - (optional) This provides the same function as jquery's ajax function. The brackets are omitted on the field name if its an array.  This allows arrays to work with MVC.net among others.
  * @param {boolean} redirectTop - (optional) If its called from a iframe, force to navigate the top window. 
  */

  /**
  * jQuery Redirect
  * @param {string} opts - Options object
  * @param {string} opts.url - Url of the redirection
  * @param {Object} opts.values - (optional) An object with the data to send. If not present will look for values as QueryString in the target url.
  * @param {string} opts.method - (optional) The HTTP verb can be GET or POST (defaults to POST)
  * @param {string} opts.target - (optional) The target of the form. "_blank" will open the url in a new window.
  * @param {boolean} opts.traditional - (optional) This provides the same function as jquery's ajax function. The brackets are omitted on the field name if its an array.  This allows arrays to work with MVC.net among others.
  * @param {boolean} opts.redirectTop - (optional) If its called from a iframe, force to navigate the top window. 
  */

  $.redirect = function (url, values, method, target, traditional, redirectTop) {
    var opts = url;

    if (_typeof(url) !== "object") {
      var opts = {
        url: url,
        values: values,
        method: method,
        target: target,
        traditional: traditional,
        redirectTop: redirectTop
      };
    }

    var config = $.extend({}, defaults, opts);
    var generatedForm = $.redirect.getForm(config.url, config.values, config.method, config.target, config.traditional);
    $('body', config.redirectTop ? window.top.document : undefined).append(generatedForm.form);
    generatedForm.submit();
    generatedForm.form.remove();
  };

  $.redirect.getForm = function (url, values, method, target, traditional) {
    method = method && ["GET", "POST", "PUT", "DELETE"].indexOf(method.toUpperCase()) !== -1 ? method.toUpperCase() : 'POST';
    url = url.split("#");
    var hash = url[1] ? "#" + url[1] : "";
    url = url[0];

    if (!values) {
      var obj = $.parseUrl(url);
      url = obj.url;
      values = obj.params;
    }

    values = removeNulls(values);
    var form = $('<form>').attr("method", method).attr("action", url + hash);

    if (target) {
      form.attr("target", target);
    }

    var _submit = form[0].submit;
    iterateValues(values, [], form, null, traditional);
    return {
      form: form,
      submit: function submit() {
        _submit.call(form[0]);
      }
    };
  }; //Utility Functions

  /**
   * Url and QueryString Parser.
   * @param {string} url - a Url to parse.
   * @returns {object} an object with the parsed url with the following structure {url: URL, params:{ KEY: VALUE }}
   */


  $.parseUrl = function (url) {
    if (url.indexOf('?') === -1) {
      return {
        url: url,
        params: {}
      };
    }

    var parts = url.split('?'),
        query_string = parts[1],
        elems = query_string.split('&');
    url = parts[0];
    var i,
        pair,
        obj = {};

    for (i = 0; i < elems.length; i += 1) {
      pair = elems[i].split('=');
      obj[pair[0]] = pair[1];
    }

    return {
      url: url,
      params: obj
    };
  }; //Private Functions


  var getInput = function getInput(name, value, parent, array, traditional) {
    var parentString;

    if (parent.length > 0) {
      parentString = parent[0];
      var i;

      for (i = 1; i < parent.length; i += 1) {
        parentString += "[" + parent[i] + "]";
      }

      if (array) {
        if (traditional) name = parentString;else name = parentString + "[" + name + "]";
      } else {
        name = parentString + "[" + name + "]";
      }
    }

    return $("<input>").attr("type", "hidden").attr("name", name).attr("value", value);
  };

  var iterateValues = function iterateValues(values, parent, form, isArray, traditional) {
    var i,
        iterateParent = [];
    Object.keys(values).forEach(function (i) {
      if (_typeof(values[i]) === "object") {
        iterateParent = parent.slice();
        iterateParent.push(i);
        iterateValues(values[i], iterateParent, form, Array.isArray(values[i]), traditional);
      } else {
        form.append(getInput(i, values[i], parent, isArray, traditional));
      }
    });
  };

  var removeNulls = function removeNulls(values) {
    var propNames = Object.getOwnPropertyNames(values);

    for (var i = 0; i < propNames.length; i++) {
      var propName = propNames[i];

      if (values[propName] === null || values[propName] === undefined) {
        delete values[propName];
      } else if (_typeof(values[propName]) === 'object') {
        values[propName] = removeNulls(values[propName]);
      } else if (values[propName].length < 1) {
        delete values[propName];
      }
    }

    return values;
  };
})(window.jQuery || window.Zepto || window.jqlite);

/***/ }),

/***/ 1:
/*!******************************************************!*\
  !*** multi ./resources/assets/js/jquery.redirect.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ezegyalmafa\resources\assets\js\jquery.redirect.js */"./resources/assets/js/jquery.redirect.js");


/***/ })

/******/ });