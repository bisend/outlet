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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/home/sales-slider.js":
/***/ (function(module, exports) {

if (document.getElementById('sales-slider')) {
    GD.homePage.salesSliderProducts = OUTLET.salesSliderProducts;

    new Vue({
        el: '#sales-slider',
        data: GD,
        methods: {
            //check if props in list
            findWhere: function findWhere(list, props) {
                var idx = 0;
                var len = list.length;
                var match = false;
                var item, item_k, item_v, prop_k, prop_val;
                for (; idx < len; idx++) {
                    item = list[idx];
                    for (prop_k in props) {
                        // If props doesn't own the property, skip it.
                        if (!props.hasOwnProperty(prop_k)) continue;
                        // If item doesn't have the property, no match;
                        if (!item.hasOwnProperty(prop_k)) {
                            match = false;
                            break;
                        }
                        if (props[prop_k] === item[prop_k]) {
                            // We have a match…so far.
                            match = true;
                        } else {
                            // No match.
                            match = false;
                            // Don't compare more properties.
                            break;
                        }
                    }
                    // We've iterated all of props' properties, and we still match!
                    // Return that item!
                    if (match) return item;
                }
                // No matches
                return null;
            },
            //method handles add to cart
            addToCart: function addToCart(productId, sizeId, count) {
                var obj = {
                    productId: parseInt(productId),
                    sizeId: parseInt(sizeId),
                    count: parseInt(count)
                },
                    searchObj = {
                    productId: parseInt(productId),
                    sizeId: parseInt(sizeId)
                },
                    _this = this;

                if (_this.findWhere(GD.cart.cartItems, searchObj) == null) {
                    if (GD.IS_DATA_PROCESSING) {
                        return false;
                    }

                    GD.IS_DATA_PROCESSING = true;
                    GD.LOADING = true;

                    //ajax
                    $.ajax({
                        type: 'post',
                        url: '/cart/add-to-cart',
                        data: {
                            productId: obj.productId,
                            sizeId: obj.sizeId,
                            count: obj.count,
                            language: GD.LANGUAGE
                            // userTypeId: GLOBAL_DATA.userTypeId
                        },
                        success: function success(data) {
                            GD.IS_DATA_PROCESSING = false;
                            GD.LOADING = false;

                            GD.cart.cartItems = data.cart;
                            GD.cart.totalCount = data.totalCount;
                            GD.cart.totalAmount = data.totalAmount;

                            $('#big-cart').modal();
                        },
                        error: function error(_error) {
                            GD.IS_DATA_PROCESSING = false;
                            GD.LOADING = false;
                            console.log(_error);
                        }
                    });
                } else {
                    $('#big-cart').modal();

                    // console.log('already in cart');
                }
            },
            //changing current sizeId in preview
            changeCurrentSizeId: function changeCurrentSizeId(counter, sizeId) {
                GD.homePage.salesSliderProducts[counter].currentSizeId = sizeId;
            }
        }
    });
}

/***/ }),

/***/ 8:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/home/sales-slider.js");


/***/ })

/******/ });