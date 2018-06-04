if (document.getElementById('loginModal')) {
    let loginEmailValidator,
        loginPasswordValidator;

    new Vue({
        el: '#loginModal',
        data: {
            email: '',
            password: '',
            rememberMe: false
        },
        mounted: function () {
            let _this = this;

            loginEmailValidator = new RegExValidatingInput($('[data-login-email]'), {
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

            loginPasswordValidator = new RegExValidatingInput($('[data-login-password]'), {
                expression: RegularExpressions.PASSWORD,
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

                loginEmailValidator.Validate();
                if (!loginEmailValidator.IsValid()) {
                    isValid = false;
                }

                loginPasswordValidator.Validate();
                if (isValid && !loginPasswordValidator.IsValid()) {
                    isValid = false;
                }

                if (isValid) {
                    _this.loginUser();
                }
            },
            loginUser: function () {
                let _this = this;

                GD.IS_DATA_PROCESSING = true;
                GD.LOADING = true;

                $.ajax({
                    type: 'post',
                    url: '/auth/login',
                    data: {
                        email: _this.email,
                        password: md5(_this.password),
                        remember: _this.rememberMe,
                        language: GD.LANGUAGE
                    },
                    success: function (data) {
                        let LOADED = true;

                        if (data.status === 'success') {
                            window.location.reload(true);
                        } else if (data.status === 'error') {
                            if (data.failed === 'email') {
                                $('#loginModal').modal('hide');

                                $('#loginModal').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        GD.NOTIFICATION.show(OUTLET.TRANS.AUTH.EMAIL_NOT_EXISTS);

                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed === 'active') {
                                $('#loginModal').modal('hide');

                                $('#loginModal').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        GD.NOTIFICATION.show(OUTLET.TRANS.AUTH.EMAIL_NOT_CONFIRMED);

                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed === 'password') {
                                $('[data-login-password]')
                                    .val('')
                                    .addClass(GD.INCORRECT_FIELD_CLASS)
                                    .attr("placeholder", OUTLET.TRANS.ERROR.INCORRECT_FIELD_TEXT);
                            }

                            GD.IS_DATA_PROCESSING = false;
                            GD.LOADING = false;
                        }

                        console.log(data);
                    },
                    error: function (error) {
                        let LOADED = true;

                        $('#loginModal').modal('hide');

                        $('#loginModal').on('hidden.bs.modal', function () {
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