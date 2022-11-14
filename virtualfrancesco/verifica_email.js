const validateEmail = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
};

const validate = () => {
    const $result = $('#result');
    const email = $('#email').val();
    $result.text('');

    if (validateEmail(email)) {
        $result.text(email + ' email valida');
        $result.css('color', 'green');
    } else {
        $result.text(email + ' email non valida');
        $result.css('color', 'red');
    }
    return false;
}

$(document).on('keyup','#email', validate);