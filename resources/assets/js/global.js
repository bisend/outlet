/**
 * global data for vue instances
 * @type {{}}
 */
window.GD = {
    INIT_CART_WS: undefined,
    IS_DATA_PROCESSING: false,
    INIT_CART_ENDED: false,
    LANGUAGE: document.getElementsByTagName('html')[0].getAttribute("lang"),
    DEFAULT_LANGUAGE: 'ru',
    INCORRECT_FIELD_CLASS: 'incorrect-field',
    //showing loader true/false
    LOADING: false,

    //cart data
    cart: {
        cartItems: [],
        totalCount: 0,
        totalAmount: 0,
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
        similarProducts: [],
    },

    //home page data
    homePage: {
        newSliderProducts: [],
        salesSliderProducts: [],
        topSliderProducts: [],
    },

    //product grid
    productGrid: {
        products: [],
        sortItems: [],
        selected: null,
        view: null
    }
};
