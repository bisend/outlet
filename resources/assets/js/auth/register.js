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

                GD.IS_DATA_PROCESSING = true;
                GD.LOADING = true;
                
                $.ajax({
                    type: 'post',
                    url: '/auth/register',
                    data: {
                        name: _this.name,
                        email: _this.email,
                        password: md5(_this.password),
                        language: GD.LANGUAGE
                    },
                    success: function (data) {
                        let LOADED = true;

                        $('#registrModal').modal('hide');

                        if (data.status == 'success')
                        {
                            $('#registrModal').on('hidden.bs.modal', function () {
                                if (LOADED)
                                {
                                    //showPopup(REGISTER_SUCCESS);

                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status == 'error')
                        {
                            if (data.failed == 'email')
                            {
                                $('#registrModal').on('hidden.bs.modal', function () {
                                    if (LOADED)
                                    {
                                        //showPopup(EMAIL_NOT_VALID);
                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed == 'server')
                            {
                                $('#registrModal').on('hidden.bs.modal', function () {
                                    if (LOADED)
                                    {
                                        //showPopup(SERVER_ERROR);
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
                        $('#register-popup').modal('hide');

                        let LOADED = true;

                        $('#register-popup').on('hidden.bs.modal', function () {
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