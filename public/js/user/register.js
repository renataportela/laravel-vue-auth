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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/helpers/Errors.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Errors = function () {
   function Errors() {
      _classCallCheck(this, Errors);

      this.errors = {};
   }

   _createClass(Errors, [{
      key: "get",
      value: function get(field) {
         if (this.errors[field]) {
            return this.errors[field][0];
         }
      }
   }, {
      key: "record",
      value: function record(errors) {
         this.errors = errors;
      }
   }, {
      key: "clear",
      value: function clear(field) {
         if (this.has(field)) {
            delete this.errors[field];
         }
      }
   }, {
      key: "clearAll",
      value: function clearAll() {
         this.errors = {};
      }
   }, {
      key: "has",
      value: function has(field) {
         return this.errors.hasOwnProperty(field);
      }
   }, {
      key: "any",
      value: function any() {
         return Object.keys(this.errors).length > 0;
      }
   }]);

   return Errors;
}();

/* harmony default export */ __webpack_exports__["a"] = (Errors);

/***/ }),

/***/ "./resources/assets/js/user/register.js":
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0__helpers_Errors__ = __webpack_require__("./resources/assets/js/helpers/Errors.js");


var app = new Vue({
   el: '#app',

   data: {
      form: {
         name: '',
         email: '',
         password: '',
         password_confirmation: ''
      },
      errors: new __WEBPACK_IMPORTED_MODULE_0__helpers_Errors__["a" /* default */](),
      loading: false
   },

   computed: {
      errorMessage: function errorMessage() {
         var _this = this;

         return function (field) {
            return _this.errors.get(field);
         };
      },
      hasError: function hasError() {
         var _this2 = this;

         return function (field) {
            return _this2.errors.has(field);
         };
      }
   },

   methods: {
      submitForm: function submitForm() {
         this.loading = true;
         this.errors.clearAll();

         var that = this;

         axios.post('/register', this.form).then(function (response) {
            window.location.href = '/home';
         }).catch(function (error) {
            that.loading = false;

            if (error.response.status === 500) {
               console.log('error', error);
            } else {
               that.errors.record(error.response.data.errors);
            }
         });
      }
   }
});

/***/ }),

/***/ 1:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/user/register.js");


/***/ })

/******/ });