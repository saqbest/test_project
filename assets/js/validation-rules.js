$(document).ready(function () {
    var login_valid = 2
    var valid = 5
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $("#reg-username").change(function () {
        var username = $.trim($('#reg-username').val());

        $.post('/site/checkunique', {
                param: username,

            })
            .done(function (data) {
                if (data > 0) {
                    $('#reg-username-error').html('Username already exists')

                }
                else if (!username) {
                    $('#reg-username-error').html('Username cannot be blank')
                }
                else if (username.length < 5) {
                    $('#reg-username-error').html('This field password should not be more than 4 characters')

                }
                else {
                    $('#reg-username-error').html('')
                    valid = valid - 1
                }
            })
    })
    $("#email").change(function () {
        var email = $.trim($('#email').val());

        $.post('/site/checkunique', {
                param: email,

            })
            .done(function (data) {
                if (data > 0) {
                    $('#email-error').html('Email  already exists')

                }
                else if (!isEmail(email)) {
                    $('#email-error').html('Please enter a valid email address.')

                }
                else {
                    $('#email-error').html('')
                    valid = valid - 1

                }
            })
    })

    $("#password1").change(function () {
        var password = $.trim($('#password1').val());
        if (!password) {
            $('#password1-error').html('Password  is required')
        }
        else if (password.length < 5) {
            $('#password1-error').html('This field password should not be more than 4 characters')

        }
        else {
            $('#password1-error').html('')
            valid = valid - 1

        }

    })

    $("#confirm-password").change(function () {
        var password = $.trim($('#password1').val());
        var confirm_password = $.trim($('#confirm-password').val());
        if (password != confirm_password) {

            $('#confirm-password-error').html('Password inputs not equal')
        }
        else {
            $('#confirm-password-error').html('')
            valid = valid - 1

        }
    })
    $("#number").change(function () {
        var number = parseInt($('#number').val())
        if (isNaN(number)) {

            $('#number-error').html('Not insert number')
        }
        else if (number > 5) {

            $('#number-error').html('Number should contain at least 5 characters')

        }
        else {
            $('#number-error').html('')
            valid = valid - 1

        }
    })

    $('#register-submit').click(function (event) {
        var username = $.trim($('#reg-username').val());
        var email = $.trim($('#email').val());
        var password = $.trim($('#password1').val());
        var confirm_password = $.trim($('#confirm-password').val());
        var number = parseInt($('#number').val())

        if (valid > 0) {
            if (!username) {
                $('#reg-username-error').html('This field username empty!')
            }
            else if (username.length < 5) {
                $('#reg-username-error').html('This field username  should contain at least 6 characters')

            }
            if (!isEmail(email)) {
                $('#email-error').html('Please enter a valid email address.')

            }
            if (!password) {
                $('#password1-error').html('Password  is required')
            }
            else if (password.length < 5) {
                $('#password1-error').html('This field password should not be more than 4 characters')

            }
            if (password != confirm_password) {

                $('#confirm-password-error').html('Password inputs not equal')
            }
            if (isNaN(number)) {

                $('#number-error').html('Quantity not inserted')
            }
            else if (number > 5) {

                $('#number-error').html('Number can not be greater than 5 ')

            }
            event.preventDefault();
        }
    })
    $('#username').change(function () {
        var username = $.trim($('#username').val());
        if (!username) {
            $('#username-error').html('Username is required')
        }

        else {
            $('#username-error').html('')
            login_valid = login_valid - 1
        }
    })
    $('#password').change(function () {
        var password = $.trim($('#password').val());
        if (!password) {
            $('#password-error').html('Password  is required')
        }

        else {
            $('#password-error').html('')
            login_valid = login_valid - 1

        }
    })
    $("#login-submit").click(function () {
        var username = $.trim($('#username').val());
        var password = $.trim($('#password').val());
        if (login_valid > 0) {
            if (!username) {
                $('.error').html('')
                $('#username-error').html('Username is required')

            }


            if (!password) {
                $('#password-error').html('Password  is required')

            }

            event.preventDefault();

        }
    })

})