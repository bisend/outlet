if (!!window.location.hash && window.location.hash === '#_=_') {
    if (window.history && history.pushState) {
        window.history.pushState("", document.title, window.location.pathname);
    } else {
        // Prevent scrolling by storing the page's current scroll offset
        let scroll = {
            top: document.body.scrollTop,
            left: document.body.scrollLeft
        };
        window.location.hash = '';
        // Restore the scroll offset, should be flicker free
        document.body.scrollTop = scroll.top;
        document.body.scrollLeft = scroll.left;
    }
}

// Force page reload on browser back button click
if (window.performance && window.performance.navigation.type === 2) {
    // value 2 means "The page was accessed by navigating into the history"
    window.location.reload(); // reload whole page
}

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
