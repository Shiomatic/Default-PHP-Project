$(function () {
    // catch form submit
    $('form.use-ajax').on('submit', function (e) {
        e.preventDefault();
        ppcore.form.do($(this));
    });

    // clean up form errors
    $('form.use-ajax input').on('keydown keyup', function () {
        var self = $(this);
        ppcore.form.validate.check(self);
    });
});

var ppcore = {
    form: {
        do: function (form) {
            var validate = ppcore.form.validate.do(form);
            if (validate) {
                var target = form.attr('action');
                var values = ppcore.form.obtain(form);
                ppcore.form.submit(values, form);
            }
        },
        validate: {
            do: function (form) {
                var valid = true;
                var inputs = $('input', form);

                inputs.each(function () {
                    var self = $(this);
                    var check = ppcore.form.validate.check(self);
                    if (!check) valid = false;
                });

                return valid;
            },
            check: function (self) {
                var valid = true;
                var placeholder = self.attr('placeholder');
                var value = $.trim(self.val());
                var type = self.attr('type');
                if (placeholder && placeholder.indexOf('*') >= 0) {
                    if (!value) {
                        self.addClass('form-error');
                        valid = false;
                    }
                    else {
                        if (type == 'email') {
                            if (value.indexOf('@') < 0) {
                                self.addClass('form-error');
                                valid = false;
                            }
                            else {
                                self.removeClass('form-error');
                            }
                        }
                        else {
                            self.removeClass('form-error');
                        }
                    }
                }
                return valid;
            },
        },
        obtain: function (form) {
            var inputs = $('input, textarea', form);
            var values = {};
            inputs.each(function () {
                if (this.name) {
                    values[this.name] = $(this).val();
                }
            });
            return values;
        },
        submit: function (values, form) {
            if (values) {
                $.post('../form.php', values, function (result) {
                    console.log(result);
                    var data = JSON.parse(result);
                    $('.form-ajax-alert', form).remove();
                    if (data.error.length) {
                        $.each(data.error, function (i, value) {
                            form.prepend('<div class="form-ajax-alert alert alert-danger">' + value + '</div>');
                        });
                        
                    }
                    if (data.success.length) {
                        $.each(data.success, function (i, value) {
                            form.prepend('<div class="form-ajax-alert alert alert-success">' + value + '</div>');
                        });
                    }
                });
            }
            else {
                console.log('could not submit: no action available');
            }
        },
    },
}