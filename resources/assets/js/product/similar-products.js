if (document.getElementById('similar-products'))
{
    GD.singleProductPage.similarProducts = OUTLET.similar_products;

    if (GD.singleProductPage.similarProducts.length > 0)
    {



        new Vue({
            el: '#similar-products',
            data: GD,
            mounted: function () {

                $("#same-products").owlCarousel({
                    loop:false,
                    margin:15,
                    dots: false,
                    nav: true,
                    mouseDrag: false,
                    // navContainer:true,
                    // dotsContainer: true,
                    responsive:{
                        0:{
                            items:1
                        },
                        400:{
                            items:1
                        },
                        500:{
                            items:1
                        },
                        700:{
                            items:2
                        },
                        1023:{
                            items:3,
                            mouseDrag: false
                        },
                        1200:{
                            items:4,
                            mouseDrag: true
                        }

                    }
                });
            },
            methods: {
                //check if props in list
                findWhere: function (list, props) {
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
                                language: GD.LANGUAGE,
                                // userTypeId: GLOBAL_DATA.userTypeId
                            },
                            success: function (data) {
                                GD.IS_DATA_PROCESSING = false;
                                GD.LOADING = false;

                                GD.cart.cartItems = data.cart;
                                GD.cart.totalCount = data.totalCount;
                                GD.cart.totalAmount = data.totalAmount;

                                $('#big-cart').modal();
                            },
                            error: function (error) {
                                GD.IS_DATA_PROCESSING = false;
                                GD.LOADING = false;
                                console.log(error);
                            }
                        });
                    }
                    else {
                        $('#big-cart').modal();
                        // console.log('already in cart');
                    }
                },
                //changing current sizeId in preview
                changeCurrentSizeId: function (counter, sizeId) {
                    GD.singleProductPage.similarProducts[counter].currentSizeId = sizeId;
                }
            }
        });
    }
}