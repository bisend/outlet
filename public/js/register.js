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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/auth/register.js":
/***/ (function(module, exports) {

if (document.getElementById('registrModal')) {
    var registerNameValidator = void 0,
        registerEmailValidator = void 0,
        registerPasswordValidator = void 0,
        registerConfirmValidator = void 0;

    new Vue({
        el: '#registrModal',
        data: {
            name: '',
            email: '',
            password: '',
            confirmPassword: '',
            isConfirmInvalid: false
        },
        mounted: function mounted() {
            var _this = this;
            // `this` указывает на экземпляр vm
            registerNameValidator = new RegExValidatingInput($('[data-register-name]'), {
                expression: RegularExpressions.FULL_NAME,
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

            registerEmailValidator = new RegExValidatingInput($('[data-register-email]'), {
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

            registerPasswordValidator = new RegExValidatingInput($('[data-register-password]'), {
                expression: RegularExpressions.PASSWORD,
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

            registerConfirmValidator = new RegExValidatingInput($('[data-register-confirm]'), {
                expression: RegularExpressions.PASSWORD,
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

                registerNameValidator.Validate();
                if (!registerNameValidator.IsValid()) {
                    isValid = false;
                }

                registerEmailValidator.Validate();
                if (isValid && !registerEmailValidator.IsValid()) {
                    isValid = false;
                }

                registerPasswordValidator.Validate();
                if (isValid && !registerPasswordValidator.IsValid()) {
                    isValid = false;
                }

                registerConfirmValidator.Validate();
                if (isValid && !registerConfirmValidator.IsValid()) {
                    isValid = false;
                }

                if (_this.password != _this.confirmPassword) {
                    $('[data-register-confirm]').addClass(GD.INCORRECT_FIELD_CLASS);
                    isValid = false;
                    _this.isConfirmInvalid = true;
                } else {
                    _this.isConfirmInvalid = false;
                }

                if (isValid) {
                    _this.registerUser();
                }
            },

            registerUser: function registerUser() {
                var _this = this;

                showLoader();

                $.ajax({
                    type: 'post',
                    url: '/user/register',
                    data: {
                        name: _this.name,
                        email: _this.email,
                        password: _this.password,
                        language: GD.LANGUAGE
                    },
                    success: function success(data) {
                        hideLoader();

                        var LOADED = true;

                        $('#register-popup').modal('hide');

                        if (data.status == 'success') {
                            $('#register-popup').on('hidden.bs.modal', function () {
                                if (LOADED) {
                                    showPopup(REGISTER_SUCCESS);
                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status == 'error') {
                            if (data.failed == 'email') {
                                $('#register-popup').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        showPopup(EMAIL_NOT_VALID);
                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed == 'server') {
                                $('#register-popup').on('hidden.bs.modal', function () {
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

                        $('#register-popup').modal('hide');

                        var LOADED = true;

                        $('#register-popup').on('hidden.bs.modal', function () {
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

/***/ 3:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/auth/register.js");


/***/ })

/******/ });