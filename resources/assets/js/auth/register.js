if (document.getElementById('registrModal')) {
    let registerNameValidator,
        registerEmailValidator,
        registerPasswordValidator,
        registerConfirmValidator;

    new Vue({
        el: '#registrModal',
        data: {
            name: '',
            email: '',
            password: '',
            confirmPassword: '',
            isConfirmInvalid: false
        },
        mounted: function () {
            let _this = this;
            // `this` указывает на экземпляр vm
            registerNameValidator = new RegExValidatingInput($('[data-register-name]'), {
                expression: RegularExpressions.FULL_NAME,
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
            
            registerEmailValidator = new RegExValidatingInput($('[data-register-email]'), {
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
            
            registerPasswordValidator = new RegExValidatingInput($('[data-register-password]'), {
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
            
            registerConfirmValidator = new RegExValidatingInput($('[data-register-confirm]'), {
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

                registerNameValidator.Validate();
                if (!registerNameValidator.IsValid())
                {
                    isValid = false;
                }

                registerEmailValidator.Validate();
                if (isValid && !registerEmailValidator.IsValid())
                {
                    isValid = false;
                }

                registerPasswordValidator.Validate();
                if (isValid && !registerPasswordValidator.IsValid())
                {
                    isValid = false;
                }

                registerConfirmValidator.Validate();
                if (isValid && !registerConfirmValidator.IsValid())
                {
                    isValid = false;
                }

                if (_this.password != _this.confirmPassword)
                {
                    $('[data-register-confirm]').addClass(GD.INCORRECT_FIELD_CLASS);
                    isValid = false;
                    _this.isConfirmInvalid = true;
                }
                else
                {
                    _this.isConfirmInvalid = false;
                }

                if (isValid)
                {
                    _this.registerUser();
                }
            },
            registerUser: function () {
                let _this = this;
                
                showLoader();
                
                $.ajax({
                    type: 'post',
                    url: '/user/register',
                    data: {
                        name: _this.name,
                        email: _this.email,
                        password: _this.password,
                        language: GD.LANGUAGE
                    },
                    success: function (data) {
                        hideLoader();

                        let LOADED = true;

                        $('#register-popup').modal('hide');

                        if (data.status == 'success')
                        {
                            $('#register-popup').on('hidden.bs.modal', function () {
                                if (LOADED)
                                {
                                    showPopup(REGISTER_SUCCESS);
                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status == 'error')
                        {
                            if (data.failed == 'email')
                            {
                                $('#register-popup').on('hidden.bs.modal', function () {
                                    if (LOADED)
                                    {
                                        showPopup(EMAIL_NOT_VALID);
                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed == 'server')
                            {
                                $('#register-popup').on('hidden.bs.modal', function () {
                                    if (LOADED)
                                    {
                                        showPopup(SERVER_ERROR);
                                        LOADED = false;
                                    }
                                });
                            }
                        }
                    },
                    error: function (error) {
                        hideLoader();

                        $('#register-popup').modal('hide');

                        let LOADED = true;

                        $('#register-popup').on('hidden.bs.modal', function () {
                            if (LOADED)
                            {
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