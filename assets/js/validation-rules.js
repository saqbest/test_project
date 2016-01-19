var validator = new FormValidator('register-form', [
    {
        name: 'confirm-password',
        display: 'password confirmation',
        rules: 'required|matches[password]'
    }, {
        name: 'reg-username',
        display: 'min length',
        rules: 'min_length[4]'
    }], function (errors, event) {
    if (errors.length > 0) {
    }
});


