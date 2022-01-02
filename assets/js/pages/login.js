//start login page 
$(document).ready(function () {
    $("#register-link").click(function () {
        $("#login-box").hide();
        $("#register-box").show();
    });
    $("#login-link").click(function () {
        $("#login-box").show();
        $("#register-box").hide();
    });
    $("#forgot-link").click(function () {
        $("#login-box").hide();
        $("#forgot-box").show();
    });
    $("#back-link").click(function () {
        $("#login-box").show();
        $("#forgot-box").hide();
    });
});
//end login page 
// start ajax in login page  

//Registration ajax Start 
$(document).ready(function () {
    $('#register-btn').click(function (e) {
        if ($('#register-form')[0].checkValidity()) {
            e.preventDefault();
            $('#register-btn').val('please Wait....');
        }
        if ($('#rpassword').val() != $('#cpassword').val()) {
            $('#passError').text('* Password did not matched!!')
            $('#register-btn').val('Sign Up');
        } else {
            $('#passError').text('');
            $.ajax({
                type: "POST",
                url: "handler/auth/register.php",
                data: $("#register-form").serialize() + "&action=register"
            }).then(
                // resolve/success callback
                function (response) {
                    // var jsonData = JSON.parse(response);
                    console.log(response);

                    // user is logged in successfully in the back-end
                    // let's redirect
                    if (response === 'register') {
                        window.location = 'home.php';
                    } else {
                        $('#regAlert').html(response);
                        $('#register-btn').val('Sign Up');

                    }
                },
            );
        }
    });
    //login ajax Start 
    $('#login-btn').click(function (e) {
        if ($('#login-form')[0].checkValidity()) {
            e.preventDefault();
            $('#login-btn').val('please Wait....');
        }
        $.ajax({
            type: "POST",
            url: "handler/auth/login.php",
            data: $("#login-form").serialize() + "&action=login"
        }).then(
            // resolve/success callback
            function (response) {
                // var jsonData = JSON.parse(response);
                console.log(response);
                $('#login-btn').val('Sign In');
                if (response === 'login') {
                    window.location = 'home.php';
                } else {
                    $('#loginAlert').html(response);
                    $('#login-btn').val('Sign Up');

                }

            },
        );
    });
    // Forgot Password Form Start
    $('#forgot-btn').click(function (e) {
        if ($('#forgot-form')[0].checkValidity()) {
            e.preventDefault();
            $('#forgot-btn').val('please Wait....');
        }
        $.ajax({
            type: "POST",
            url: "handler/auth/forgot.php",
            data: $("#forgot-form").serialize() + "&action=forgot"
        }).then(
            // resolve/success callback
            function (response) {
                // var jsonData = JSON.parse(response);
                // console.log(response);
                $('#forgot-form')[0].reset();
                $('#forgot-btn').val('Reset Password');
                $('#forgotAlert').html(response);

            },
        );
    });
})
//   end ajax in login page  