if (document.getElementById('single-product-info-container'))
{
    GD.singleProductPage.sizeId = parseInt(OUTLET.product.sizes[0].id);

    new Vue({
        el: '#single-product-info-container',
        data: GD,
        mounted: function () {

        },
        watch: {
            // check if INIT CART AJAX ENDED, if true set count from cart
            INIT_CART_ENDED: function (INIT_CART_ENDED) {
                if (INIT_CART_ENDED)
                {
                    //looping cartItems
                    GD.cart.cartItems.forEach(function (item) {
                        //check if current prod id and size id in cartItems
                        if (item.productId == GD.singleProductPage.product.id && item.sizeId == GD.singleProductPage.sizeId)
                        {
                            //if true setting current COUNT of item from cart
                            GD.singleProductPage.count = item.count;
                        }
                    });
                }
            }
        },
        methods: {
            //method handles onChange count input
            toInteger: function (count) {
                let searchObj = {
                        productId: GD.singleProductPage.product.id,
                        sizeId: GD.singleProductPage.sizeId
                    },
                    _this = this;

                if (count < 1 || count == '')
                {
                    GD.singleProductPage.count = 1;
                }

                if (count > 99)
                {
                    GD.singleProductPage.count = 99;
                }

                //if prod size in cart
                if (this.findWhere(GD.cart.cartItems, searchObj))
                {
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
            findWhere: function (list, props) {
                let idx = 0;
                let len = list.length;
                let match = false;
                let item, item_k, item_v, prop_k, prop_val;
                for (; idx<len; idx++) {
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
            changeSizeId: function (sizeId) {
                GD.singleProductPage.sizeId = parseInt(sizeId);

                GD.singleProductPage.count = 1;

                //looping cartItems
                GD.cart.cartItems.forEach(function (item) {
                    //check if current active size id in cart
                    if (item.productId == GD.singleProductPage.product.id && item.sizeId == parseInt(sizeId))
                    {
                        //then setting count
                        GD.singleProductPage.count = item.count;
                    }
                });

            },
            //method handles add to cart
            addToCart: function (productId, sizeId, count) {
                let obj = {
                        productId: parseInt(productId),
                        sizeId: parseInt(sizeId),
                        count: parseInt(count)
                    },
                    searchObj = {
                        productId: parseInt(productId),
                        sizeId: parseInt(sizeId)
                    },
                    _this = this;

                if (_this.findWhere(GD.cart.cartItems, searchObj) == null)
                {
                    if (GD.IS_DATA_PROCESSING)
                    {
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
                            language: GD.LANGUAGE,
                        },
                        success: function (data) {
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

                            $('#big-cart').modal();
                        },
                        error: function (error) {
                            GD.LOADING = false;
                            GD.IS_DATA_PROCESSING = false;
                            console.log(error);
                        }
                    });
                }
                else {
                    $('#big-cart').modal();
                    // console.log('already in cart');
                }
            },
            //method handles updating cart, change count
            updateCart: _.debounce(function (productId, sizeId, count) {
                if (GD.IS_DATA_PROCESSING)
                {
                    return false;
                }

                GD.IS_DATA_PROCESSING = true;

                let obj = {
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
                        language: GD.LANGUAGE,
                        // userTypeId: GLOBAL_DATA.userTypeId
                    },
                    success: function (data) {
                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                        GD.cart.cartItems = data.cart;
                        GD.cart.totalCount = data.totalCount;
                        GD.cart.totalAmount = data.totalAmount;
                    },
                    error: function (error) {
                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                        console.log(error);
                    }
                });
            }, 450),
            //method handles + button incrementing value
            increment: function () {
                let searchObj = {
                        productId: GD.singleProductPage.product.id,
                        sizeId: GD.singleProductPage.sizeId
                    },
                    _this = this;

                let oldCount = GD.singleProductPage.count;

                GD.singleProductPage.count++;

                if (GD.singleProductPage.count > 99)
                {
                    GD.singleProductPage.count = 99;
                }

                //check if size id in cart
                if (this.findWhere(GD.cart.cartItems, searchObj))
                {
                    //check if old count != new count
                    if (oldCount != GD.singleProductPage.count)
                    {
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
            decrement: function () {
                let searchObj = {
                        productId: GD.singleProductPage.product.id,
                        sizeId: GD.singleProductPage.sizeId
                    },
                    _this = this;

                let oldCount = GD.singleProductPage.count;

                GD.singleProductPage.count--;

                if (GD.singleProductPage.count < 1)
                {
                    GD.singleProductPage.count = 1;
                }

                //check if size id in cart
                if (this.findWhere(GD.cart.cartItems, searchObj))
                {
                    //check if old count != new count
                    if (oldCount != GD.singleProductPage.count)
                    {
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
            scrollToReview: function () {
                $('#nav-home-tab').removeClass('active show').attr('aria-selected', false);

                $('#nav-description').removeClass('active show');

                $('#nav-profile-tab').addClass('active show').attr('aria-selected', true);

                $('#nav-comments').addClass('active show');

                $('html, body').animate({
                    scrollTop: ($("[data-review-form]").offset().top) - 80
                }, 600);
            }
        }
    });
}