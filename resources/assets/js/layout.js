GD.NOTIFICATION = {
    modal: $('[data-notification]'),
    modalText: $('[data-notification]').find('[data-notification-message]'),
    show: function (message) {
        this.clearMessage();

        if (message) {
            this.modalText.html(message);

            this.modal.modal('show');
        }
    },
    clearMessage: function () {
        this.modalText.html('');
    }
};

function initCart() {
    // GD.INIT_CART_WS = new WaitSync(function () {

        if (GD.IS_DATA_PROCESSING) {
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

function initNotification() {
    if (OUTLET.NOTIFICATION_MESSAGE) {
        GD.NOTIFICATION.show(OUTLET.NOTIFICATION_MESSAGE);

        OUTLET.NOTIFICATION_MESSAGE = undefined;
    }
}

function initSocialEmail() {
    if (OUTLET.SOCIAL_EMAIL && OUTLET.SOCIAL_EMAIL === true
        && OUTLET.SOCIAL_EMAIL_USER_NAME) {

        var $socialEmailModal = $('#socialEmailModal'),
            $socialEmailModalUserName = $socialEmailModal.find('[data-social-name-input]');

        $socialEmailModalUserName.val(OUTLET.SOCIAL_EMAIL_USER_NAME);

        $socialEmailModal.modal('show');
    }
}

$(document).ready(function () {
    initCart();
});

$(window).on('load', function (e) {
    initNotification();

    initSocialEmail();
});
