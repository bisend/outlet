if (document.getElementById('big-cart'))
{

    new Vue({
        el: '#big-cart',
        data: GD,
        methods: {
            findWhere: function (list, props) {
                var idx = 0;
                var len = list.length;
                var match = false;
                var item, item_k, item_v, prop_k, prop_val;
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
            //method handles onChange count input
            toInteger: function (productId, sizeId, count) {
                var _this = this;

                if (count < 1 || count == '')
                {
                    count = 1;
                }

                if (count > 99)
                {
                    count = 99;
                }
                //check if current page single product
                if (document.getElementById('product-details'))
                {
                    if (GD.singleProductPage.product &&
                        GD.singleProductPage.product.id == productId &&
                        GD.singleProductPage.sizeId == sizeId)
                    {
                        GD.singleProductPage.count = count;
                    }
                }

                //then update cart
                // if (_this.timer)
                // {
                //     clearTimeout(_this.timer);
                //     _this.timer = undefined;
                // }
                // _this.timer = setTimeout(function () {

                    _this.updateCart(productId, sizeId, count);

                // }, 400);
            },
            //method handles updating cart, change count
            updateCart: _.debounce(function (productId, sizeId, count) {
                if (GD.IS_DATA_PROCESSING)
                {
                    return false;
                }

                GD.IS_DATA_PROCESSING = true;
                //loader
                GD.LOADING = true;

                var obj = {
                        productId: parseInt(productId),
                        sizeId: parseInt(sizeId),
                        count: parseInt(count)
                    },
                    _this = this;

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
            //
            deleteFromCart: function (productId, sizeId) {
                if (GD.IS_DATA_PROCESSING)
                {
                    return false;
                }

                GD.IS_DATA_PROCESSING = true;
                //loader
                GD.LOADING = true;

                $.ajax({
                    type: 'post',
                    url: '/cart/delete-from-cart',
                    data: {
                        productId: productId,
                        sizeId: sizeId,
                        language: GD.LANGUAGE,
                        // userTypeId: GLOBAL_DATA.userTypeId
                    },
                    success: function (data) {
                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                        GD.cart.cartItems = data.cart;
                        GD.cart.totalCount = data.totalCount;
                        GD.cart.totalAmount = data.totalAmount;


                        if (GD.cart.cartItems.length < 1)
                        {
                            $('#big-cart').modal('hide');
                        }
                    },
                    error: function (error) {
                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                        console.log(error);
                    }
                });
            },
            //method handles + button incrementing value
            increment: function (productId, sizeId) {
                var searchObj = {
                        productId: productId,
                        sizeId: sizeId
                    },
                    _this = this;

                var oldCount;
                var newCount = 1;

                GD.cart.cartItems.forEach(function (item) {
                    if (item.productId == productId && item.sizeId == sizeId)
                    {
                        oldCount = item.count;

                        item.count++;

                        if (item.count > 99)
                        {
                            item.count = 99;
                        }

                        newCount = item.count;
                    }
                });

                //check if current page single product
                if (document.getElementById('product-details'))
                {
                    if (GD.singleProductPage.product.id == productId && GD.singleProductPage.sizeId == sizeId)
                    {
                        GD.singleProductPage.count = newCount;
                    }
                }

                //check if size id in cart
                if (_this.findWhere(GD.cart.cartItems, searchObj))
                {
                    //check if old count != new count
                    if (oldCount != newCount)
                    {
                        //then send update ajax
                        // if (_this.timer) {
                        //     clearTimeout(_this.timer);
                        //     _this.timer = undefined;
                        // }
                        // _this.timer = setTimeout(function () {

                            _this.updateCart(searchObj.productId, searchObj.sizeId, newCount);

                        // }, 400);
                    }
                }
            },
            //method handles - button decrementing value
            decrement: function (productId, sizeId) {
                var searchObj = {
                        productId: productId,
                        sizeId: sizeId
                    },
                    _this = this;
                var oldCount;
                var newCount = 1;

                GD.cart.cartItems.forEach(function (item) {
                    if (item.productId == productId && item.sizeId == sizeId)
                    {
                        oldCount = item.count;

                        item.count--;

                        if (item.count < 1)
                        {
                            item.count = 1;
                        }

                        newCount = item.count;
                    }
                });

                //check if current page single product
                if (document.getElementById('product-details'))
                {
                    if (GD.singleProductPage.product.id == productId && GD.singleProductPage.sizeId == sizeId)
                    {
                        GD.singleProductPage.count = newCount;
                    }
                }

                //check if size id in cart
                if (_this.findWhere(GD.cart.cartItems, searchObj))
                {
                    //check if old count != new count
                    if (oldCount != newCount)
                    {
                        // //then send update ajax
                        // if (_this.timer) {
                        //     clearTimeout(_this.timer);
                        //     _this.timer = undefined;
                        // }
                        // _this.timer = setTimeout(function () {

                            _this.updateCart(searchObj.productId, searchObj.sizeId, newCount);

                        // }, 400);
                    }
                }
            }
        }
    });


}