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
            // `this` указывает на экземпляр vm

            loginEmailValidator = new RegExValidatingInput($('[data-login-email]'), {
                expression: RegularExpressions.EMAIL,
                ChangeOnValid: function (input) {
                    input.removeClass(GD.INCORRECT_FIELD_CLASS);
                },
                ChangeOnInvalid: function (input) {
                    input.addClass(GD.INCORRECT_FIELD_CLASS);
                },
                showErrors: true,
                requiredErrorMessage: GD.REQUIRED_FIELD_TEXT,
                regExErrorMessage: GD.INCORRECT_FIELD_TEXT
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
                requiredErrorMessage: GD.REQUIRED_FIELD_TEXT,
                regExErrorMessage: GD.INCORRECT_FIELD_TEXT
            });
        },
        methods: {
            validateBeforeSubmit() {
                let _this = this;

                let isValid = true;

                loginEmailValidator.Validate();
                if (!loginEmailValidator.IsValid())
                {
                    isValid = false;
                }

                loginPasswordValidator.Validate();
                if (isValid && !loginPasswordValidator.IsValid())
                {
                    isValid = false;
                }

                if (isValid)
                {
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

                        if (data.status == 'success')
                        {
                            window.location.reload(true);
                        }

                        if (data.status == 'error')
                        {
                            if (data.failed == 'email')
                            {
                                $('#login-popup').modal('hide');

                                $('#login-popup').on('hidden.bs.modal', function () {
                                    if (LOADED)
                                    {
                                        //showPopup(EMAIL_NOT_EXISTS);
                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed == 'active')
                            {
                                $('#login-popup').modal('hide');

                                $('#login-popup').on('hidden.bs.modal', function () {
                                    if (LOADED)
                                    {
                                        //showPopup(EMAIL_CONFIRM_NOT_VALID);
                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed == 'password')
                            {
                                $('[data-login-password]').val('').addClass(GD.INCORRECT_FIELD_CLASS).attr("placeholder", GD.INCORRECT_FIELD_TEXT);
                            }
                        }

                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                    },
                    error: function (error) {
                        $('#login-popup').modal('hide');

                        let LOADED = true;

                        $('#login-popup').on('hidden.bs.modal', function () {
                            if (LOADED)
                            {
                                //showPopup(SERVER_ERROR);
                                LOADED = false;
                            }
                        });

                        console.log(error);

                        GD.IS_DATA_PROCESSING = false;
                        GD.LOADING = false;
                    }
                });

            }
        }
    });
    
}