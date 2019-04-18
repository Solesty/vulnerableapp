
$(document).ready(function () {

    $('#submit_transaction').on('click', function () {
        window.location = 'new_transaction.php';
    });

    $('#submit_cv').on('click', function () {
        window.location = 'submitcv.php';
    });

    $('#login_button').on('click', function () {
        window.location = 'login.php';
    });


});