$(document).ready(function () {
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    $('#register-submit').click(function (event) {
        var username = $.trim($('#reg-username').val());
        var email = $.trim($('#email').val());
        var password = $.trim($('#password1').val());
        var confirm_password = $.trim($('#confirm-password').val());
        var number = parseInt($('#number').val());
        if (!username) {
            $('.error_div').html('username empty')
            event.preventDefault();
        }
        else if (username.length < 5) {
            $('.error_div').html('username should not be more than 4 characters')

            event.preventDefault();
        }
        else if (!isEmail(email)) {
            $('.error_div').html('email is not valid')

            event.preventDefault();

        }
        else if (!password) {
            $('.error_div').html('password is not entered')
            event.preventDefault();

        }
        else if (password != confirm_password) {

            $('.error_div').html('password inputs not equal')
            event.preventDefault();


        }
        else if (isNaN(number)) {

            $('.error_div').html('not insert number')
            event.preventDefault();

        }
        else if (number > 5) {

            $('.error_div').html('number  not be more than 5 characters')
            event.preventDefault();

        }


    })
})