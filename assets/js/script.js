$(document).ready(function () {
    $(function () {
        $(".draggable").draggable({
            stop: function (event, ui) {
                var key = $(this).data('key');
                $.post('/site/setposition', {
                        top: ui.offset.top,
                        left: ui.offset.left,
                        key: key
                    })
                    .done(function (data) {
                    })
            }
        });
    });
    $('#login-form-link').click(function (e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
    $('#register-form-link').click(function (e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
    });
})
