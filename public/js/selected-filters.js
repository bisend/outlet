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
/******/ 	return __webpack_require__(__webpack_require__.s = 13);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/filters/selected-filters.js":
/***/ (function(module, exports) {

if (document.getElementById('selected-filters-mobile')) {
    var FILTERS = window.OUTLET.filters;

    var SHOW_APPLY_BTN = {};

    for (var fName in FILTERS) {
        SHOW_APPLY_BTN[fName] = false;
    }

    var FILTERS_DATA = {
        filters: FILTERS,
        isStateChanged: false,
        show_btn: SHOW_APPLY_BTN,
        categorySlug: window.OUTLET.categorySlug,
        filterUrl: '',
        initialPriceMin: Math.floor(window.OUTLET.initialPriceMin),
        initialPriceMax: Math.round(window.OUTLET.initialPriceMax),
        oldPriceMin: Math.floor(window.OUTLET.priceMin),
        oldPriceMax: Math.round(window.OUTLET.priceMax),
        priceMin: Math.floor(window.OUTLET.priceMin),
        priceMax: Math.round(window.OUTLET.priceMax)
    };

    new Vue({
        el: '#selected-filters-mobile',
        data: FILTERS_DATA,
        mounted: function mounted() {
            var _this = this;

            this.$nextTick(function () {
                /*------------------- Sidebar Filter Range -------------------*/
                var priceSliderRange = $('#price-range');
                if ($.ui) {
                    if ($(priceSliderRange).length) {
                        $(priceSliderRange).slider({
                            range: true,
                            min: FILTERS_DATA.initialPriceMin,
                            max: FILTERS_DATA.initialPriceMax,
                            values: [FILTERS_DATA.priceMin ? FILTERS_DATA.priceMin : FILTERS_DATA.initialPriceMin, FILTERS_DATA.priceMax ? FILTERS_DATA.priceMax : FILTERS_DATA.initialPriceMax],
                            slide: function slide(event, ui) {
                                //$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                                $("#price-min").html(ui.values[0] + " грн");
                                $("#price-max").html(ui.values[1] + " грн");
                                // console.log(ui.values);
                                FILTERS_DATA.priceMin = ui.values[0];
                                FILTERS_DATA.priceMax = ui.values[1];

                                _this.buildSelectedFiltersArray();
                            }
                        });
                        $("#price-min").html($("#price-range").slider("values", 0) + " грн");
                        $("#price-max").html($("#price-range").slider("values", 1) + " грн");
                    }
                }
            });
        },
        methods: {
            setCheck: function setCheck(filterName, valueCounter) {
                var _this = this;

                _this.isStateChanged = false;

                FILTERS[filterName][valueCounter].isChecked = !FILTERS[filterName][valueCounter].isChecked;

                SHOW_APPLY_BTN[[filterName]] = false;

                for (var fName in FILTERS) {
                    FILTERS[fName].forEach(function (fValue) {

                        if (fValue.isChecked != fValue.initialState) {
                            _this.isStateChanged = true;
                            SHOW_APPLY_BTN[[fName]] = true;
                        }
                    });
                }

                _this.buildSelectedFiltersArray();
            },
            isCheckSelected: function isCheckSelected(filterName) {
                return SHOW_APPLY_BTN[[filterName]] ? true : false;
            },
            buildSelectedFiltersArray: function buildSelectedFiltersArray() {
                var _this = this;
                var url = '/category/' + _this.categorySlug;
                var arrayOfPairs = [];

                for (var fName in FILTERS) {
                    var values = [];

                    var valuesStr = '';

                    var filterName = '';

                    FILTERS[fName].forEach(function (fValue) {
                        if (fValue.isChecked) {
                            filterName = fValue.filter_name_slug;
                            values.push(fValue.filter_value_slug);
                        }
                    });

                    valuesStr = values.join();

                    if (valuesStr.length > 0) {
                        arrayOfPairs.push(filterName + '=' + valuesStr);
                    }
                }

                if (arrayOfPairs.length > 0) {
                    url += '/' + arrayOfPairs.join(';');
                }

                // if (FILTERS_DATA.initialPriceMin != FILTERS_DATA.priceMin || FILTERS_DATA.initialPriceMax != FILTERS_DATA.priceMax)
                if (FILTERS_DATA.priceMin && FILTERS_DATA.priceMax && (FILTERS_DATA.initialPriceMin != FILTERS_DATA.priceMin || FILTERS_DATA.initialPriceMax != FILTERS_DATA.priceMax)) {
                    if (arrayOfPairs.length > 0) {
                        url += ';price-range=' + FILTERS_DATA.priceMin + ',' + FILTERS_DATA.priceMax;
                    } else {
                        url += '/price-range=' + FILTERS_DATA.priceMin + ',' + FILTERS_DATA.priceMax;
                    }
                }

                if (GD.LANGUAGE != GD.DEFAULT_LANGUAGE) {
                    url += '/' + GD.LANGUAGE;
                }

                _this.filterUrl = url;
            }
        }
    });
}

/***/ }),

/***/ 13:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/filters/selected-filters.js");


/***/ })

/******/ });