if (document.getElementById('socialEmailModal')) {
    let socialEmailValidator;

    new Vue({
        el: '[data-social-email]',
        data: {
            email: ''
        },
        mounted: function () {
            let _this = this;
            // `this` указывает на экземпляр vm

            socialEmailValidator = new RegExValidatingInput($('[data-social-email-input]'), {
                expression: RegularExpressions.EMAIL,
                ChangeOnValid: function (input) {
                    input.removeClass(GD.INCORRECT_FIELD_CLASS);
                },
                ChangeOnInvalid: function (input) {
                    input.addClass(GD.INCORRECT_FIELD_CLASS);
                },
                showErrors: true,
                requiredErrorMessage: OUTLET.TRANS.ERROR.REQUIRED_FIELD_TEXT,
                regExErrorMessage: OUTLET.TRANS.ERROR.INCORRECT_FIELD_TEXT
            });
        },
        methods: {
            validateBeforeSubmit() {
                let _this = this;

                let isValid = true;

                socialEmailValidator.Validate();
                if (!socialEmailValidator.IsValid()) {
                    isValid = false;
                }

                if (isValid) {
                    _this.loginUser();
                }
            },
            loginUser: function () {
                let _this = this;

                showLoader();

                $.ajax({
                    type: 'post',
                    url: '/user/social-email',
                    data: {
                        email: _this.email,
                        language: GD.LANGUAGE
                    },
                    success: function (data) {
                        hideLoader();

                        let LOADED = true;

                        if (data.status == 'success') {
                            $('[data-social-email]').modal('hide');

                            $('[data-social-email]').on('hidden.bs.modal', function () {
                                if (LOADED) {
                                    showPopup(REGISTER_SUCCESS);
                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status == 'error') {
                            if (data.failed == 'email') {
                                $('[data-social-email]').modal('hide');

                                $('[data-social-email]').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        showPopup(EMAIL_NOT_VALID);
                                        LOADED = false;
                                    }
                                });
                            }

                        }
                    },
                    error: function (error) {
                        hideLoader();

                        $('[data-social-email]').modal('hide');

                        let LOADED = true;

                        $('[data-social-email]').on('hidden.bs.modal', function () {
                            if (LOADED) {
                                showPopup(SERVER_ERROR);
                                LOADED = false;
                            }
                        });

                        console.log(error);
                    }
                });

            }
        }
    });
}