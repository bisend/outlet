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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/product/review.js":
/***/ (function(module, exports) {

if (document.getElementById('single-product-reviews-description')) {
    var reviewNameValidator = void 0,
        reviewEmailValidator = void 0,
        reviewTextValidator = void 0;

    GD.singleProductPage.product = OUTLET.product;
    GD.singleProductPage.reviews = OUTLET.reviews;
    GD.singleProductPage.reviews_total_count = OUTLET.reviews_total_count;

    new Vue({
        el: '#single-product-reviews-description',
        data: GD,
        mounted: function mounted() {
            var _this = this;

            GD.singleProductPage.reviewsPages = _this.createPagination(GD.singleProductPage.reviewsCurrentPage, 5, GD.singleProductPage.reviews_total_count);

            reviewNameValidator = new RegExValidatingInput($('[data-review-name]'), {
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

            reviewEmailValidator = new RegExValidatingInput($('[data-review-email]'), {
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

            reviewTextValidator = new RegExValidatingInput($('[data-review-text]'), {
                expression: RegularExpressions.SIMPLE_TEXT,
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
        watch: {
            "singleProductPage.reviewsCurrentPage": function singleProductPageReviewsCurrentPage() {
                var _this = this;

                GD.singleProductPage.reviewsPages = _this.createPagination(GD.singleProductPage.reviewsCurrentPage, 5, GD.singleProductPage.reviews_total_count);

                _this.getReviews();
            }
        },
        methods: {
            range: function range(low, high, step) {
                var matrix = [];
                var inival, endval, plus;
                var walker = step || 1;
                var chars = false;

                if (!isNaN(low) && !isNaN(high)) {
                    inival = low;
                    endval = high;
                } else if (isNaN(low) && isNaN(high)) {
                    chars = true;
                    inival = low.charCodeAt(0);
                    endval = high.charCodeAt(0);
                } else {
                    inival = isNaN(low) ? 0 : low;
                    endval = isNaN(high) ? 0 : high;
                }

                plus = inival > endval ? false : true;
                if (plus) {
                    while (inival <= endval) {
                        matrix.push(chars ? String.fromCharCode(inival) : inival);
                        inival += walker;
                    }
                } else {
                    while (inival >= endval) {
                        matrix.push(chars ? String.fromCharCode(inival) : inival);
                        inival -= walker;
                    }
                }

                return matrix;
            },
            createPagination: function createPagination(page, itemsPerPage, totalItemsCount) {
                var _this = this;
                var maxElements = 7;
                var pages = [];
                var lastPage = Math.ceil(totalItemsCount / itemsPerPage);
                var minMiddle;
                var maxMiddle;
                var pagesPerBothSides;
                var min;
                var max;
                var pagesPerLeftSide;
                var pagesPerRightSide;

                if (maxElements >= lastPage) {
                    pages = _this.range(1, lastPage);
                } else {
                    minMiddle = Math.ceil(maxElements / 2);
                    maxMiddle = Math.ceil(lastPage - maxElements / 2);

                    if (page > minMiddle) {
                        pages.push(1);
                        pages.push('...');
                    }

                    if (page > minMiddle && page < maxMiddle) {
                        pagesPerBothSides = Math.floor(maxElements / 4);
                        min = page - pagesPerBothSides;
                        max = page + pagesPerBothSides;
                        for (var i = min; i <= max; i++) {
                            pages.push(i);
                        }
                    } else if (page <= minMiddle) {
                        pagesPerLeftSide = maxElements - 2;
                        for (i = 1; i <= pagesPerLeftSide; i++) {
                            pages.push(i);
                        }
                    } else if (page >= maxMiddle) {
                        pagesPerRightSide = maxElements - 3;
                        min = lastPage - pagesPerRightSide;
                        for (i = min; i <= lastPage; i++) {
                            pages.push(i);
                        }
                    }

                    if (page < maxMiddle) {
                        pages.push('...');
                        pages.push(lastPage);
                    }
                }

                if (page == 1) {
                    pages.unshift(false);
                } else {
                    pages.unshift(true);
                }

                if (page == lastPage) {
                    pages.push(false);
                } else {
                    pages.push(true);
                }

                /////////
                GD.singleProductPage.reviewIsPrev = pages.shift();
                GD.singleProductPage.reviewIsNext = pages.pop();

                return pages;
            },
            setPage: function setPage(page) {
                GD.singleProductPage.reviewsCurrentPage = page;
            },
            getReviews: _.debounce(function () {
                var _this = this;

                // showLoader();

                $.ajax({
                    type: 'post',
                    url: '/get-reviews',
                    data: {
                        product_id: GD.singleProductPage.product.id,
                        page: GD.singleProductPage.reviewsCurrentPage,
                        language: GD.LANGUAGE
                    },
                    success: function success(data) {
                        GD.singleProductPage.reviews = data.reviews;
                        GD.singleProductPage.reviews_total_count = data.reviews_count;
                        // hideLoader();
                    },
                    error: function error(_error) {
                        // hideLoader();
                        console.log(_error);
                        // showPopup(SERVER_ERROR);
                    }
                });
            }, 450),
            validateBeforeSubmit: function validateBeforeSubmit() {
                var _this = this;

                var isValid = true;

                reviewNameValidator.Validate();
                if (!reviewNameValidator.IsValid()) {
                    isValid = false;
                }

                reviewEmailValidator.Validate();
                if (isValid && !reviewEmailValidator.IsValid()) {
                    isValid = false;
                }

                reviewTextValidator.Validate();
                if (isValid && !reviewTextValidator.IsValid()) {
                    isValid = false;
                }

                if (GD.singleProductPage.rating < 1) {
                    isValid = false;
                    GD.singleProductPage.validatedFalse = true;
                }

                if (isValid) {
                    _this.saveReview();
                }
            },
            saveReview: function saveReview() {
                var _this = this;

                // showLoader();

                $.ajax({
                    type: 'post',
                    url: '/add-review',
                    data: {
                        productId: GD.singleProductPage.product.id,
                        review: GD.singleProductPage.text,
                        name: GD.singleProductPage.name,
                        email: GD.singleProductPage.email,
                        rating: GD.singleProductPage.rating,
                        language: GD.LANGUAGE
                    },
                    success: function success(data) {
                        // hideLoader();

                        if (data.status == 'success') {
                            GD.singleProductPage.text = '';
                            GD.singleProductPage.rating = 0;
                            GD.singleProductPage.hoverRating = 0;
                            GD.singleProductPage.tempRating = 0;
                            // showPopup(REVIEW_ADDED);
                        }

                        if (data.status == 'error') {
                            // showPopup(SERVER_ERROR);
                        }
                    },
                    error: function error(_error2) {
                        // hideLoader();
                        console.log(_error2);
                        // showPopup(SERVER_ERROR);
                    }
                });
            },
            hoverStars: function hoverStars(rating) {
                // GD.singleProductPage.tempRating = GD.singleProductPage.rating;
                GD.singleProductPage.hoverRating = rating;
                GD.singleProductPage.rating = GD.singleProductPage.hoverRating;
            },
            mouseLeave: function mouseLeave() {
                GD.singleProductPage.rating = GD.singleProductPage.tempRating;
                GD.singleProductPage.hoverRating = GD.singleProductPage.rating;
            },
            clickStars: function clickStars(rating) {
                GD.singleProductPage.rating = rating;
                GD.singleProductPage.tempRating = rating;
                GD.singleProductPage.validatedFalse = false;
            },

            scrollToReview: function scrollToReview() {
                $('html, body').animate({
                    scrollTop: $("[data-review-form]").offset().top - 80
                }, 600);
            }
        }
    });
}

/***/ }),

/***/ 1:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/assets/js/product/review.js");


/***/ })

/******/ });