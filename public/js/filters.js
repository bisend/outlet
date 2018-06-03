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
/******/ 	return __webpack_require__(__webpack_require__.s = 17);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/filters/filters.js":
/***/ (function(module, exports) {

if (document.getElementById('filters-mobile')) {
    var FILTERS = window.OUTLET.filters;

    var SHOW_APPLY_BTN = {};

    for (var fName in FILTERS) {
        SHOW_APPLY_BTN[fName] = false;
    }

    var FILTERS_DATA = {
        filters: FILTERS,
        isStateChanged: false,
        show_btn: SHOW_APPLY_BTN,
        categorySlug: OUTLET.categorySlug,
        filterUrl: '',
        initialPriceMin: Math.floor(OUTLET.priceMin),
        initialPriceMax: Math.round(OUTLET.priceMax),
        priceMin: Math.floor(OUTLET.priceMin),
        priceMax: Math.round(OUTLET.priceMax)
    };

    new Vue({
        el: '#filters-mobile',
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
                            min: FILTERS_DATA.priceMin,
                            max: FILTERS_DATA.priceMax,
                            values: [FILTERS_DATA.priceMin, FILTERS_DATA.priceMax],
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
                        $("#price-min").html(priceSliderRange.slider("values", 0) + " грн");
                        $("#price-max").html(priceSliderRange.slider("values", 1) + " грн");
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

                var _loop = function _loop(_fName) {
                    FILTERS[_fName].forEach(function (fValue) {

                        if (fValue.isChecked) {
                            _this.isStateChanged = true;
                            SHOW_APPLY_BTN[[_fName]] = true;
                        }
                    });
                };

                for (var _fName in FILTERS) {
                    _loop(_fName);
                }

                _this.buildSelectedFiltersArray();
            },
            isCheckSelected: function isCheckSelected(filterName) {
                return SHOW_APPLY_BTN[[filterName]] ? true : false;
            },
            buildSelectedFiltersArray: function buildSelectedFiltersArray() {
                var _this = this;
                var url = '/category/' + _this.categorySlug + '/';
                var arrayOfPairs = [];

                var _loop2 = function _loop2(_fName2) {
                    var values = [];

                    var valuesStr = '';

                    var filterName = '';

                    FILTERS[_fName2].forEach(function (fValue) {
                        if (fValue.isChecked) {
                            filterName = fValue.filter_name_slug;
                            values.push(fValue.filter_value_slug);
                        }
                    });

                    valuesStr = values.join();

                    if (valuesStr.length > 0) {
                        arrayOfPairs.push(filterName + '=' + valuesStr);
                    }
                };

                for (var _fName2 in FILTERS) {
                    _loop2(_fName2);
                }

                url += arrayOfPairs.join(';');

                if (FILTERS_DATA.initialPriceMin != FILTERS_DATA.priceMin || FILTERS_DATA.initialPriceMax != FILTERS_DATA.priceMax) {
                    if (arrayOfPairs.length > 0) {
                        url += ';price-range=' + FILTERS_DATA.priceMin + ',' + FILTERS_DATA.priceMax;
                    } else {
                        url += 'price-range=' + FILTERS_DATA.priceMin + ',' + FILTERS_DATA.priceMax;
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

/***/ 17:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/filters/filters.js");


/***/ })

/******/ });