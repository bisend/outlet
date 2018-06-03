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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/auth/restore-password.js":
/***/ (function(module, exports) {

if (document.getElementById('restoreModal')) {
    var restorePasswordEmailValidator = void 0;

    new Vue({
        el: '#restoreModal',
        data: {
            email: ''
        },
        mounted: function mounted() {
            var _this = this;
            // `this` указывает на экземпляр vm

            restorePasswordEmailValidator = new RegExValidatingInput($('[data-restore-email-input]'), {
                expression: RegularExpressions.EMAIL,
                ChangeOnValid: function ChangeOnValid(input) {
                    input.removeClass(GD.INCORRECT_FIELD_CLASS);
                },
                ChangeOnInvalid: function ChangeOnInvalid(input) {
                    input.addClass(GD.INCORRECT_FIELD_CLASS);
                },
                showErrors: true,
                requiredErrorMessage: GD.REQUIRED_FIELD_TEXT,
                regExErrorMessage: GD.INCORRECT_FIELD_TEXT
            });
        },
        methods: {
            validateBeforeSubmit: function validateBeforeSubmit() {
                var _this = this;

                var isValid = true;

                restorePasswordEmailValidator.Validate();
                if (!restorePasswordEmailValidator.IsValid()) {
                    isValid = false;
                }

                if (isValid) {
                    _this.restorePassword();
                }
            },
            restorePassword: function restorePassword() {
                var _this = this;

                showLoader();

                $.ajax({
                    type: 'post',
                    url: '/user/restore-password',
                    data: {
                        email: _this.email,
                        language: GD.LANGUAGE
                    },
                    success: function success(data) {
                        hideLoader();

                        var LOADED = true;

                        if (data.status == 'success') {
                            $('[data-restore-password]').modal('hide');

                            $('[data-restore-password]').on('hidden.bs.modal', function () {
                                if (LOADED) {
                                    showPopup(RESTORE_SUCCESS);
                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status == 'error') {
                            if (data.failed == 'email') {
                                $('[data-restore-password]').modal('hide');

                                $('[data-restore-password]').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        showPopup(EMAIL_NOT_EXISTS);
                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed == 'server') {
                                $('[data-restore-password]').modal('hide');

                                $('[data-restore-password]').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        showPopup(SERVER_ERROR);
                                        LOADED = false;
                                    }
                                });
                            }
                        }
                    },
                    error: function error(_error) {
                        hideLoader();

                        $('[data-restore-password]').modal('hide');

                        var LOADED = true;

                        $('[data-restore-password]').on('hidden.bs.modal', function () {
                            if (LOADED) {
                                showPopup(SERVER_ERROR);
                                LOADED = false;
                            }
                        });

                        console.log(_error);
                    }
                });
            }
        }
    });
}

/***/ }),

/***/ 4:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/auth/restore-password.js");


/***/ })

/******/ });