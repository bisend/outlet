$(document).ready(function () {
    initCart();


});

function initCart() {

    // GD.INIT_CART_WS = new WaitSync(function () {

        if (GD.IS_DATA_PROCESSING)
        {
            return false;
        }

        GD.IS_DATA_PROCESSING = true;

        $.ajax({
            type: 'post',
            url: '/cart/init-cart',
            data: {
                language: GD.LANGUAGE,
                // userTypeId: GD.userTypeId
            },
            success: function (data) {
                GD.IS_DATA_PROCESSING = false;
                GD.INIT_CART_ENDED = true;
                GD.cart.cartItems = data.cart;
                GD.cart.totalCount = data.totalCount;
                GD.cart.totalAmount = data.totalAmount;
            },
            error: function (error) {
                GD.IS_DATA_PROCESSING = false;
                GD.INIT_CART_ENDED = true;
                console.log(error);
            }
        });
    // });
}