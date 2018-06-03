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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/cart/small-cart.js":
/***/ (function(module, exports) {

if (document.getElementById('small-cart')) {

    new Vue({
        el: '#small-cart',
        data: GD,
        methods: {
            deleteFromCart: function deleteFromCart(productId, sizeId) {
                if (GD.IS_DATA_PROCESSING) {
                    return false;
                }

                GD.IS_DATA_PROCESSING = true;
                //loader
                GD.LOADING = true;

                $.ajax({
                    type: 'post',
                    url: '/cart/delete-from-cart',
                    data: {
                        productId: productId,
                        sizeId: sizeId,
                        language: GD.LANGUAGE
                        // userTypeId: GLOBAL_DATA.userTypeId
                    },
                    success: function success(data) {
                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                        GD.cart.cartItems = data.cart;
                        GD.cart.totalCount = data.totalCount;
                        GD.cart.totalAmount = data.totalAmount;

                        if (GD.cart.cartItems.length < 1) {
                            $('#big-cart').modal('hide');
                        }
                    },
                    error: function error(_error) {
                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                        console.log(_error);
                    }
                });
            }
        }
    });
}

/***/ }),

/***/ 6:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/cart/small-cart.js");


/***/ })

/******/ });