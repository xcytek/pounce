$(document).ready(function() {

    /**
     * Load Colors List
     */
    $('[colors-list]').loadColors();

    /**
     * Signin button
     */
    $('#login-btn').click(function(e) {
        e.preventDefault();
        var formData    = $('#login-form').serializeFormJSON();
        var loginFailed = $('.login-failed');

        // Validate Email
        if (! validateEmail(formData.email)) {
            showErrorMessage(loginFailed, 'Email is not valid');
        }
        // Validate Password
        else if (! validatePassword(formData.password)) {
            console.log(formData.password);
            showErrorMessage(loginFailed, 'Password is not valid');
        }
        else {
            // Do the login
            loginFailed.addClass('hide');
            services.users.login('?view=signin', formData, function(response) {
                if (response.type == 'success') {
                    redirectTo('?view=list');
                }
                // If validation in the backend fails
                else if (response.type == 'error') {
                    showErrorMessage(loginFailed, response.message);
                }
            });
        }
    });
});

/**
 * Validate Standard Email
 *
 * @param email
 * @returns {boolean}
 */
function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

/**
 * Validate Password
 * At least 1 lowercase
 * At least 1 uppercase
 * At least 1 number
 * At least 1 special character
 * Minimum Length of 6
 *
 * @param password
 * @returns {boolean}
 */
function validatePassword(password) {
    var re = /^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&? "]).*$/i;
    return re.test(password);
}

/**
 * Redirect to
 *
 * @param uri
 */
function redirectTo(uri) {
    window.location.href = uri;
}