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

/***/ "./resources/assets/js/global.js":
/***/ (function(module, exports) {

/**
 * global data for vue instances
 * @type {{}}
 */
var GD = {
    INIT_CART_WS: undefined,
    IS_DATA_PROCESSING: false,
    INIT_CART_ENDED: false,
    LANGUAGE: document.getElementsByTagName('html')[0].getAttribute("lang"),
    DEFAULT_LANGUAGE: 'ru',
    INCORRECT_FIELD_CLASS: 'incorrect-field',
    REQUIRED_FIELD_TEXT: this.LANGUAGE === this.DEFAULT_LANGUAGE ? 'Обязательное поле' : 'Обов`язкове поле',
    INCORRECT_FIELD_TEXT: this.LANGUAGE === this.DEFAULT_LANGUAGE ? 'Неправильные данные' : 'Невірно введені дані',
    //showing loader true/false
    LOADING: false,

    //cart data
    cart: {
        cartItems: [],
        totalCount: 0,
        totalAmount: 0
    },

    //single product data
    singleProductPage: {
        //product
        product: null,
        //selected size
        sizeId: null,
        //count in cart
        count: 1,

        //reviews
        reviews: [],
        reviews_total_count: 0,

        //reviews pagination
        reviewsPages: [],
        reviewIsPrev: false,
        reviewIsNext: false,
        reviewsCurrentPage: 1,

        //adding review
        rating: 0,
        hoverRating: 0,
        tempRating: 0,
        validatedFalse: false,
        name: '',
        email: '',
        text: '',

        //similar products
        similarProducts: []
    },

    //home page data
    homePage: {
        newSliderProducts: [],
        salesSliderProducts: [],
        topSliderProducts: []
    },

    //product grid
    productGrid: {
        products: [],
        sortItems: [],
        selected: null,
        view: null
    }
};

/***/ }),

/***/ 1:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/global.js");


/***/ })

/******/ });