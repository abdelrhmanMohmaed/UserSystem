$(document).ready(function () {
    $('#adminLoginBtn').click(function (e) {
        if ($('#admin-login-form')[0].checkValidity()) {
            e.preventDefault();
            $('#adminLoginBtn').val('please Wait....');
        }
        $.ajax({
            type: "POST",
            url: "handler/login.php",
            data: $("#admin-login-form").serialize() + "&action=adminLogin"
        }).then(
            // resolve/success callback
            function (response) {
                // console.log(response);
                if (response === 'admin_login') {
                    window.location = 'admin-dashboard.php';
                } else {
                    $('#adminLoginAlert').html(response);
                }
                $('#adminLoginBtn').val('Login');
            },
        );
    });
});