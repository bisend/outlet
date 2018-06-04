if (document.getElementById('restoreModal')) {
    let restorePasswordEmailValidator;

    new Vue({
        el: '#restoreModal',
        data: {
            email: ''
        },
        mounted: function () {
            let _this = this;

            restorePasswordEmailValidator = new RegExValidatingInput($('[data-restore-email-input]'), {
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

                GD.IS_DATA_PROCESSING = true;
                GD.LOADING = true;

                $.ajax({
                    type: 'post',
                    url: '/auth/restore-password',
                    data: {
                        email: _this.email,
                        language: GD.LANGUAGE
                    },
                    success: function (data) {
                        let LOADED = true;

                        if (data.status === 'success') {
                            $('#restoreModal').modal('hide');

                            $('#restoreModal').on('hidden.bs.modal', function () {
                                if (LOADED) {
                                    GD.NOTIFICATION.show(OUTLET.TRANS.AUTH.PASSWORD_RESTORED
                                        + '<b>' + _this.email + '</b>');

                                    LOADED = false;
                                }
                            });
                        }

                        if (data.status === 'error') {
                            if (data.failed === 'email') {
                                $('#restoreModal').modal('hide');

                                $('#restoreModal').on('hidden.bs.modal', function () {
                                    if (LOADED) {
                                        GD.NOTIFICATION.show(OUTLET.TRANS.AUTH.EMAIL_NOT_EXISTS);

                                        LOADED = false;
                                    }
                                });
                            }

                            if (data.failed === 'server') {
                                $('#restoreModal').modal('hide');

                                $('#restoreModal').on('hidden.bs.modal', function () {
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

                        $('#restoreModal').modal('hide');

                        $('#restoreModal').on('hidden.bs.modal', function () {
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