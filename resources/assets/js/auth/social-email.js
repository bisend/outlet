if (document.getElementById('socialEmailModal')) {
    let socialEmailValidator;

    new Vue({
        el: '#socialEmailModal',
        data: {
            email: ''
        },
        mounted: function () {
            let _this = this;

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
                    _this.registerUser();
                }
            },
            registerUser: function () {
                let _this = this;

                GD.IS_DATA_PROCESSING = true;
                GD.LOADING = true;

                $.ajax({
                    type: 'post',
                    url: '/auth/social-email',
                    data: {
                        email: _this.email,
                        language: GD.LANGUAGE
                    },
                    success: function (data) {
                        let LOADED = true;

                        if (data.status === 'success') {
                            $('#socialEmailModal').modal('hide');

                            $('#socialEmailModal').on('hidden.bs.modal', function () {
                                if (LOADED) {
                                    GD.NOTIFICATION.show(OUTLET.TRANS.AUTH.THANKS_FOR_REGISTRATION
                                        + '<b>' + _this.email + '</b>');

                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status === 'error') {
                            if (data.failed === 'email') {
                                GD.NOTIFICATION.show(OUTLET.TRANS.ERROR.EMAIL_NOT_VALID);

                                LOADED = false;
                            }

                            if (data.failed === 'server') {
                                $('#registrModal').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        GD.NOTIFICATION.show(OUTLET.TRANS.ERROR.SERVER_ERROR);

                                        LOADED = false;
                                    }
                                });
                            }
                        }

                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;

                        console.log(data);
                    },
                    error: function (error) {
                        let LOADED = true;

                        $('#socialEmailModal').modal('hide');

                        $('#socialEmailModal').on('hidden.bs.modal', function () {
                            if (LOADED) {
                                GD.NOTIFICATION.show(OUTLET.TRANS.ERROR.SERVER_ERROR);

                                LOADED = false;
                            }
                        });

                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;

                        console.log(error);
                    }
                });
            }
        }
    });
}
