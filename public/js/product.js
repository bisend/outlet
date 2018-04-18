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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/product/product.js":
/***/ (function(module, exports) {

if (document.getElementById('single-product-info-container')) {
    GD.singleProductPage.sizeId = parseInt(OUTLET.product.sizes[0].id);

    new Vue({
        el: '#single-product-info-container',
        data: GD,
        mounted: function mounted() {},
        watch: {
            // check if INIT CART AJAX ENDED, if true set count from cart
            INIT_CART_ENDED: function INIT_CART_ENDED(_INIT_CART_ENDED) {
                if (_INIT_CART_ENDED) {
                    //looping cartItems
                    GD.cart.cartItems.forEach(function (item) {
                        //check if current prod id and size id in cartItems
                        if (item.productId == GD.singleProductPage.product.id && item.sizeId == GD.singleProductPage.sizeId) {
                            //if true setting current COUNT of item from cart
                            GD.singleProductPage.count = item.count;
                        }
                    });
                }
            }
        },
        methods: {
            //method handles onChange count input
            toInteger: function toInteger(count) {
                var searchObj = {
                    productId: GD.singleProductPage.product.id,
                    sizeId: GD.singleProductPage.sizeId
                },
                    _this = this;

                if (count < 1 || count == '') {
                    GD.singleProductPage.count = 1;
                }

                if (count > 99) {
                    GD.singleProductPage.count = 99;
                }

                //if prod size in cart
                if (this.findWhere(GD.cart.cartItems, searchObj)) {
                    //then update cart
                    // if (_this.timer)
                    // {
                    //     clearTimeout(_this.timer);
                    //     _this.timer = undefined;
                    // }
                    // _this.timer = setTimeout(function () {

                    _this.updateCart(searchObj.productId, searchObj.sizeId, GD.singleProductPage.count);

                    // }, 400);
                }
            },
            //method handles search in cartItems return true|false
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
            //method handles current active size id
            changeSizeId: function changeSizeId(sizeId) {
                GD.singleProductPage.sizeId = parseInt(sizeId);

                GD.singleProductPage.count = 1;

                //looping cartItems
                GD.cart.cartItems.forEach(function (item) {
                    //check if current active size id in cart
                    if (item.productId == GD.singleProductPage.product.id && item.sizeId == parseInt(sizeId)) {
                        //then setting count
                        GD.singleProductPage.count = item.count;
                    }
                });
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
                        },
                        success: function success(data) {
                            GD.LOADING = false;
                            GD.IS_DATA_PROCESSING = false;
                            //check if this item not in cart yet
                            // if (_this.findWhere(GLOBAL_DATA.cartItems, searchObj) == null)
                            // {
                            //     //then push this item to global cart items
                            //     GLOBAL_DATA.cartItems.push(obj);
                            // }

                            GD.cart.cartItems = data.cart;
                            GD.cart.totalCount = data.totalCount;
                            GD.cart.totalAmount = data.totalAmount;

                            // $('#big-cart').modal();
                        },
                        error: function error(_error) {
                            GD.LOADING = false;
                            GD.IS_DATA_PROCESSING = false;
                            console.log(_error);
                        }
                    });
                } else {
                    // $('#big-cart').modal();
                    console.log('already in cart');
                }
            },
            //method handles updating cart, change count
            updateCart: _.debounce(function (productId, sizeId, count) {
                if (GD.IS_DATA_PROCESSING) {
                    return false;
                }

                GD.IS_DATA_PROCESSING = true;

                var obj = {
                    productId: parseInt(productId),
                    sizeId: parseInt(sizeId),
                    count: parseInt(count)
                },
                    _this = this;

                GD.LOADING = true;

                //ajax
                $.ajax({
                    type: 'post',
                    url: '/cart/update-cart',
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
                    },
                    error: function error(_error2) {
                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                        console.log(_error2);
                    }
                });
            }, 450),
            //method handles + button incrementing value
            increment: function increment() {
                var searchObj = {
                    productId: GD.singleProductPage.product.id,
                    sizeId: GD.singleProductPage.sizeId
                },
                    _this = this;

                var oldCount = GD.singleProductPage.count;

                GD.singleProductPage.count++;

                if (GD.singleProductPage.count > 99) {
                    GD.singleProductPage.count = 99;
                }

                //check if size id in cart
                if (this.findWhere(GD.cart.cartItems, searchObj)) {
                    //check if old count != new count
                    if (oldCount != GD.singleProductPage.count) {
                        //then send update ajax
                        // if (_this.timer) {
                        //     clearTimeout(_this.timer);
                        //     _this.timer = undefined;
                        // }
                        // _this.timer = setTimeout(function () {

                        _this.updateCart(searchObj.productId, searchObj.sizeId, GD.singleProductPage.count);

                        // }, 400);
                    }
                }
            },
            //method handles - button decrementing value
            decrement: function decrement() {
                var searchObj = {
                    productId: GD.singleProductPage.product.id,
                    sizeId: GD.singleProductPage.sizeId
                },
                    _this = this;

                var oldCount = GD.singleProductPage.count;

                GD.singleProductPage.count--;

                if (GD.singleProductPage.count < 1) {
                    GD.singleProductPage.count = 1;
                }

                //check if size id in cart
                if (this.findWhere(GD.cart.cartItems, searchObj)) {
                    //check if old count != new count
                    if (oldCount != GD.singleProductPage.count) {
                        //then send update ajax
                        // if (_this.timer)
                        // {
                        //     clearTimeout(_this.timer);
                        //     _this.timer = undefined;
                        // }
                        // _this.timer = setTimeout(function () {

                        _this.updateCart(searchObj.productId, searchObj.sizeId, GD.singleProductPage.count);

                        // }, 400);
                    }
                }
            },
            scrollToReview: function scrollToReview() {
                $('#nav-home-tab').removeClass('active show').attr('aria-selected', false);

                $('#nav-description').removeClass('active show');

                $('#nav-profile-tab').addClass('active show').attr('aria-selected', true);

                $('#nav-comments').addClass('active show');

                $('html, body').animate({
                    scrollTop: $("[data-review-form]").offset().top - 80
                }, 600);
            }
        }
    });
}

/***/ }),

/***/ 3:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/product/product.js");


/***/ })

/******/ });