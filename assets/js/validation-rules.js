$(document).ready(function () {
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
                    $('.error_div').html('Username  exists')

                }
                else {
                    $('.error_div').html('')
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
                    $('.error_div').html('Email  exists')

                }
            })
    })
    $('#register-submit').click(function (event) {
        var username = $.trim($('#reg-username').val());
        var email = $.trim($('#email').val());
        var password = $.trim($('#password1').val());
        var confirm_password = $.trim($('#confirm-password').val());
        var number = parseInt($('#number').val());

        if (!username) {
            $('.error_div').html('Username empty')
            event.preventDefault();
        }
        else if (username.length < 5) {
            $('.error_div').html('Username should not be more than 4 characters')

            event.preventDefault();
        }

        else if (!isEmail(email)) {
            $('.error_div').html('Email is not valid')

            event.preventDefault();

        }
        else if (!password) {
            $('.error_div').html('Password is not entered')
            event.preventDefault();

        }
        else if (password != confirm_password) {

            $('.error_div').html('Password inputs not equal')
            event.preventDefault();


        }
        else if (isNaN(number)) {

            $('.error_div').html('Not insert number')
            event.preventDefault();

        }
        else if (number > 5) {

            $('.error_div').html('Number  not be more than 5 characters')
            event.preventDefault();

        }


    })
})