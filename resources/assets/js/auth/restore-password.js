if (document.getElementById('restoreModal')) {
    let restorePasswordEmailValidator;

    new Vue({
        el: '#restoreModal',
        data: {
            email: ''
        },
        mounted: function () {
            let _this = this;
            // `this` указывает на экземпляр vm

            restorePasswordEmailValidator = new RegExValidatingInput($('[data-restore-email-input]'), {
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
        },
        methods: {
            validateBeforeSubmit() {
                let _this = this;

                let isValid = true;

                restorePasswordEmailValidator.Validate();
                if (!restorePasswordEmailValidator.IsValid()) {
                    isValid = false;
                }

                if (isValid) {
                    _this.restorePassword();
                }
            },
            restorePassword() {
                let _this = this;

                showLoader();

                $.ajax({
                    type: 'post',
                    url: '/user/restore-password',
                    data: {
                        email: _this.email,
                        language: GD.LANGUAGE
                    },
                    success: function (data) {
                        hideLoader();

                        let LOADED = true;

                        if (data.status == 'success') {
                            $('[data-restore-password]').modal('hide');

                            $('[data-restore-password]').on('hidden.bs.modal', function () {
                                if (LOADED) {
                                    showPopup(RESTORE_SUCCESS);
                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status == 'error') {
                            if (data.failed == 'email') {
                                $('[data-restore-password]').modal('hide');

                                $('[data-restore-password]').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        showPopup(EMAIL_NOT_EXISTS);
                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed == 'server') {
                                $('[data-restore-password]').modal('hide');

                                $('[data-restore-password]').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        showPopup(SERVER_ERROR);
                                        LOADED = false;
                                    }
                                });
                            }

                        }
                    },
                    error: function (error) {
                        hideLoader();

                        $('[data-restore-password]').modal('hide');

                        let LOADED = true;

                        $('[data-restore-password]').on('hidden.bs.modal', function () {
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