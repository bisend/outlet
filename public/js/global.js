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
    REQUIRED_FIELD_TEXT: (this.LANGUAGE === this.DEFAULT_LANGUAGE) ? 'Обязательное поле' : 'Обов`язкове поле',
    INCORRECT_FIELD_TEXT: (this.LANGUAGE === this.DEFAULT_LANGUAGE) ? 'Неправильные данные' : 'Невірно введені дані',

    //cart data
    cart: {
        cartItems: [],
        totalCount: 0,
        totalAmount: 0,
    },

    //single product data
    singleProductPage: {
        product: null,
        sizeId: null,
        count: 1,

        reviews: [],
        reviews_total_count: 0,

        reviewsPages: [],
        reviewIsPrev: false,
        reviewIsNext: false,
        reviewsCurrentPage: 1,

        rating: 0,
        hoverRating: 0,
        tempRating: 0,
        validatedFalse: false,
        name: '',
        email: '',
        text: ''
    }
};