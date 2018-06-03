if (document.getElementById('small-cart'))
{
    new Vue({
        el: '#small-cart',
        data: GD,
        methods: {
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
        }
    });


}